@php
    $htmlLang = getLangTag(config('app.locale'));
    $htmlDir = (config('lang.direction') == 'rtl') ? ' dir="rtl"' : '';

    $plugins = array_keys((array)config('plugins'));
    $publicDisk = \Storage::disk(config('filesystems.default'));

    // Apple Icons
    $appleIcon144 = $publicDisk->url('app/default/ico/apple-touch-icon-144-precomposed.png') . getPictureVersion();
    $appleIcon114 = $publicDisk->url('app/default/ico/apple-touch-icon-114-precomposed.png') . getPictureVersion();
    $appleIcon72 = $publicDisk->url('app/default/ico/apple-touch-icon-72-precomposed.png') . getPictureVersion();
    $appleIcon57 = $publicDisk->url('app/default/ico/apple-touch-icon-57-precomposed.png') . getPictureVersion();
    
    
    
@endphp

<!DOCTYPE html>
<html lang="{{ $htmlLang }}"{!! $htmlDir !!}>
<head>
    <meta charset="{{ config('larapen.core.charset', 'utf-8') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
     

@php
    $seoOverrides = config('seo.overrides', []);
    $currentPath = trim(request()->path(), '/');
    $seoOverride = $seoOverrides[$currentPath] ?? null;

    $sectionMetaTitle = trim((string) $__env->yieldContent('meta_title'));
    $sectionMetaDescription = trim((string) $__env->yieldContent('meta_description'));
    $sectionMetaKeywords = trim((string) $__env->yieldContent('meta_keywords'));
    $sectionMetaRobots = trim((string) $__env->yieldContent('meta_robots'));

    if (isset($blog)) {
        $resolvedMetaTitle = trim((string) ($blog->meta_title ?? $blog->title ?? config('app.name')));
        $resolvedMetaDescription = trim((string) ($blog->meta_description ?? ''));
        $resolvedFocusKeyword = trim((string) ($blog->meta_keywords ?? ''));
        $resolvedOgTitle = trim((string) ($blog->og_title ?? $resolvedMetaTitle));
        $resolvedOgDescription = trim((string) ($blog->og_description ?? $resolvedMetaDescription));
        $resolvedOgType = trim((string) ($blog->og_type ?? 'article'));
        $resolvedOgUrl = trim((string) ($blog->og_url ?? request()->fullUrl()));
        $resolvedOgImage = isset($meta_image)
            ? $meta_image
            : (!empty($blog->og_image) ? asset('storage/' . $blog->og_image) : asset('images/logo.png'));
    } else {
        $resolvedMetaTitle = $seoOverride['meta_title'] ?? ($sectionMetaTitle ?: config('app.name'));
        $resolvedMetaDescription = $seoOverride['meta_description'] ?? $sectionMetaDescription;
        $resolvedFocusKeyword = $seoOverride['focus_keyword'] ?? $sectionMetaKeywords;
        $resolvedOgTitle = $seoOverride['og_title'] ?? $resolvedMetaTitle;
        $resolvedOgDescription = $seoOverride['og_description'] ?? $resolvedMetaDescription;
        $resolvedOgType = $seoOverride['og_type'] ?? 'website';
        $resolvedOgUrl = request()->fullUrl();
        $resolvedOgImage = isset($meta_image) ? $meta_image : asset('images/logo.png');
    }

    $resolvedMetaRobots = $sectionMetaRobots ?: 'index, follow';
@endphp

<title>{{ $resolvedMetaTitle }}</title>
<meta name="title" content="{{ $resolvedMetaTitle }}">
<meta name="description" content="{{ $resolvedMetaDescription }}">
<meta name="keywords" content="{{ $resolvedFocusKeyword }}">
<meta name="focus_keyword" content="{{ $resolvedFocusKeyword }}">
<meta name="robots" content="{{ $resolvedMetaRobots }}">

<meta property="og:title" content="{{ $resolvedOgTitle }}">
<meta property="og:description" content="{{ $resolvedOgDescription }}">
<meta property="og:type" content="{{ $resolvedOgType }}">
<meta property="og:url" content="{{ $resolvedOgUrl }}">
<meta property="og:image" content="{{ $resolvedOgImage }}">
<meta property="og:image:alt" content="{{ $resolvedMetaTitle }}">
<meta name="twitter:title" content="{{ $resolvedOgTitle }}">
<meta name="twitter:description" content="{{ $resolvedOgDescription }}">
<meta name="twitter:image" content="{{ $resolvedOgImage }}">
<meta name="twitter:card" content="summary_large_image">

    <!-- Canonical link -->
    <link rel="canonical" href="{{ request()->fullUrl() }}"/>

    <meta name="google-site-verification" content="-RF83fFc0M8ZfsiuAtDPuoC__M_zwUelVgSmfAZ3mMc">
    @includeFirst([config('larapen.core.customizedViewPath') . 'common.meta-robots', 'common.meta-robots'])
    <meta name="apple-mobile-web-app-title" content="{{ config('settings.app.name') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $appleIcon144 }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $appleIcon114 }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $appleIcon72 }}">
    <link rel="apple-touch-icon-precomposed" href="{{ $appleIcon57 }}">
    <link rel="shortcut icon" href="https://cashingcarz.com/storage/app/ico/thumb-32x32-ico-6803a6962c0b0.jpeg">
    {{-- intl-tel-input CSS is already bundled in mix('css/app.css') / app.rtl.css --}}
    @if (config('larapen.core.snowEffect'))
        <link rel="stylesheet" href="/snow/snow.css">
    @endif

   
    {{-- Specify a default target for all hyperlinks and forms on the page --}}
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NC2L5LGX');</script>
    <!-- End Google Tag Manager -->
    <base target="_top"/>
    @if (isset($post))
        @if (isVerifiedPost($post))
            @if (config('services.facebook.client_id'))
                <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
            @endif
{{--            {!! $og->renderTags() !!}--}}
{{--            {!! MetaTag::twitterCard() !!}--}}
        @endif
    @else
        @if (config('services.facebook.client_id'))
            <meta property="fb:app_id" content="{{ config('services.facebook.client_id') }}"/>
        @endif
{{--        {!! $og->renderTags() !!}--}}
            {{--        {!! MetaTag::twitterCard() !!}--}}
    @endif
    @include('feed::links')
    {!! seoSiteVerification() !!}

    @if (file_exists(public_path('manifest.json')))
        <link rel="manifest" href="/manifest.json">
    @endif

    @stack('before_styles_stack')
    @yield('before_styles')

    @if (config('lang.direction') == 'rtl')
        <link href="https://fonts.googleapis.com/css?family=Cairo|Changa" rel="stylesheet">
        <link href="{{ url(mix('css/app.rtl.css')) }}" rel="stylesheet">
    @else
        <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    @endif
    @if (config('plugins.detectadsblocker.installed'))
        <link href="{{ url('assets/detectadsblocker/css/style.css') . getPictureVersion() }}" rel="stylesheet">
    @endif

    @php
        $skinQs = (request()->filled('skin')) ? '?skin=' . request()->query('skin') : null;
        if (request()->filled('display')) {
            $skinQs .= (!empty($skinQs)) ? '&' : '?';
            $skinQs .= 'display=' . request()->query('display');
        }
        // style.css
        $styleCssUrl = url('common/css/style.css') . $skinQs . getPictureVersion(!empty($skinQs));
    @endphp
    <link href="{{ $styleCssUrl }}" rel="stylesheet">
    @php
        $homeStyle = '';
        if (isset($getSearchFormOp) && is_array($getSearchFormOp)) {
            $homeStyle = view('common.css.homepage', ['getSearchFormOp', $getSearchFormOp])->render();
        }
    @endphp
    {!! $homeStyle !!}

    <link href="{{ url()->asset('css/custom.css') . getPictureVersion() }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ url()->asset('css/orlando-theme.css') . getPictureVersion() }}" rel="stylesheet">

    @stack('after_styles_stack')
    @yield('after_styles')
	
	@if (!empty($plugins))
		@foreach($plugins as $plugin)
			@yield($plugin . '_styles')
		@endforeach
	@endif
    
    @if (config('settings.style.custom_css'))
		{!! printCss(config('settings.style.custom_css')) . "\n" !!}
    @endif
	
	@if (config('settings.other.js_code'))
		{!! printJs(config('settings.other.js_code')) . "\n" !!}
	@endif

	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="{{ url()->asset('assets/plugins/pace/0.4.17/pace.min.js') }}"></script>
    <script src="{{ url()->asset('assets/plugins/modernizr/modernizr-custom.js') }}"></script>
    

    @yield('captcha_head')
    @section('recaptcha_head')
        @php
            $captcha = config('settings.security.captcha');
            $reCaptchaVersion = config('recaptcha.version', 'v2');
            $isReCaptchaEnabled = (
                $captcha == 'recaptcha'
                && !empty(config('recaptcha.site_key'))
                && !empty(config('recaptcha.secret_key'))
                && in_array($reCaptchaVersion, ['v2', 'v3'])
            );
        @endphp
        @if ($isReCaptchaEnabled)
            <style>
                .is-invalid .g-recaptcha iframe,
                .has-error .g-recaptcha iframe {
                    border: 1px solid #f85359;
                }
            </style>
            @if ($reCaptchaVersion == 'v3')
                <script type="text/javascript">
                    function myCustomValidation(token) {
                        /* read HTTP status */
                        /* console.log(token); */
                        let gRecaptchaResponseEl = $('#gRecaptchaResponse');
                        if (gRecaptchaResponseEl.length) {
                            gRecaptchaResponseEl.val(token);
                        }
                    }
                </script>
                {!! recaptchaApiV3JsScriptTag([
                    'action' 		    => request()->path(),
                    'custom_validation' => 'myCustomValidation'
                ]) !!}
            @else
                {!! recaptchaApiJsScriptTag() !!}
            @endif
        @endif
    @show
    
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-1D1HGTCB38"></script>-->
<!--    <script>-->
<!--        window.dataLayer = window.dataLayer || [];-->
<!--        function gtag(){dataLayer.push(arguments);}-->
<!--        gtag('js', new Date());-->
<!--        gtag('config', 'G-1D1HGTCB38');-->
<!--    </script>-->
    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-17071157197"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-17071157197');
</script>

<script>
  gtag('config', 'AW-17071157197/BVFdCJr5sMcaEM3flMw_', {
    'phone_conversion_number': '+1 (407) 442-0085'
  });
</script>
</head>
<body class="skin orlando-sunshine">
<div id="wrapper">

    @section('header')
        @includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.header', 'layouts.inc.header'])
    @show

    @section('search')
    @show

    @section('wizard')
    @show

    @if (isset($siteCountryInfo))
        <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible mb-3">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="{{ t('Close') }}"></button>
                        {!! $siteCountryInfo !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @yield('content')

    @section('info')
    @show

    @includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.advertising.auto', 'layouts.inc.advertising.auto'])

    @section('footer')
        @includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.footer', 'layouts.inc.footer'])
    @show

</div>

@section('modal_location')
@show
@section('modal_abuse')
@show
@section('modal_message')
@show

@includeWhen(!auth()->check(), 'auth.login.inc.modal')
@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.change-country', 'layouts.inc.modal.change-country'])
@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.error', 'layouts.inc.modal.error'])
@include('cookie-consent::index')

@if (config('plugins.detectadsblocker.installed'))
    @if (view()->exists('detectadsblocker::modal'))
        @include('detectadsblocker::modal')
    @endif
@endif

@include('common.js.init')
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NC2L5LGX"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<script>
    var countryCode = '{{ config('country.code', 0)  }}';
    var timerNewMessagesChecking = {{ (int)config('settings.other.timer_new_messages_checking', 0)  }};

    /* Complete langLayout translations */
    langLayout.hideMaxListItems = {
        'moreText': "{{ t('View More') }}",
        'lessText': "{{ t('View Less') }}"
    };
    langLayout.select2 = {
        errorLoading: function () {
            return "{!! t('The results could not be loaded') !!}"
        },
        inputTooLong: function (e) {
            var t = e.input.length - e.maximum, n = {!! t('Please delete X character') !!};
            return t != 1 && (n += 's'), n
        },
        inputTooShort: function (e) {
            var t = e.minimum - e.input.length, n = {!! t('Please enter X or more characters') !!};
            return n
        },
        loadingMore: function () {
            return "{!! t('Loading more results') !!}"
        },
        maximumSelected: function (e) {
            var t = {!! t('You can only select N item') !!};
            return e.maximum != 1 && (t += 's'), t
        },
        noResults: function () {
            return "{!! t('No results found') !!}"
        },
        searching: function () {
            return "{!! t('Searching') !!}"
        }
    };
    var loadingWd = '{{ t('loading_wd') }}';

    {{-- The app's default auth field --}}
    var defaultAuthField = '{{ old('auth_field', getAuthField()) }}';
    var phoneCountry = '{{ config('country.code') }}';

    {{-- Others global variables --}}
    var fakeLocationsResults = "{{ config('settings.list.fake_locations_results', 0) }}";
    var stateOrRegionKeyword = "{{ t('area') }}";
    var errorText = {
        errorFound: "{{ t('error_found') }}"
    };
    var refreshBtnText = "{{ t('refresh') }}";
</script>

@stack('before_scripts_stack')
@yield('before_scripts')

@if (config('larapen.core.snowEffect'))
    <script src="/snow/snow.js" defer></script>
@endif
<script src="{{ url('common/js/intl-tel-input/countries.js') . getPictureVersion() }}"></script>
<script src="{{ url(mix('js/app.js')) }}"></script>
@if (config('settings.optimization.lazy_loading_activation') == 1)
    <script src="{{ url()->asset('assets/plugins/lazysizes/lazysizes.min.js') }}" async=""></script>
@endif
@if (file_exists(public_path() . '/assets/plugins/select2/js/i18n/'.config('app.locale').'.js'))
    <script src="{{ url()->asset('assets/plugins/select2/js/i18n/'.config('app.locale').'.js') }}"></script>
@endif
@if (config('plugins.detectadsblocker.installed'))
    <script src="{{ url('assets/detectadsblocker/js/script.js') . getPictureVersion() }}"></script>
@endif
<script>
    $(document).ready(function () {
        {{-- Searchable Select Boxes --}}
        let largeDataSelect2Params = {
            width: '100%',
            dropdownAutoWidth: 'true'
        };
        {{-- Simple Select Boxes --}}
        let select2Params = {...largeDataSelect2Params};
        {{-- Hiding the search box --}}
            select2Params.minimumResultsForSearch = Infinity;

        if (typeof langLayout !== 'undefined' && typeof langLayout.select2 !== 'undefined') {
            select2Params.language = langLayout.select2;
            largeDataSelect2Params.language = langLayout.select2;
        }

        $('.selecter').select2(select2Params);
        $('.large-data-selecter').select2(largeDataSelect2Params);

        {{-- Social Share --}}
        $('.share').ShareLink({
            title: '{{ addslashes(MetaTag::get('title')) }}',
            text: '{!! addslashes(MetaTag::get('title')) !!}',
            url: '{!! request()->fullUrl() !!}',
            width: 640,
            height: 480
        });

        {{-- Modal Login --}}
        @if (isset($errors) && $errors->any())
        @if ($errors->any() && old('quickLoginForm')=='1')
        {{-- Re-open the modal if error occured --}}
        openLoginModal();
        @endif
        @endif
    });
</script>

@stack('after_scripts_stack')
@yield('after_scripts')
@yield('captcha_footer')

@if (!empty($plugins))
    @foreach($plugins as $plugin)
        @yield($plugin . '_scripts')
    @endforeach
@endif

@if (config('settings.footer.tracking_code'))
    {!! printJs(config('settings.footer.tracking_code')) . "\n" !!}
@endif

<div class="co-mobile-sticky" role="region" aria-label="Quick offer">
  <p class="co-mobile-sticky__text">Cashing Orlando — Same-day pickup available</p>
  <a href="{{ url('/get_offer') }}" class="co-btn co-btn--primary">GET OFFER →</a>
</div>


<!--<img src="{{ asset('images/download.gif') }}" class="santa-walk" alt="Santa Walking">-->

{{-- Tawk.to: load after idle to reduce main-thread work and DevTools lag --}}
<script>
window.addEventListener('load', function () {
    window.requestIdleCallback = window.requestIdleCallback || function (cb) { return setTimeout(cb, 1); };
    window.requestIdleCallback(function () {
        var s1 = document.createElement('script');
        s1.async = true;
        s1.src = 'https://embed.tawk.to/692f260bb35015197de3c39c/1jbg2p7vg';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        document.body.appendChild(s1);
    });
});
</script>

@include('components.call-button')

<x-announcement-popup />

</body>
</html>
