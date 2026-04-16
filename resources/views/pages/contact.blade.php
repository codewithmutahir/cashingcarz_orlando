{{--
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 * Author: BeDigit | https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - https://codecanyon.net/licenses/standard
--}}
@extends('layouts.master')

@section('meta_title', 'Contact Cashing Orlando | Junk Car Buyers')
@section('meta_description', 'Call or message Cashing Orlando for cash-for-cars help in Orlando & Central Florida. Free towing with accepted offers and same-day pickup options.')
@section('meta_keywords', 'Contact Us')
@section('meta_robots', 'index, follow')


@section('search')
    @parent
    @includeFirst([config('larapen.core.customizedViewPath') . 'pages.contact.intro', 'pages.contact.intro'])
@endsection

@section('content')
    @includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
    <div class="main-container">
        <div class="container">
            <div class="row mb-3 clearfix">

                @if (isset($errors) && $errors->any())
                    <div class="col-xl-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="{{ t('Close') }}"></button>
                            <h5><strong>{{ t('oops_an_error_has_occurred') }}</strong></h5>
                            <ul class="list list-check">
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session()->has('flash_notification'))
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                @include('flash::message')
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="contact-form co-contact-form">
                        <div class="co-page-hero co-contact-hero mb-0">
                            <h1 class="mt-0 text-center">
                                <strong>{{ t('Contact Us') }}</strong>
                            </h1>
                            <p class="text-center mb-0">We're here to assist you with all your car selling needs. Whether you have questions about our services, want to get a quote for your vehicle, or need assistance with a current transaction, our dedicated team is ready to help.</p>
                        </div>


                        <form class="form-horizontal needs-validation " method="post"
                              action="{{ \App\Helpers\UrlGen::contact() }}">
                            {!! csrf_field() !!}
                            @honeypot
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?php $firstNameError = (isset($errors) && $errors->has('first_name')) ? ' is-invalid' : ''; ?>
                                        <div class="form-floating required">
                                            <input id="first_name" name="first_name" type="text"
                                                   placeholder="{{ t('first_name') }}"
                                                   class="form-control{{ $firstNameError }}"
                                                   value="{{ old('first_name') }}">
                                            <label for="first_name">{{ t('first_name') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <?php $lastNameError = (isset($errors) && $errors->has('last_name')) ? ' is-invalid' : ''; ?>
                                        <div class="form-floating required">
                                            <input id="last_name" name="last_name" type="text"
                                                   placeholder="{{ t('last_name') }}"
                                                   class="form-control{{ $lastNameError }}"
                                                   value="{{ old('last_name') }}">
                                            <label for="last_name">{{ t('last_name') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <?php $companyNameError = (isset($errors) && $errors->has('company_name')) ? ' is-invalid' : ''; ?>
                                        <div class="form-floating required">
                                            <input id="company_name" name="company_name" type="text"
                                                   placeholder="{{ t('company_name') }}"
                                                   class="form-control{{ $companyNameError }}"
                                                   value="{{ old('company_name') }}">
                                            <label for="company_name">{{ t('company_name') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <?php $emailError = (isset($errors) && $errors->has('email')) ? ' is-invalid' : ''; ?>
                                        <div class="form-floating required">
                                            <input id="email" name="email" type="text"
                                                   placeholder="{{ t('email_address') }}"
                                                   class="form-control{{ $emailError }}"
                                                   value="{{ old('email') }}">
                                            <label for="email">{{ t('email_address') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <?php $messageError = (isset($errors) && $errors->has('message')) ? ' is-invalid' : ''; ?>
                                        <div class="form-floating required">
											<textarea class="form-control{{ $messageError }}" id="message"
                                                      name="message" placeholder="{{ t('Message') }}"
                                                      rows="7" style="height: 150px">{{ old('message') }}</textarea>
                                            <label for="message">{{ t('Message') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        @include('layouts.inc.tools.captcha')
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit"
                                                class="btn btn-primary btn-lg">{{ __('Get a Quote') }}</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-3 clearfix g-3 co-contact-info-row">
                <div class="col-md-4">
                    <div class="text-center co-contact-info-card">
                        <div class="imoji p-3">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </div>
                        <div class="detail">
                            <h3 class="p-2">Address</h3>
                            <p>
                               <strong>Florida (primary)</strong><br>
                                Orlando area &amp; Central Florida service zone<br>
                                <strong>Kissimmee:</strong> 2703 Eagle Ridge Loop, Kissimmee, FL 34746<br>
                                <strong>Texas (legacy office):</strong> 1024 Alyssa Ln, Carrollton, TX 75006
                            </p>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center co-contact-info-card">
                        <div class="imoji p-3">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="detail">
                            <h3 class="p-2">Email</h3>
                            <p>
                                info@cashingcarz.com
                            </p>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center co-contact-info-card">
                        <div class="imoji p-3">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="detail">
                            <h3 class="p-2">Phone</h3>
                            
                            <p>
                               <strong>Orlando / Central FL:</strong> +1 (407) 442-0085
                            </p>
                             <p>
                               <strong>Florida:</strong> +1 (321) 442-0085
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <p class="mb-4 mt-3 p-4 co-content-panel">
                        Welcome to <strong>Cashing Orlando</strong> — your upbeat partner for selling or donating a vehicle
                        across Orlando and Central Florida. We keep the process clear, fast, and human.
                    </p>

                    <div class="content-content mb-5 co-content-panel p-4">
                        <h1>About Cashing Carz</h1>
                        <p>
                            We understand that selling or donating a car can be a daunting task. That's why we've made
                            it our mission to simplify the process and offer unparalleled service to our customers. With
                            years of experience in the industry, we have fine-tuned our approach to ensure that every
                            transaction is smooth, efficient, and fair.
                            Our team at Carz is comprised of automotive experts who are passionate about helping our
                            customers get the most value for their vehicles. Whether you're selling a car, donating a
                            vehicle, or looking for assistance with any automotive-related matter, we're here to help.
                            We buy vehicles of all makes, models, and conditions, and we're committed to offering
                            competitive prices, prompt payment, and hassle-free transactions.
                            What sets Cashing Carz apart is our dedication to customer satisfaction. We understand that
                            selling or donating a car is a big decision, and we're here to support you every step of the
                            way. From providing accurate and transparent valuations to offering free towing services and
                            handling all the paperwork, we strive to make the process as seamless and stress-free as
                            possible.

                            <br><br>
                            Ready to sell or donate your car with Cashing Carz? Have questions about our services or
                            need assistance with any automotive-related matter? We're here to help!
                            <br><br>
                            Phone: +1 469-383-8321<br>
                            Email: info@cashingcarz.com<br>
                            Address: 1024 Alyssa ln Carrollton tx 75006<br>
                            <br>
                            Whether you prefer to give us a call, send us an email, or visit us in person, our friendly
                            and knowledgeable team is ready to assist you. Contact us today to learn more about our
                            services and how we can help you with your car sale or donation needs.
                            <br>
                            Thank you for considering Cashing Carz. We look forward to serving you and helping you get
                            the best value for your vehicle or make a meaningful contribution to a worthy cause.


                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script src="{{ url('assets/js/form-validation.js') }}"></script>
@endsection
