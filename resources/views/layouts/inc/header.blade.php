@php
    $countries ??= collect();
    $queryString = (request()->getQueryString() ? ('?' . request()->getQueryString()) : '');
    $showCountryFlagNextLogo = (config('settings.localization.show_country_flag') == 'in_next_logo');
    $multiCountryIsEnabled = false;
    $multiCountryLabel = '';
    if ($showCountryFlagNextLogo) {
        if (!empty(config('country.code'))) {
            if ($countries->count() > 1) {
                $multiCountryIsEnabled = true;
                $multiCountryLabel = 'title="' . t('select_country') . '"';
            }
        }
    }
    $countryName = config('country.name');
    $countryFlag24Url = config('country.flag24_url');
    $countryFlag32Url = config('country.flag32_url');
    $logoLabel = '';
    if ($multiCountryIsEnabled) {
        $logoLabel = config('settings.app.name') . (!empty($countryName) ? ' ' . $countryName : '');
    }
    $userMenu ??= collect();
@endphp
<div class="header co-header">
    <nav class="navbar navbar-light bg-white co-nav navbar-expand-lg fixed-top" role="navigation" aria-label="Primary">
        <div class="container co-nav__container">
            <a href="{{ url('/') }}" class="navbar-brand co-nav__brand logo logo-title d-flex align-items-center mb-0">
                <img src="https://cashingcarz.com/public/images/brand.png"
                     alt="Cashing Orlando"
                     class="main-logo co-nav__logo"
                     data-bs-placement="bottom"
                     data-bs-toggle="tooltip"
                     title="{!! $logoLabel !!}"
                />
            </a>

            <ul class="navbar-nav co-nav__center mx-auto d-none d-lg-flex align-items-center">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link co-nav__link">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('services') }}" class="nav-link co-nav__link">{{ __('Services') }}</a>
                </li>
                <li class="nav-item dropdown co-nav__locations">
                    <a href="javascript:void(0)"
                       class="nav-link co-nav__link dropdown-toggle"
                       id="coNavLocationsDesktop"
                       role="button"
                       data-bs-toggle="dropdown"
                       data-bs-auto-close="outside"
                       aria-expanded="false"
                       aria-haspopup="true"
                    >{{ __('Locations') }}</a>
                    <ul class="dropdown-menu co-nav__locations-menu shadow-sm location-scroll-menu"
                        aria-labelledby="coNavLocationsDesktop">
                        @include('layouts.inc.menu.location-dropdown-items')
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('testimonial') }}" class="nav-link co-nav__link">{{ __('Testimonials') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('referrals.create') }}" class="nav-link co-nav__link">{{ __('Referrals') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ \App\Helpers\UrlGen::contact() }}" class="nav-link co-nav__link">{{ __('Contact Us') }}</a>
                </li>
            </ul>

            <div class="co-nav__right d-none d-lg-flex align-items-center gap-2">
                @if (!auth()->check())
                    <div class="dropdown co-nav__login">
                        <a href="#" class="co-nav__link dropdown-toggle d-inline-flex align-items-center gap-1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user d-none d-xl-inline"></i>
                            <span>{{ t('log_in') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                @if (config('settings.security.login_open_in_modal'))
                                    <a href="#quickLogin" class="dropdown-item" data-bs-toggle="modal">{{ t('log_in') }}</a>
                                @else
                                    <a href="{{ \App\Helpers\UrlGen::login() }}" class="dropdown-item">{{ t('log_in') }}</a>
                                @endif
                            </li>
                            <li><a href="{{ \App\Helpers\UrlGen::register() }}" class="dropdown-item">{{ t('sign_up') }}</a></li>
                        </ul>
                    </div>
                @else
                    <div class="dropdown">
                        <a href="#" class="co-nav__link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            @if ($userMenu->count() > 0)
                                @php
                                    $menuGroup = '';
                                    $dividerNeeded = false;
                                    $excludedItems = ['My listings', 'Pending approval', 'Archived listings', 'Favourite listings'];
                                @endphp
                                @foreach($userMenu as $key => $value)
                                    @continue(!$value['inDropdown'])
                                    @if(in_array(trim(strip_tags($value['name'])), $excludedItems))
                                        @continue
                                    @endif
                                    @php
                                        if ($menuGroup != $value['group']) {
                                            $menuGroup = $value['group'];
                                            if (!empty($menuGroup) && !$loop->first) {
                                                $dividerNeeded = true;
                                            }
                                        } else {
                                            $dividerNeeded = false;
                                        }
                                    @endphp
                                    @if ($dividerNeeded)
                                        <li><hr class="dropdown-divider"></li>
                                    @endif
                                    <li>
                                        <a href="{{ $value['url'] }}" class="dropdown-item">
                                            <i class="{{ $value['icon'] }}"></i> {{ $value['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li><a href="{{ url('account') }}" class="dropdown-item">{{ t('My Account') }}</a></li>
                            @endif
                        </ul>
                    </div>
                @endif

                <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary co-nav__cta">{{ __('Get Offer') }}</a>
            </div>

            <button class="co-nav__burger btn d-lg-none ms-auto"
                    type="button"
                    id="coNavMobileToggle"
                    data-bs-toggle="collapse"
                    data-bs-target="#coNavMobilePanel"
                    aria-controls="coNavMobilePanel"
                    aria-expanded="false"
                    aria-label="{{ __('Open menu') }}"
            >
                <span class="co-nav__burger-line"></span>
                <span class="co-nav__burger-line"></span>
                <span class="co-nav__burger-line"></span>
            </button>
        </div>

        {{-- Full-width mobile menu (collapsible panel — matches stacked link layout on small screens) --}}
        <div class="collapse co-nav-mobile-panel d-lg-none w-100" id="coNavMobilePanel">
            <div class="container co-nav-mobile-panel__inner">
                <div class="co-nav-mobile-panel__bar">
                    <button type="button"
                            class="co-nav-mobile-close"
                            data-bs-toggle="collapse"
                            data-bs-target="#coNavMobilePanel"
                            aria-expanded="true"
                            aria-controls="coNavMobilePanel"
                            aria-label="{{ __('Close menu') }}"
                    >&times;</button>
                </div>
                <nav class="co-nav-mobile-list" aria-label="{{ __('Mobile') }}">
                    <a class="co-nav-mobile-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                    <a class="co-nav-mobile-link" href="{{ route('services') }}">{{ __('Services') }}</a>
                    <button type="button"
                            class="co-nav-mobile-link co-nav-mobile-link--toggle text-start w-100 border-0 bg-transparent"
                            data-bs-toggle="collapse"
                            data-bs-target="#coNavMobileLocations"
                            aria-expanded="false"
                            aria-controls="coNavMobileLocations"
                    >{{ __('Locations') }}</button>
                    <div class="collapse co-nav-mobile-locations" id="coNavMobileLocations">
                        <ul class="list-unstyled co-nav-mobile-locations__list location-scroll-menu mb-0">
                            @include('layouts.inc.menu.location-dropdown-items')
                        </ul>
                    </div>
                    <a class="co-nav-mobile-link" href="{{ route('testimonial') }}">{{ __('Testimonials') }}</a>
                    <a class="co-nav-mobile-link" href="{{ route('referrals.create') }}">{{ __('Referrals') }}</a>
                    <a class="co-nav-mobile-link" href="{{ \App\Helpers\UrlGen::contact() }}">{{ __('Contact Us') }}</a>
                    <a class="co-nav-mobile-link" href="{{ route('donate') }}">{{ __('Donate') }}</a>
                    <a class="co-nav-mobile-link" href="{{ route('sells') }}">{{ __('Sell') }}</a>
                    @if (!auth()->check())
                        @if (config('settings.security.login_open_in_modal'))
                            <a href="#quickLogin" class="co-nav-mobile-link" data-bs-toggle="modal">{{ t('log_in') }}</a>
                        @else
                            <a href="{{ \App\Helpers\UrlGen::login() }}" class="co-nav-mobile-link">{{ t('log_in') }}</a>
                        @endif
                        <a href="{{ \App\Helpers\UrlGen::register() }}" class="co-nav-mobile-link">{{ t('sign_up') }}</a>
                    @else
                        <a href="{{ url('account') }}" class="co-nav-mobile-link">{{ t('My Account') }}</a>
                    @endif
                    @if (config('settings.single.pricing_page_enabled') == '2')
                        <a href="{{ \App\Helpers\UrlGen::pricing() }}" class="co-nav-mobile-link">{{ t('pricing_label') }}</a>
                    @endif
                    <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary co-nav-mobile-cta">{{ __('Get Offer') }}</a>
                </nav>
            </div>
        </div>
    </nav>
</div>

@once
@push('after_scripts_stack')
<script>
(function () {
    function initCoNavLocationsHover() {
        var li = document.querySelector('.co-header .co-nav__locations');
        if (!li || typeof bootstrap === 'undefined' || !bootstrap.Dropdown) {
            return;
        }
        var toggle = li.querySelector('[data-bs-toggle="dropdown"]');
        if (!toggle) {
            return;
        }
        var dropdown = bootstrap.Dropdown.getInstance(toggle);
        if (!dropdown) {
            dropdown = new bootstrap.Dropdown(toggle, { autoClose: true });
        }
        var mq = window.matchMedia('(min-width: 992px)');

        function isDesktop() {
            return mq.matches;
        }

        li.addEventListener('mouseenter', function () {
            if (isDesktop()) {
                dropdown.show();
            }
        });
        li.addEventListener('mouseleave', function () {
            if (isDesktop()) {
                dropdown.hide();
            }
        });
        toggle.addEventListener(
            'click',
            function (e) {
                if (isDesktop()) {
                    e.preventDefault();
                    e.stopImmediatePropagation();
                }
            },
            true
        );
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCoNavLocationsHover);
    } else {
        initCoNavLocationsHover();
    }
})();

(function () {
    var panel = document.getElementById('coNavMobilePanel');
    var burger = document.getElementById('coNavMobileToggle');
    if (!panel || typeof bootstrap === 'undefined' || !bootstrap.Collapse) {
        return;
    }
    var collapse = bootstrap.Collapse.getOrCreateInstance(panel, { toggle: false });

    panel.addEventListener('shown.bs.collapse', function () {
        if (burger) {
            burger.setAttribute('aria-expanded', 'true');
            burger.setAttribute('aria-label', '{{ __('Close menu') }}');
        }
    });
    panel.addEventListener('hidden.bs.collapse', function () {
        if (burger) {
            burger.setAttribute('aria-expanded', 'false');
            burger.setAttribute('aria-label', '{{ __('Open menu') }}');
        }
    });

    var mq = window.matchMedia('(min-width: 992px)');
    function closeIfDesktop() {
        if (mq.matches && panel.classList.contains('show')) {
            collapse.hide();
        }
    }
    window.addEventListener('resize', closeIfDesktop);

    panel.addEventListener('click', function (e) {
        var link = e.target.closest('a[href]');
        if (!link || !panel.contains(link)) {
            return;
        }
        var href = link.getAttribute('href');
        if (!href || href === '#') {
            return;
        }
        collapse.hide();
    });
})();
</script>
@endpush
@endonce
