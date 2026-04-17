<?php

namespace Database\Seeders;

use App\Models\blogpost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ResetBlogToTemporaryPostSeeder extends Seeder
{
    /**
     * Remove all blog posts and insert a single temporary placeholder.
     * Run: php artisan db:seed --class=ResetBlogToTemporaryPostSeeder
     */
    public function run(): void
    {
        blogpost::query()->delete();

        $photoRelative = 'blog_img/temporary-blog-placeholder.svg';
        $source = public_path('images/icon/success.svg');
        if (file_exists($source)) {
            Storage::disk('public')->put($photoRelative, File::get($source));
        } else {
            Storage::disk('public')->put(
                $photoRelative,
                '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" width="800" height="500"><rect fill="#f5f5f5" width="800" height="500"/><text x="400" y="260" text-anchor="middle" font-family="system-ui,sans-serif" font-size="22" fill="#333">Cashing Carz Orlando</text></svg>'
            );
        }

        $now = now();

        DB::table('blogposts')->insert([
            'title'             => 'Welcome to Cashing Carz Orlando',
            'slug'              => 'welcome-cashing-carz-orlando',
            'description'       => '<p>This is a temporary blog post while we prepare new articles. Check back soon for tips on selling your junk car in Central Florida.</p>',
            'photo'             => $photoRelative,
            'meta_title'        => 'Welcome | Cashing Carz Orlando',
            'meta_description'  => 'New blog content coming soon.',
            'meta_keywords'     => 'cash for cars, Orlando, junk car',
            'og_title'          => 'Welcome to Cashing Carz Orlando',
            'og_description'    => 'New blog content coming soon.',
            'og_image'          => null,
            'og_type'           => 'article',
            'og_url'            => null,
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);
    }
}
