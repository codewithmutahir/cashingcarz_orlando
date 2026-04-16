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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @includeFirst([config('larapen.core.customizedViewPath') . 'common.meta-robots', 'common.meta-robots'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="{{ config('settings.app.name') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ $appleIcon144 }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ $appleIcon114 }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ $appleIcon72 }}">
    <link rel="apple-touch-icon-precomposed" href="{{ $appleIcon57 }}">
    <link rel="shortcut icon" href="{{ config('settings.app.favicon_url') }}">
    <title>{!! MetaTag::get('title') !!}</title>
    {!! MetaTag::tag('description') !!}{!! MetaTag::tag('keywords') !!}
    <link rel="canonical" href="{{ request()->fullUrl() }}"/>
    {{-- Specify a default target for all hyperlinks and forms on the page --}}
    <base target="_top"/>
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
    <style>
        .group {
            margin: 10px 0;
        }

        table {
            width: 100%;
        }

        .item-img img {
            width: 5rem;
            height: 5rem;
            border-radius: 10px;
        }

        .item-details {
            padding: 5px;
            display: flex;
            flex-direction: column;
        }

        .item-details .item-title {
            color: #000;
            font-weight: 600;
            text-transform: uppercase;

        }

        .item-details .item-size, .item-qty {
            color: #AAA8BB;
            font-weight: 500;
            font-size: 14px;
        }

        .item-price {
            font-weight: 600;
            text-align: right;
        }

        .divider {
            width: 100%;
            height: .5px;
            background-color: lightgray;
            margin: 10px 0;
        }

        .order_confirm {
            width: 100%;
            height: 45px;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            outline: none;
            font-size: .9rem;
            background-color: #31285C;
            border: none;
        }

        .checkout_details {
            width: 340px;
            min-height: 10px;
            background-color: #fff;
            border-radius: 10px;
            padding: 0 30px;
            padding-top: 10px;
            padding-bottom: 20px;
            font-weight: 500;
            font-size: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.07);
        }

        fieldset {
            border: 0;
            margin: 0;
            padding: 0;
        }

        legend {
            font-weight: 600;
            margin-block-end: 0.5em;
            padding: 0;
        }

        input {
            border: 0;
            color: inherit;
            font: inherit;
        }

        input[type="radio"] {
            accent-color: var(--color-primary);
        }

        .form__radios {
            display: grid;
            gap: 1em;
        }

        .form__radio {
            align-items: center;
            background-color: #fefdfe;
            border-radius: 1em;
            box-shadow: 0 0 1em rgba(0, 0, 0, 0.0625);
            display: flex;
            padding: 1em;
        }

        .form__radio label {
            align-items: center;
            display: flex;
            flex: 1;
            gap: 1em;
        }

        .icon {
            block-size: 1em;
            display: inline-block;
            fill: currentColor;
            inline-size: 1em;
            vertical-align: middle;
        }
    </style>
</head>
<body class="skin">
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

    <div class="main-container">
        <div class="container">

            <div class="row clearfix mb-5 mt-5">
                <div class="col-md-8 mx-auto checkout_details">

                    <div class="group">
                        <div class="group">
                            <button type="button" class="order_confirm">Order Confirmation</button>
                        </div>
                        <table>
                            @php $photo=\App\Models\Picture::where('post_id',$post->id)->first(); @endphp
                            <tr>
                                <td class="item-img"><img
                                            src="@if($photo){{asset('storage').'/'.$photo->filename}} @else {{asset('images/No-Image-Placeholder.png')}} @endif">
                                </td>
                                <td class="item-details">
                                    <span class="item-title">{{$post->title}}</span>
                                    @if($post->car_brand_id!=null)
                                        <span class="item-size">Brand: {{\App\Models\Brand::findorfail($post->car_brand_id)->value('name')}}</span>
                                    @endif
                                    <span class="item-qty">Quantity: 1</span>
                                </td>
                                <td class="item-price">${{$post->price}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="divider"></div>
                    <table>
                        <tr>
                            <td class="item-qty">Subtotal</td>
                            <td class="item-price">${{$post->price}}</td>
                        <tr>

                        <tr>
                            <td style="font-size:17px;" class="item-qty">Total</td>
                            <td style="font-size:17px;" class="item-price">${{$post->price}}</td>
                        <tr>

                    </table>
                    <fieldset>
                        <legend>Payment Method</legend>

                        <div class="form__radios">
                            {{--                                <div class="form__radio">--}}
                            {{--                                    <label for="Stripe">--}}
                            {{--                                        <svg class="icon">--}}
                            {{--                                            <use xlink:href="#icon-stripe"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                        Stripe</label>--}}
                            {{--                                    <input checked id="Stripe" value="stripe" name="payment-method" type="radio"/>--}}
                            {{--                                </div>--}}

                            {{--                                <div class="form__radio">--}}
                            {{--                                    <label for="paypal">--}}
                            {{--                                        <svg class="icon">--}}
                            {{--                                            <use xlink:href="#icon-paypal"/>--}}
                            {{--                                        </svg>--}}
                            {{--                                        PayPal</label>--}}
                            {{--                                    <input id="paypal" value="paypal" name="payment-method" type="radio"/>--}}
                            {{--                                </div>--}}

                            <div class="form__radio">
                                <label for="cod">
                                    <svg class="icon">
                                        <use xlink:href="#icon-stripe"/>
                                    </svg>
                                    Pay After Buy</label>
                                <input id="cod" checked value="cod" name="payment_method" type="radio"/>
                            </div>
                            <div class="form__radio">
                                <p>Your order has been successfully added.
                                    We are send invoice in your mail.
                                    Please check your email and follow next instruction. <br><br>
                                    <span style="color: #134F87">Thank you sir!</span>
                                </p>

                            </div>
                            <div class="group">
                                <a href="{{url('/')}}" class="btn btn-primary">Back to home</a>
                            </div>
                        </div>
                    </fieldset>


                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                        <symbol id="icon-paypal" viewBox="0 0 491.2 491.2">
                            <path d="m392.049 36.8c-22.4-25.6-64-36.8-116-36.8h-152.8c-10.4 0-20 8-21.6 18.4l-64 403.2c-1.6 8 4.8 15.2 12.8 15.2h94.4l24-150.4-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-2.4-1.6-2.4-1.6 0 0 5.6-38.4 0-64-20.8-88"
                                  fill="#263b80"/>
                            <path d="m412.849 124.8c-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-29.6 186.4c-.8 7.2 4 13.6 11.2 13.6h79.2c9.6 0 17.6-7.2 19.2-16l.8-4 15.2-94.4.8-5.6c1.6-9.6 9.6-16 19.2-16h12c76.8 0 136.8-31.2 154.4-121.6 7.2-37.6 3.2-69.6-16-91.2-6.4-7.2-13.6-12.8-21.6-17.6"
                                  fill="#139ad6"/>
                            <path d="m391.249 116.8c-3.2-.8-6.4-1.6-9.6-2.4s-6.4-1.6-10.4-1.6c-12-2.4-25.6-3.2-39.2-3.2h-119.2c-3.2 0-5.6.8-8 1.6-5.6 2.4-9.6 8-10.4 14.4l-25.6 160.8-.8 4.8c1.6-10.4 10.4-18.4 21.6-18.4h44.8c88 0 156.8-36 176.8-139.2.8-3.2.8-6.4 1.6-8.8-4.8-2.4-10.4-4.8-16.8-7.2-1.6 0-3.2-.8-4.8-.8"
                                  fill="#232c65"/>
                            <path d="m275.249 0h-152c-10.4 0-20 8-21.6 18.4l-36.8 230.4 246.4-246.4c-11.2-1.6-23.2-2.4-36-2.4z"
                                  fill="#2a4dad"/>
                            <path d="m441.649 153.6c-2.4-4-4-8-7.2-12-5.6-6.4-13.6-12-21.6-16.8-.8 3.2-.8 5.6-1.6 8.8-20 103.2-88.8 139.2-176.8 139.2h-44.8c-10.4 0-20 8-21.6 18.4l-25.6 161.6z"
                                  fill="#0d7dbc"/>
                            <path d="m50.449 436.8h94.4l23.2-145.6c0-2.4.8-4 1.6-5.6l-131.2 131.2-.8 4.8c-.8 8 4.8 15.2 12.8 15.2z"
                                  fill="#232c65"/>
                            <path d="m246.449 0h-123.2c-3.2 0-5.6.8-8 1.6l-12 12c-.8 1.6-1.6 3.2-1.6 4.8l-24 150.4z"
                                  fill="#436bc4"/>
                            <path d="m450.449 232.8c2.4-12 3.2-23.2 3.2-34.4l-156 156c76-.8 135.2-32 152.8-121.6z"
                                  fill="#0cb2ed"/>
                            <path d="m248.849 471.2 12.8-80-100 100h68c9.6 0 17.6-7.2 19.2-16z" fill="#0cb2ed"/>
                            <g fill="#33e2ff" opacity=".6">
                                <path d="m408.049 146.4 45.6 45.6c0-5.6-1.6-11.2-2.4-16.8l-40-40c-1.6 4-2.4 7.2-3.2 11.2z"/>
                                <path d="m396.849 180c-1.6 3.2-3.2 6.4-4.8 9.6l55.2 55.2c.8-4 1.6-8 2.4-12z"/>
                                <path d="m431.249 287.2c1.6-3.2 3.2-6.4 4.8-9.6l-60.8-60.8c-2.4 2.4-4 5.6-6.4 8z"/>
                                <path d="m335.249 250.4 69.6 69.6 7.2-7.2-68-68c-3.2 1.6-5.6 3.2-8.8 5.6z"/>
                                <path d="m292.849 266.4 76 76c3.2-1.6 6.4-3.2 9.6-4.8l-74.4-74.4c-4 .8-7.2 2.4-11.2 3.2z"/>
                                <path d="m320.849 353.6c4-.8 8.8-.8 12.8-1.6l-80-80c-4.8 0-8.8.8-13.6.8z"/>
                                <path d="m196.049 272.8h-6.4c-2.4 0-4.8.8-6.4.8l86.4 87.2c2.4-2.4 5.6-4.8 8.8-5.6z"/>
                                <path d="m164.049 314.4 94.4 94.4 2.4-12.8-94.4-94.4z"/>
                                <path d="m156.049 364.8 94.4 94.4 2.4-12-94.4-94.4z"/>
                                <path d="m150.449 403.2-1.6 12.8 75.2 75.2h5.6c2.4 0 4.8-.8 7.2-1.6z"/>
                                <path d="m140.049 466.4 24.8 24.8h14.4l-36.8-36.8z"/>
                            </g>
                        </symbol>
                        <symbol id="icon-stripe" viewBox="0 0 512 512">
                            <path fill="#6772E5"
                                  d="M66.8 0C29.9 0 0 29.9 0 66.8v378.4C0 482.1 29.9 512 66.8 512h378.4c36.9 0 66.8-29.9 66.8-66.8V66.8C512 29.9 482.1 0 445.2 0H66.8zM426.3 251.8c0-52.9-43-95.8-95.8-95.8s-95.8 43-95.8 95.8c0 52.9 43 95.8 95.8 95.8s95.8-43 95.8-95.8zm-157.5-46c0-39.6 32.2-71.8 71.8-71.8s71.8 32.2 71.8 71.8H268.8zM316 338.5c-1.4 0-2.8-.3-4.2-.8l-20.5-7.4c-4.4-1.6-7.3-5.7-7.3-10.3V207.7c0-4.6 2.9-8.7 7.3-10.3l20.5-7.4c4.2-1.5 8.9-.3 11.8 3.1l92.3 113.8c3.5 4.3 3.1 10.7-.9 14.3l-71.2 51.3c-2.7 1.9-6.2 2.9-9.7 2.9zm-71.8 27.7c0 12.1-9.9 21.8-21.8 21.8s-21.8-9.8-21.8-21.8c0-12 9.8-21.8 21.8-21.8s21.8 9.8 21.8 21.8zm71.8-25.2c0 1.2.1 2.3.3 3.5l23.6 8.5c4.2 1.6 7.3 5.7 7.3 10.3v33.5c0 4.6-2.9 8.7-7.3 10.3l-23.6 8.5c-2.5.9-5.2.8-7.7-.2l-22.4-8c-2.4-.8-4.1-2.8-4.8-5.3l-11-34.3 56.9-41.1-11.2 34.8z"/>
                        </symbol>
                    </svg>
                </div>
            </div>
        </div>
    </div>

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


</body>
</html>
