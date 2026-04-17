@php
    $googleBusinessProfileUrl = 'https://www.google.com/search?q=Cashing+Carz+Junk+Cars+Buyer+And+Removal&stick=H4sIAAAAAAAA_-NgU1I1qLAwM0m1MDVJNEk0NjAyM02zMqgwNra0sLA0SEtOMjFLNLIwXsSq4ZxYnJGZl67gnFhUpeBVmpcNYhUrOJVWphYpOOalKASl5uaXJeYAACtcT9RUAAAA&hl=en&mat=CS7R4U0273FvElYBTVDHnvQLC0aV6r21Xzf6pFE4OFDEaPccinG_kFOOe3k2bYiNZRG0gQQLg62c8xM5elJQM49IWZh6Se3zXJkOyHs5H35szxa31gLhOohhe5cHu5AG1A&authuser=0';
    $socialLinksAreEnabled = (
        config('settings.social_link.facebook_page_url')
        || config('settings.social_link.twitter_url')
        || config('settings.social_link.tiktok_url')
        || config('settings.social_link.linkedin_url')
        || config('settings.social_link.pinterest_url')
        || config('settings.social_link.instagram_url')
    );
    $appsLinksAreEnabled = (
        config('settings.other.ios_app_url')
        || config('settings.other.android_app_url')
    );
    $socialAndAppsLinksAreEnabled = ($socialLinksAreEnabled || $appsLinksAreEnabled);
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

<footer class="main-footer orlando-footer-shell co-footer-shell">
    <div class="container">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-3 col-md-6">
                <a href="{{ url('/') }}" class="d-inline-block">
                    <img src="https://cashingcarz.com/public/images/brand.png" alt="Cashing Orlando" class="co-footer-brand__logo">
                </a>
                <p class="co-footer-brand__tag">Cashing Carz is now in Orlando, Florida — serving Central Florida</p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Pages</h4>
                <ul class="list-unstyled footer-nav">
                    @foreach($footerNavPageColumns ?? [] as $columnPages)
                        @foreach($columnPages as $page)
                            <li>
                                @php
                                    $linkTarget = '';
                                    if ($page->target_blank == 1) {
                                        $linkTarget = 'target="_blank"';
                                    }
                                @endphp
                                @if (!empty($page->external_link))
                                    <a href="{!! $page->external_link !!}" rel="nofollow" {!! $linkTarget !!}>{{ $page->name }}</a>
                                @else
                                    <a href="{{ \App\Helpers\UrlGen::page($page) }}" {!! $linkTarget !!}>{{ $page->name }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endforeach
                    <li><a href="{{ route('client.blog.show') }}">{{ __('Blog') }}</a></li>
                    <li><a href="{{ route('referrals.create') }}">Submit a Referral</a></li>
                    @if (isset($pages) && $pages->count() > 0)
                        @foreach($pages as $page)
                            <li>
                                @php
                                    $linkTarget = '';
                                    if ($page->target_blank == 1) {
                                        $linkTarget = 'target="_blank"';
                                    }
                                @endphp
                                @if (!empty($page->external_link))
                                    <a href="{!! $page->external_link !!}" rel="nofollow" {!! $linkTarget !!}>{{ $page->name }}</a>
                                @else
                                    <a href="{{ \App\Helpers\UrlGen::page($page) }}" {!! $linkTarget !!}>{{ $page->name }}</a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Services</h4>
                <ul class="list-unstyled footer-nav">
                    <li><a href="{{ route('services') }}">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('location.services') }}">{{ __('Location Services') }}</a></li>
                    <li><a href="{{ route('get_offer') }}">{{ __('Get Offer') }}</a></li>
                    <li><a href="{{ route('sells') }}">{{ __('Sell') }}</a></li>
                    <li><a href="{{ route('donate') }}">{{ __('Donate') }}</a></li>
                    <li><a href="{{ route('testimonial') }}">{{ __('Testimonials') }}</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Contact</h4>
                <ul class="list-unstyled footer-nav">
                    <li><a href="{{ \App\Helpers\UrlGen::contact() }}">{{ t('Contact') }}</a></li>
                    <li>
                        <a href="{{ $googleBusinessProfileUrl }}"
                           target="_blank"
                           rel="noopener noreferrer">{{ __('Google Business Profile') }}</a>
                    </li>
                    <li><a href="https://cashingcarzorlando.com/sitemap.xml">{{ t('sitemap') }}</a></li>
                    @if (isset($countries) && $countries->count() > 1)
                        <li><a href="{{ \App\Helpers\UrlGen::countries() }}">{{ t('countries') }}</a></li>
                    @endif
                    @if (!auth()->user())
                        <li>
                            @if (config('settings.security.login_open_in_modal'))
                                <a href="#quickLogin" data-bs-toggle="modal">{{ t('log_in') }}</a>
                            @else
                                <a href="{{ \App\Helpers\UrlGen::login() }}">{{ t('log_in') }}</a>
                            @endif
                        </li>
                        <li><a href="{{ \App\Helpers\UrlGen::register() }}">{{ t('register') }}</a></li>
                    @else
                        <li><a href="{{ url('account') }}">{{ t('My Account') }}</a></li>
                    @endif
                </ul>

                <ul class="list-unstyled list-inline mt-3 footer-nav social-list-footer social-list-color footer-nav-inline">
                    <li class="list-inline-item">
                        <a class="icon-color gp"
                           data-bs-placement="top"
                           data-bs-toggle="tooltip"
                           href="{{ $googleBusinessProfileUrl }}"
                           title="{{ __('Google Business Profile') }}"
                           target="_blank"
                           rel="noopener noreferrer"
                        >
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                    @if ($socialLinksAreEnabled)
                        <li class="list-inline-item">
                            <a class="icon-color fb"
                               data-bs-placement="top"
                               data-bs-toggle="tooltip"
                               href="{{ config('settings.social_link.facebook_page_url') ?: 'https://www.facebook.com/share/16QRT99Axd/' }}"
                               title="Facebook"
                               target="_blank"
                               rel="noopener"
                            >
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        @if ($appsLinksAreEnabled)
            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="footer-title">{{ t('Mobile Apps') }}</h4>
                    <div class="row">
                        @if (config('settings.other.ios_app_url'))
                            <div class="col-auto">
                                <a class="app-icon" target="_blank" href="{{ config('settings.other.ios_app_url') }}">
                                    <img src="{{ url('images/site/app-store-badge.svg') }}" alt="{{ t('Available on the App Store') }}">
                                </a>
                            </div>
                        @endif
                        @if (config('settings.other.android_app_url'))
                            <div class="col-auto">
                                <a class="app-icon" target="_blank" href="{{ config('settings.other.android_app_url') }}">
                                    <img src="{{ url('images/site/google-play-badge.svg') }}" alt="{{ t('Available on Google Play') }}">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @php
            $mtPay = '';
            if (!config('settings.footer.hide_payment_plugins_logos') && isset($paymentMethods) && $paymentMethods->count() > 0) {
                $mtPay = ' mt-4';
            }
        @endphp
        @if (!config('settings.footer.hide_payment_plugins_logos') && isset($paymentMethods) && $paymentMethods->count() > 0)
            <div class="text-center payment-method-logo{{ $mtPay }}">
                @foreach($paymentMethods as $paymentMethod)
                    @if (file_exists(plugin_path($paymentMethod->name, 'public/images/payment.png')))
                        <img src="{{ url('plugins/' . $paymentMethod->name . '/images/payment.png') }}"
                             alt="{{ $paymentMethod->display_name }}"
                             title="{{ $paymentMethod->display_name }}">
                    @endif
                @endforeach
            </div>
        @endif

        <div class="co-footer-bar">
            <span>&copy; {{ date('Y') }} Cashing Orlando</span>
            <span>Developed by <a href="https://elitesolutionscpa.com">Elite Solutions</a></span>
        </div>
    </div>

    <script type="module" src="{{ asset('/assets/js/customjs.js') }}"></script>
</footer>
