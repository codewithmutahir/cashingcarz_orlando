<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post; // Ensure the Post model is properly imported
use App\Models\Sanctum\PersonalAccessToken;
use App\Providers\AppService\AclSystemTrait;
use App\Providers\AppService\ConfigTrait;
use App\Providers\AppService\SymlinkTrait;
use App\Providers\AppService\TelescopeTrait;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    use TelescopeTrait, AclSystemTrait, ConfigTrait, SymlinkTrait;
    
    private int $cacheExpiration = 86400; // Cache for 1 day (60 * 60 * 24)
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        //  Mail::alwaysTo('test@cashingcarz.com');
    
        // Run any inspection tasks
        $this->runInspection();
        
        // Set Bootstrap as default client assets
        Paginator::useBootstrap();
        
        // Specified key was too long error
        try {
            Schema::defaultStringLength(191);
        } catch (\Throwable $e) {
            \Log::error('Error setting default string length: ' . $e->getMessage());
        }
        
        // Setup Laravel Sanctum
        try {
            Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
        } catch (\Throwable $e) {
            \Log::error('Error setting up Sanctum: ' . $e->getMessage());
        }
        
        // Setup Storage Symlink
        $this->setupStorageSymlink();
        
        // Setup ACL system
        $this->setupAclSystem();
        
        // Setup Https
        $this->setupHttps();
        
        // Setup Configs
        $this->setupConfigs();

        $this->configureDebugBar();

        View::composer('layouts.inc.footer', function ($view) {
            $ttl = (int) config('settings.optimization.cache_expiration', 3600);
            $footerNavPageColumns = Cache::remember(
                'footer.standard_nav_columns.' . app()->getLocale(),
                $ttl,
                static function () {
                    $all = Page::query()
                        ->where('type', 'standard')
                        ->where('excluded_from_footer', 1)
                        ->where('active', 1)
                        ->orderBy('id')
                        ->get();

                    return [
                        $all->slice(0, 5)->values(),
                        $all->slice(5, 10)->values(),
                        $all->slice(10, 15)->values(),
                        $all->slice(15, 20)->values(),
                        $all->slice(20, 25)->values(),
                        $all->slice(25, 30)->values(),
                    ];
                }
            );
            $view->with('footerNavPageColumns', $footerNavPageColumns);
        });

        View::composer('faq', function ($view) {
            $ttl = (int) config('settings.optimization.cache_expiration', 3600);
            $faqList = Cache::remember('faq.all', $ttl, static function () {
                return \App\Models\Faq::query()->orderBy('id')->get();
            });
            $view->with('faqList', $faqList);
        });

        View::composer('home.index', function ($view) {
            $ttl = (int) config('settings.optimization.cache_expiration', 3600);
            $homeRootCategoriesForYearSelect = Cache::remember(
                'home.root_categories.year_select.' . app()->getLocale(),
                $ttl,
                static function () {
                    return Category::query()
                        ->where('active', 1)
                        ->whereNull('parent_id')
                        ->orderBy('name', 'DESC')
                        ->get();
                }
            );
            $view->with('homeRootCategoriesForYearSelect', $homeRootCategoriesForYearSelect);
        });

        // View Composer: share featured post for OG/meta (short cache — fewer queries, still reasonably fresh)
        View::composer('layouts.master', function ($view) {
            $post = Cache::remember('layout_shared_post_id_1', 600, static function () {
                return Post::query()->find(1);
            });
            $view->with('post', $post);
        });
        
        // Capture referral code from query ?ref=XXXXXX
        if (request()->has('ref')) {
            session(['referral_code' => request()->get('ref')]);
        }
    
    }

    /**
     * Setup Https
     */
    private function setupHttps()
    {
        // Force HTTPS protocol
        if (config('larapen.core.forceHttps')) {
            URL::forceScheme('https');
        }
    }

    /**
     * Debugbar instruments every request and can freeze DevTools; respect DEBUG_BAR and production.
     */
    private function configureDebugBar(): void
    {
        if (! class_exists(\Barryvdh\Debugbar\Facades\Debugbar::class)) {
            return;
        }
        if ($this->app->environment('production') || ! config('larapen.core.debugBar')) {
            try {
                \Barryvdh\Debugbar\Facades\Debugbar::disable();
            } catch (\Throwable) {
                // ignore
            }
        }
    }
}
