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
                <li class="nav-item">
                    <a href="{{ route('location.services') }}" class="nav-link co-nav__link">{{ __('Location Services') }}</a>
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

            <button class="co-nav__burger d-lg-none btn ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#coNavOffcanvas" aria-controls="coNavOffcanvas" aria-label="Open menu">
                <span class="co-nav__burger-line"></span>
                <span class="co-nav__burger-line"></span>
                <span class="co-nav__burger-line"></span>
            </button>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end co-nav-offcanvas" tabindex="-1" id="coNavOffcanvas" aria-labelledby="coNavOffcanvasLabel">
        <div class="offcanvas-header border-bottom" style="border-color: #E0DDD6 !important;">
            <h2 class="offcanvas-title h5 mb-0" id="coNavOffcanvasLabel">Menu</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column gap-1">
            <a href="{{ url('/') }}" class="co-nav-drawer-link">{{ __('Home') }}</a>
            <a href="{{ route('services') }}" class="co-nav-drawer-link">{{ __('Services') }}</a>
            <a href="{{ route('location.services') }}" class="co-nav-drawer-link">{{ __('Location Services') }}</a>
            <a href="{{ route('testimonial') }}" class="co-nav-drawer-link">{{ __('Testimonials') }}</a>
            <a href="{{ route('referrals.create') }}" class="co-nav-drawer-link">{{ __('Referrals') }}</a>
            <a href="{{ \App\Helpers\UrlGen::contact() }}" class="co-nav-drawer-link">{{ __('Contact Us') }}</a>
            <hr class="my-2">
            <a href="{{ route('donate') }}" class="co-nav-drawer-link">{{ __('Donate') }}</a>
            <a href="{{ route('sells') }}" class="co-nav-drawer-link">{{ __('Sell') }}</a>
            <div class="dropdown">
                <a class="co-nav-drawer-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ __('Locations') }}</a>
                <ul class="dropdown-menu location-scroll-menu w-100">
                    <li><a class="dropdown-item" href="{{ route('locations.ferris-tx') }}">Ferris, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.glenn-heights-tx') }}">Glenn Heights, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.cockrell-hill-tx') }}">Cockrell Hill, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.balch-springs-tx') }}">Balch Springs, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.combine-tx') }}">Combine, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.cedar-hill-tx') }}">Cedar Hill, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.carrollton-tx') }}">Carrollton, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.coppell-tx') }}">Coppell, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.addison-tx') }}">Addison, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.dallas-tx') }}">Dallas, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.duncanville-tx') }}">Duncanville, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.irving-tx') }}">Irving, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.farmers-branch-tx') }}">Farmers Branch, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.lancaster-pa') }}">Lancaster, PA</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.lewisville-tx') }}">Lewisville, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.oak-cliff-tx') }}">Oak Cliff, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('junk.richardson') }}">Richardson, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.rowlett-tx') }}">Rowlett, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.seagoville-tx') }}">Seagoville, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.mesquite-nv') }}">Mesquite, NV</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.highland-park-tx') }}">Highland Park, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.garland-tx') }}">Garland, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.grand-prairie-tx') }}">Grand Prairie, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.sunnyvale-ca') }}">Sunnyvale, CA</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.desoto-tx') }}">Desoto, TX</a></li>
                    <li><a class="dropdown-item" href="{{ route('locations.hutchins-tx') }}">Hutchins, TX</a></li>
                </ul>
            </div>
            <hr class="my-2">
            @if (!auth()->check())
                @if (config('settings.security.login_open_in_modal'))
                    <a href="#quickLogin" class="co-nav-drawer-link" data-bs-toggle="modal">{{ t('log_in') }}</a>
                @else
                    <a href="{{ \App\Helpers\UrlGen::login() }}" class="co-nav-drawer-link">{{ t('log_in') }}</a>
                @endif
                <a href="{{ \App\Helpers\UrlGen::register() }}" class="co-nav-drawer-link">{{ t('sign_up') }}</a>
            @else
                <a href="{{ url('account') }}" class="co-nav-drawer-link">{{ t('My Account') }}</a>
            @endif

            @if (config('settings.single.pricing_page_enabled') == '2')
                <a href="{{ \App\Helpers\UrlGen::pricing() }}" class="co-nav-drawer-link">{{ t('pricing_label') }}</a>
            @endif

            <div class="mt-auto pt-4">
                <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary w-100 text-center">{{ __('Get Offer') }}</a>
            </div>
        </div>
    </div>
</div>
