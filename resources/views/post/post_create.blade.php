@extends('layouts.master')

@php
    $postTypes ??= [];
    $countries ??= [];
@endphp

@section('meta_title', 'Get Offer | Cashingcarz Orlando')
@section('meta_description', 'Get Offer for your junk car in minutes with Cashing Carz Orlando. Fast quotes, top cash offers, and hassle-free vehicle removal today.')
@section('meta_keywords', 'Get Offer')
@section('meta_robots', 'index, follow')

@section('content')

    <div class="main-container">
        <div class="container">
            <div class="row mt-5">


                <div class="col-md-9 page-content">
                    <div class="inner-box category-content" style="overflow: visible;">
                        <h1 class="title-2">
                            <strong><i class="far fa-edit"></i> {{ __('Get Your Offer') }}</strong>
                        </h1>

                        <div class="row">
                            <div class="col-xl-12">

                                <form class="form-horizontal"
                                      id=""
                                      method="POST"
                                      action="{{route('get_car_model_sub_store')}}"
                                      enctype="multipart/form-data"
                                >
                                    {!! csrf_field() !!}
                                    @honeypot
                                    <fieldset>
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_reg_year" id="category"
                                                        onchange="categorys()" required>
                                                    <option value="">What year is your car?</option>
                                                    @foreach(\App\Models\Category:: where('active',1)->where('parent_id',null)->orderBy('name','DESC')->get() as $category)
                                                        <option value="{{$category->id}}"
                                                                @if(request()->get('year')==$category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">

                                                <select class="form-select" name="car_brand" id="subcategorys"
                                                        onchange="sub_categorys()" required>
                                                    @if(request()->get('brand'))
                                                        <option value="{{request()->get('brand')}}">{{\App\Models\Category::where('id',request()->get('brand'))->value('name')}}</option>
                                                    @endif

                                                </select>

                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_model" id="sub_subcategorys"
                                                        onchange="sub_sub_categorys()" required>
                                                    @if(request()->get('model'))
                                                        <option value="{{request()->get('model')}}">{{\App\Models\Category::where('id',request()->get('model'))->value('name')}}</option>
                                                    @endif

                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_sub_model"
                                                        id="sub_sub_subcategorys">

                                                    @if(request()->get('sub_model'))
                                                        <option value="{{request()->get('sub_model')}}">{{\App\Models\Category::where('id',request()->get('sub_model'))->value('name')}}</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_mileage" id="" required>
                                                    <option value="">What's the mileage on your car?</option>
                                                    <option value="Yes">Over 150k miles</option>
                                                    <option value="No">Under 150k miles</option>
                                                    <option value="NoNo">Unknown/ can’t see</option>
                                                </select>

                                            </div>
                                            <div class="col-md-6 mb-2">

                                                <select class="form-select" name="car_title" id="" required>
                                                    <option value="">Do you have the title in hand?</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-2">

                                                <select class="form-select" name="car_title_clear" id="car_owner"
                                                        onchange="" required>
                                                    <option value="">Does your car have a clean title?</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            {{--                                            <div class="col-md-6 mb-2">--}}
                                            {{--                                                <input class="form-control"--}}
                                            {{--                                                       placeholder="Where will we pick up your car ?" type="text"--}}
                                            {{--                                                       name="car_pickup_point"--}}
                                            {{--                                                       id="" required>--}}

                                            {{--                                            </div>--}}
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_owner" id="" required>
                                                    <option value="">Do you own the car</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_wheels" id=""
                                                        onchange="" required>
                                                    <option value="">Are all of the wheels and tires inflated and on
                                                        your car?
                                                    </option>
                                                    <option value="Yes">Intact</option>
                                                    <option value="No">inflated</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_battery" id="" required>
                                                    <option value="">Is the car’s battery working and do you have a
                                                        working key or fob?
                                                    </option>
                                                    <option value="Yes">Yes and working</option>
                                                    <option value="No">No and not working</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_start" id="car_start" onchange="" required>
                                                    <option value="">Can you start and drive your car?</option>
                                                    <option value="Yes">Yes it start and drive</option>
                                                    <option value="No">No it start but doesn’t drive</option>
                                                    <option value="NoNo">No it doesn’t start or drive</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_condition" id="car_owner"
                                                        onchange="" required>
                                                    <option value=""> Condition of your car engine transmission?
                                                    </option>
                                                    <option value="Yes">Engine and transmission are installed and
                                                        intact
                                                    </option>
                                                    <option value="No">Engine and transmission missing</option>
                                                </select>

                                            </div>
                                        </div>
                                        
                                        {{-- Desired Price Field (conditional) - Full width row --}}
                                        <div class="row mb-3" id="desired_price_field" style="display: none;">
                                            <div class="col-md-6">
                                                <label for="desired_price" class="form-label">What is your desired price?</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" 
                                                           name="desired_price" 
                                                           id="desired_price" 
                                                           class="form-control" 
                                                           placeholder="Enter your desired price"
                                                           min="0"
                                                           step="0.01">
                                                </div>
                                                <small class="form-text text-muted">Enter the price you'd like to receive for your car.</small>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_exterior_damage" id=""
                                                        onchange="" required>
                                                    <option value="">Does your car have exterior damage?</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_exterior_missing" id="car_owner"
                                                        onchange="" required>
                                                    <option value="">Are there any exterior parts missing or damaged?
                                                    </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3">

                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_catalytic" id="car_owner"
                                                        onchange="" required>
                                                    <option value="">Does your car have its catalytic converter?
                                                    </option>
                                                    <option value="Yes">Yes attached</option>
                                                    <option value="No">No missing</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_interior" id="car_owner"
                                                        onchange="" required>
                                                    <option value="">Does the interior of your car have missing parts or
                                                        major damage?
                                                    </option>
                                                    <option value="Yes">All intact</option>
                                                    <option value="No">Missing</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">

                                            <div class="col-md-6 mb-2">
                                                <select class="form-select" name="car_flood" id="car_owner"
                                                        onchange="" required>
                                                    <option value="">Has your car ever been in a flood or fire
                                                    </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                            {{-- city_id --}}
                                            <?php $cityIdError = (isset($errors) && $errors->has('city_id')) ? ' is-invalid' : ''; ?>
                                            <div id="cityBox" class=" col-md-6 mb-3 required">
                                                <select id="cityId" name="city_id"
                                                        class="form-control large-data-selecter{{ $cityIdError }}"
                                                        required>
                                                    <option value="0" @selected(empty(old('city_id')))>
                                                        {{ t('select_a_city') }}
                                                    </option>
                                                </select>

                                            </div>
                                        </div>


                                        {{-- price --}}
                                        {{--                                        @php--}}
                                        {{--                                            $priceError = (isset($errors) && $errors->has('price')) ? ' is-invalid' : '';--}}
                                        {{--                                            $currencySymbol = config('currency.symbol', 'X');--}}
                                        {{--                                            $price = old('price');--}}
                                        {{--                                            $price = \App\Helpers\Number::format($price, 2, '.', '');--}}
                                        {{--                                        @endphp--}}
                                        {{--                                        <div id="priceBloc" class="row mb-3">--}}
                                        {{--                                            <label class="col-md-3 col-form-label{{ $priceError }}"--}}
                                        {{--                                                   for="price">{{ t('price') }}</label>--}}
                                        {{--                                            <div class="col-md-8">--}}
                                        {{--                                                <div class="input-group">--}}
                                        {{--                                                    <span class="input-group-text">{!! $currencySymbol !!}</span>--}}
                                        {{--                                                    <input id="price"--}}
                                        {{--                                                           name="price"--}}
                                        {{--                                                           class="form-control{{ $priceError }}"--}}
                                        {{--                                                           placeholder="{{ t('ei_price') }}"--}}
                                        {{--                                                           type="number"--}}
                                        {{--                                                           min="0"--}}
                                        {{--                                                           step="{{ getInputNumberStep((int)config('currency.decimal_places', 2)) }}"--}}
                                        {{--                                                           value="{!! $price !!}"--}}
                                        {{--                                                    >--}}
                                        {{--                                                    <span class="input-group-text">--}}
                                        {{--														<input id="negotiable" name="negotiable" type="checkbox"--}}
                                        {{--                                                               value="1" @checked(old('negotiable') == '1')>&nbsp;<small>{{ t('negotiable') }}</small>--}}
                                        {{--													</span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                @if (config('settings.single.price_mandatory') != '1')--}}
                                        {{--                                                    <div class="form-text text-muted">{{ t('price_hint') }}</div>--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        {{-- country_code --}}
                                        @php
                                            $countryCodeError = (isset($errors) && $errors->has('country_code')) ? ' is-invalid' : '';
                                            $countryCodeValue = (!empty(config('ipCountry.code'))) ? config('ipCountry.code') : 0;
                                            $countryCodeValue = old('country_code', $countryCodeValue);
                                        @endphp
                                        @if (empty(config('country.code')))
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label{{ $countryCodeError }}"
                                                       for="country_code">
                                                    {{ t('your_country') }} <sup>*</sup>
                                                </label>
                                                <div class="col-md-8">
                                                    <select id="countryCode" name="country_code"
                                                            class="form-control large-data-selecter{{ $countryCodeError }}">
                                                        <option value="0"
                                                                data-admin-type="0" @selected(empty(old('country_code')))>
                                                            {{ t('select_a_country') }}
                                                        </option>
                                                        @foreach ($countries as $item)
                                                            <option value="{{ data_get($item, 'code') }}"
                                                                    data-admin-type="{{ data_get($item, 'admin_type') }}"
                                                                    @selected($countryCodeValue == data_get($item, 'code'))
                                                            >
                                                                {{ data_get($item, 'name') }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @else
                                            <input id="countryCode" name="country_code" type="hidden"
                                                   value="{{ config('country.code') }}">
                                        @endif

                                        @php
                                            $adminType = config('country.admin_type', 0);
                                        @endphp
                                        @if (config('settings.single.city_selection') == 'select')
                                            @if (in_array($adminType, ['1', '2']))
                                                {{-- admin_code --}}
                                                    <?php $adminCodeError = (isset($errors) && $errors->has('admin_code')) ? ' is-invalid' : ''; ?>
                                                <div id="locationBox" class="row mb-3 required">
                                                    <label class="col-md-3 col-form-label{{ $adminCodeError }}"
                                                           for="admin_code">
                                                        {{ t('location') }} <sup>*</sup>
                                                    </label>
                                                    <div class="col-md-8">
                                                        <select id="adminCode" name="admin_code"
                                                                class="form-control large-data-selecter{{ $adminCodeError }}">
                                                            <option value="0" @selected(empty(old('admin_code')))>
                                                                {{ t('select_your_location') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <input type="hidden"
                                                   id="selectedAdminType"
                                                   name="selected_admin_type"
                                                   value="{{ old('selected_admin_type', $adminType) }}"
                                            >
                                            <input type="hidden"
                                                   id="selectedAdminCode"
                                                   name="selected_admin_code"
                                                   value="{{ old('selected_admin_code', 0) }}"
                                            >
                                            <input type="hidden"
                                                   id="selectedCityId"
                                                   name="selected_city_id"
                                                   value="{{ old('selected_city_id', 0) }}"
                                            >
                                            <input type="hidden"
                                                   id="selectedCityName"
                                                   name="selected_city_name"
                                                   value="{{ old('selected_city_name') }}"
                                            >
                                        @endif




                                        {{-- tags --}}
                                        @php
                                            $tagsError = (isset($errors) && $errors->has('t ags.*')) ? ' is-invalid' : '';
                                            $tags = old('tags');
                                        @endphp
                                        {{--                                        <div class="row mb-3">--}}
                                        {{--                                            <label class="col-md-3 col-form-label{{ $tagsError }}"--}}
                                        {{--                                                   for="tags">{{ t('Tags') }}</label>--}}
                                        {{--                                                                                        <div class="col-md-8">--}}
                                        {{--                                                                                            <select id="tags" name="tags[]" class="form-control tags-selecter"--}}
                                        {{--                                                                                                    multiple="multiple">--}}
                                        {{--                                                                                                @if (!empty($tags))--}}
                                        {{--                                                                                                    @foreach($tags as $iTag)--}}
                                        {{--                                                                                                        <option selected="selected">{{ $iTag }}</option>--}}
                                        {{--                                                                                                    @endforeach--}}
                                        {{--                                                                                                @endif--}}
                                        {{--                                                                                            </select>--}}
                                        {{--                                                <div class="form-text text-muted">--}}
                                        {{--                                                    {!! t('tags_hint', [--}}
                                        {{--                                                                                                                'limit' => (int)config('settings.single.tags_limit', 15),--}}
                                        {{--                                                                                                                'min'   => (int)config('settings.single.tags_min_length', 2),--}}
                                        {{--                                                                                                                'max'   => (int)config('settings.single.tags_max_length', 30)--}}
                                        {{--                                                                                                            ]) !!}--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        {{-- is_permanent --}}
                                        @if (config('settings.single.permanent_listings_enabled') == '3')
                                            <input type="hidden" name="is_permanent" id="isPermanent" value="0">
                                        @else
                                                <?php $isPermanentError = (isset($errors) && $errors->has('is_permanent')) ? ' is-invalid' : ''; ?>
                                            <div id="isPermanentBox" class="row mb-3 required hide">
                                                <label class="col-md-3 col-form-label"></label>
                                                <div class="col-md-8">
                                                    <div class="form-check">
                                                        <input id="isPermanent" name="is_permanent"
                                                               class="form-check-input mt-1{{ $isPermanentError }}"
                                                               value="1"
                                                               type="checkbox" @checked(old('is_permanent') == '1')
                                                        >
                                                        <label class="form-check-label mt-0" for="is_permanent">
                                                            {!! t('is_permanent_label') !!}
                                                        </label>
                                                    </div>
                                                    <div class="form-text text-muted">{{ t('is_permanent_hint') }}</div>
                                                    <div style="clear:both"></div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="content-subheading">
                                            <i class="fas fa-location-arrow"></i>
                                            <strong>{{ __('Pickup_information') }}</strong>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="address">Address <sup>*</sup></label>
                                                <textarea class="form-control" name="car_pickup_point_address"
                                                          id="address" cols="30"
                                                          rows="3" required></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="time_slot">Time Slot <sup>*</sup></label>
                                                <input class="form-control" type="datetime-local"
                                                       name="car_pickup_time_slot"
                                                       id="time_slot" required>
                                            </div>
                                        </div>

                                        <div class="content-subheading">
                                            <i class="fas fa-user"></i>
                                            <strong>{{ t('seller_information') }}</strong>
                                        </div>


                                        {{-- contact_name --}}
                                        <?php $contactNameError = (isset($errors) && $errors->has('contact_name')) ? ' is-invalid' : ''; ?>
                                        @if (auth()->check())
                                            <input id="contactName" name="contact_name" type="hidden"
                                                   value="{{ auth()->user()->name }}">
                                        @else
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label{{ $contactNameError }}"
                                                       for="contact_name">
                                                    {{ t('your_name') }} <sup>*</sup>
                                                </label>
                                                <div class="col-md-9 col-lg-8 col-xl-6">
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i
                                                                    class="far fa-user"></i></span>
                                                        <input id="contactName" name="contact_name"
                                                               placeholder="{{ t('your_name') }}"
                                                               class="form-control input-md{{ $contactNameError }}"
                                                               type="text"
                                                               value="{{ old('contact_name') }}"
                                                               required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- auth_field (as notification channel) --}}
                                        @php
                                            $authFields = getAuthFields(true);
                                            $authFieldError = (isset($errors) && $errors->has('auth_field')) ? ' is-invalid' : '';
                                            $usersCanChooseNotifyChannel = isUsersCanChooseNotifyChannel();
                                            $authFieldValue = ($usersCanChooseNotifyChannel) ? (old('auth_field', getAuthField())) : getAuthField();
                                        @endphp
                                        @if ($usersCanChooseNotifyChannel)
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label"
                                                       for="auth_field">{{ t('notifications_channel') }}
                                                    <sup>*</sup></label>
                                                <div class="col-md-9">
                                                    @foreach ($authFields as $iAuthField => $notificationType)
                                                        <div class="form-check form-check-inline pt-2">
                                                            <input name="auth_field"
                                                                   id="{{ $iAuthField }}AuthField"
                                                                   value="{{ $iAuthField }}"
                                                                   class="form-check-input auth-field-input{{ $authFieldError }}"
                                                                   type="radio"
                                                                   @checked($authFieldValue == $iAuthField) }}
                                                            >
                                                            <label class="form-check-label mb-0"
                                                                   for="{{ $iAuthField }}AuthField">
                                                                {{ $notificationType }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <div class="form-text text-muted">
                                                        {{ t('notifications_channel_hint') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <input id="{{ $authFieldValue }}AuthField" name="auth_field"
                                                   type="hidden"
                                                   value="{{ $authFieldValue }}">
                                        @endif

                                        @php
                                            $forceToDisplay = isBothAuthFieldsCanBeDisplayed() ? ' force-to-display' : '';
                                        @endphp

                                        {{-- email --}}
                                        @php
                                            $emailError = (isset($errors) && $errors->has('email')) ? ' is-invalid' : '';
                                            $emailValue = (auth()->check() && isset(auth()->user()->email)) ? auth()->user()->email : '';
                                        @endphp
                                        <div class="row mb-3 auth-field-item required{{ $forceToDisplay }}">
                                            <label class="col-md-3 col-form-label{{ $emailError }}"
                                                   for="email">{{ t('email') }}
                                                @if (getAuthField() == 'email')
                                                    <sup>*</sup>
                                                @endif
                                            </label>
                                            <div class="col-md-9 col-lg-8 col-xl-6">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                                class="far fa-envelope"></i></span>
                                                    <input id="email" name="email"
                                                           class="form-control{{ $emailError }}"
                                                           placeholder="{{ t('email_address') }}"
                                                           type="text"
                                                           value="{{ old('email', $emailValue) }}"
                                                           required
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        {{-- phone --}}
                                        @php
                                            $phoneError = (isset($errors) && $errors->has('phone')) ? ' is-invalid' : '';
                                            $phoneValue = null;
                                            $phoneCountryValue = config('country.code');
                                            if (
                                                auth()->check()
                                                && isset(auth()->user()->country_code)
                                                && !empty(auth()->user()->phone)
                                                && isset(auth()->user()->phone_country)
                                                // && auth()->user()->country_code == config('country.code')
                                            ) {
                                                $phoneValue = auth()->user()->phone;
                                                $phoneCountryValue = auth()->user()->phone_country;
                                            }
                                            $phoneValue = phoneE164($phoneValue, $phoneCountryValue);
                                            $phoneValueOld = phoneE164(old('phone', $phoneValue), old('phone_country', $phoneCountryValue));
                                        @endphp
                                        <div class="row mb-3 auth-field-item required{{ $forceToDisplay }}">
                                            <label class="col-md-3 col-form-label{{ $phoneError }}"
                                                   for="phone">{{ t('phone_number') }}
                                                @if (getAuthField() == 'phone')
                                                    <sup>*</sup>
                                                @endif
                                            </label>
                                            <div class="col-md-9 col-lg-8 col-xl-6">
                                                <div class="input-group">
                                                    <input id="phone" name="phone"
                                                           class="form-control input-md{{ $phoneError }}"
                                                           type="tel"
                                                           value="{{ $phoneValueOld }}"
                                                           required
                                                    >
                                                    <span class="input-group-text iti-group-text">
														<input id="phoneHidden" name="phone_hidden" type="checkbox"
                                                               value="1" @checked(old('phone_hidden') == '1')>&nbsp;
														<small>{{ t('Hide') }}</small>
													</span>
                                                </div>
                                                <input name="phone_country" type="hidden"
                                                       value="{{ old('phone_country', $phoneCountryValue) }}">
                                            </div>
                                        </div>

                                        @if (!auth()->check())
                                            @if (in_array(config('settings.single.auto_registration'), [1, 2]))
                                                {{-- auto_registration --}}
                                                @if (config('settings.single.auto_registration') == 1)
                                                        <?php $autoRegistrationError = (isset($errors) && $errors->has('auto_registration')) ? ' is-invalid' : ''; ?>
                                                    <div class="row mb-3 required">
                                                        <label class="col-md-3 col-form-label"></label>
                                                        <div class="col-md-8">
                                                            <div class="form-check">
                                                                <input name="auto_registration"
                                                                       id="auto_registration"
                                                                       class="form-check-input{{ $autoRegistrationError }}"
                                                                       value="1"
                                                                       type="checkbox"
                                                                       checked="checked"
                                                                >
                                                                <label class="form-check-label"
                                                                       for="auto_registration">
                                                                    {!! t('I want to register by submitting this listing') !!}
                                                                </label>
                                                            </div>
                                                            <div class="form-text text-muted">
                                                                {{ t('You will receive your authentication information by email') }}
                                                            </div>
                                                            <div style="clear:both"></div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="auto_registration"
                                                           id="auto_registration"
                                                           value="1">
                                                @endif
                                            @endif
                                        @endif

                                        @includeFirst([
                                            config('larapen.core.customizedViewPath') . 'post.createOrEdit.singleStep.inc.packages',
                                            'post.createOrEdit.singleStep.inc.packages'
                                        ])

                                        @include('layouts.inc.tools.captcha', ['colLeft' => 'col-md-3', 'colRight' => 'col-md-8'])

                                        @if (!auth()->check())
                                            {{-- accept_terms --}}
                                                <?php $acceptTermsError = (isset($errors) && $errors->has('accept_terms')) ? ' is-invalid' : ''; ?>
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label"></label>
                                                <div class="col-md-8">
                                                    <div class="form-check">
                                                        <input name="accept_terms" id="acceptTerms"
                                                               class="form-check-input{{ $acceptTermsError }}"
                                                               value="1"
                                                               type="checkbox" @checked(old('accept_terms') == '1')
                                                        >
                                                        <label class="form-check-label" for="acceptTerms"
                                                               style="font-weight: normal;">
                                                            {!! t('accept_terms_label', ['attributes' => getUrlPageByType('terms')]) !!}
                                                        </label>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                            </div>

                                            {{-- accept_marketing_offers --}}
                                                <?php $acceptMarketingOffersError = (isset($errors) && $errors->has('accept_marketing_offers')) ? ' is-invalid' : ''; ?>
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label"></label>
                                                <div class="col-md-8">
                                                    <div class="form-check">
                                                        <input name="accept_marketing_offers"
                                                               id="acceptMarketingOffers"
                                                               class="form-check-input{{ $acceptMarketingOffersError }}"
                                                               value="1"
                                                               type="checkbox" @checked(old('accept_marketing_offers') == '1')
                                                        >
                                                        <label class="form-check-label" for="acceptMarketingOffers"
                                                               style="font-weight: normal;">
                                                            {!! t('accept_marketing_offers_label') !!}
                                                        </label>
                                                    </div>
                                                    <div style="clear:both"></div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- Button  --}}
                                        <div class="row mb-3 pt-3">
                                            <div class="col-md-12 text-center">
                                                <button id="submitPayableForm"
                                                        class="btn btn-primary btn-lg">{{ __('Get Offer') }}</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    @includeFirst([
                        config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.right-sidebar',
                        'post.createOrEdit.inc.right-sidebar'
                    ])
                </div>

            </div>
        </div>
    </div>
    @includeFirst([
        config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.category-modal',
        'post.createOrEdit.inc.category-modal'
    ])
@endsection


@section('after_scripts')
    <script>
        function categorys() {
            var category_id = $('#category').val();
            $('#subcategorys').html('');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get_car_model')}}",
                type: 'GET',
                data: {category_id: category_id},
                dataType: 'json',
                success: function (response) {
                    console.log(response);

                    $('#subcategorys').html('<option value="">-- Select Car Brand --</option>');
                    $.each(response.states, function (key, value) {
                        $("#subcategorys").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }

        function sub_categorys() {
            var sub_category_id = $('#subcategorys').val();
            $('#sub_subcategorys').html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get_car_model_sub')}}",
                type: 'GET',
                data: {sub_category_id: sub_category_id},
                dataType: 'json',
                success: function (response) {
                    console.log(response);

                    $('#sub_subcategorys').html('<option value="">-- Select Car Model --</option>');
                    $.each(response.states, function (key, value) {
                        $("#sub_subcategorys").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }

        function sub_sub_categorys() {
            var sub_category_id = $('#sub_subcategorys').val();
            $('#sub_sub_subcategorys').html('');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('get_car_model_sub_sub')}}",
                type: 'GET',
                data: {sub_category_id: sub_category_id},
                dataType: 'json',
                success: function (response) {
                    console.log(response);

                    $('#sub_sub_subcategorys').html('<option value="">-- Select Car Sub Model --</option>');
                    $.each(response.states, function (key, value) {
                        $("#sub_sub_subcategorys").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }
        
       // Desired Price Field Toggle - Show for ALL selections
        $(document).ready(function() {
            const carStartSelect = $('select[name="car_start"]');
            const desiredPriceField = $('#desired_price_field');
            const desiredPriceLabel = $('#desired_price_label');
            
            console.log('Car Start Select Found:', carStartSelect.length);
            
            // Listen for change event
            carStartSelect.on('change', function() {
                var selectedValue = $(this).val();
                console.log('Selected value:', selectedValue);
                
                // Show field for any selection
                if (selectedValue !== '') {
                    desiredPriceField.slideDown();
                    
                    // Change label based on selection
                    if (selectedValue === 'Yes') {
                        desiredPriceLabel.text('What is your desired price?');
                    } else {
                        desiredPriceLabel.text('What is your desired price?');
                    }
                    
                    console.log('Showing desired price field');
                } else {
                    desiredPriceField.slideUp();
                    $('#desired_price').val('');
                    console.log('Hiding desired price field');
                }
            });
            
            // Check on page load
            if (carStartSelect.val() !== '' && carStartSelect.val() !== null) {
                desiredPriceField.show();
            }
        });
    </script>
@endsection

@includeFirst([
	config('larapen.core.customizedViewPath') . 'post.createOrEdit.inc.form-assets',
	'post.createOrEdit.inc.form-assets'
])
