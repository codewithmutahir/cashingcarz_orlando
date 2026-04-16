@extends('layouts.master')

@section('meta_title', 'Cashing Orlando | Cash for Junk Cars — Same-Day Pickup')
@section('meta_description', 'Cashing Orlando buys junk cars for cash in Orlando & Central Florida. Fast offers, free towing, same-day pickup. Get your offer in minutes!')
@section('meta_keywords', 'cash for junk cars Orlando, sell junk car Orlando, Cashing Orlando')
@section('meta_robots', 'index, follow')

@section('search')
    @parent
@endsection

@section('content')
    <style>
        html { overflow-x: hidden; }
    </style>
    <div class="main-container" id="homepage">

        @if (session()->has('flash_notification'))
            @includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('flash::message')
                    </div>
                </div>
            </div>
        @endif

        {{-- HERO --}}
        <section class="co-hero" id="co-hero" aria-labelledby="co-hero-title">
            <div class="co-hero__bg" aria-hidden="true"></div>
            <div class="container">
                <div class="co-hero__grid">
                    <div>
                        <span class="co-hero__pill">Orlando&apos;s #1 Cash For Cars Service</span>
                        <h1 id="co-hero-title" class="co-hero__title">
                            <span class="co-hero__line">Turn Your</span>
                            <span class="co-hero__line">Car Into</span>
                            <span class="co-hero__line"><span class="co-hero__cash">Cash</span> Today.</span>
                        </h1>
                        <p class="co-hero__sub">
                            Same-day pickup across Central Florida. Free towing. No haggling.
                        </p>
                        <div class="co-hero__stars">
                            <a href="https://share.google/DIGY1AzkLkp3Tuv4y" target="_blank" rel="noopener noreferrer">
                                <img src="https://www.citypng.com/public/uploads/preview/google-logo-icon-gsuite-hd-701751694791470gzbayltphh.png" alt="" width="22" height="22">
                            </a>
                            <span aria-hidden="true">⭐⭐⭐⭐⭐</span>
                            <span>5.0 · 147 reviews</span>
                        </div>
                        <div class="co-hero__actions">
                            <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary">Get Offer Now</a>
                            <a href="#co-how-it-works" class="co-btn co-btn--secondary">How It Works</a>
                        </div>
                    </div>
                    <div>
                        <div class="co-hero-card">
                            <p class="co-hero-card__title">What&apos;s your car worth?</p>
                            <form id="search" name="search" action="{{ route('get_offer') }}" method="GET">
                                <div class="row g-2">
                                    <div class="col-12 col-md-6">
                                        <select class="form-select" name="year" id="category" onchange="categorys()">
                                            <option value="">What year is your car?</option>
                                            @foreach(($homeRootCategoriesForYearSelect ?? collect()) as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select class="form-select" name="brand" id="subcategorys" onchange="sub_categorys()"></select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select class="form-select" name="model" id="sub_subcategorys" onchange="sub_sub_categorys()"></select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <select class="form-select" name="sub_model" id="sub_sub_subcategorys"></select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="co-btn co-btn--primary w-100">Get My Offer →</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- STATS --}}
        <section class="co-stats" aria-label="Key statistics">
            <div class="container">
                <div class="co-stats__grid">
                    <div class="co-stats__cell">
                        <span class="co-stats__num">3,000+</span>
                        <span class="co-stats__label">Cars bought per week</span>
                    </div>
                    <div class="co-stats__cell">
                        <span class="co-stats__num">Same Day</span>
                        <span class="co-stats__label">Pickup available</span>
                    </div>
                    <div class="co-stats__cell">
                        <span class="co-stats__num">500,000+</span>
                        <span class="co-stats__label">Satisfied customers</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- INTRO BAND (kept) --}}
        <section class="co-intro-band">
            <div class="container">
                <div class="row align-items-center g-4 g-lg-5">
                    <div class="col-lg-6 order-lg-2">
                        <div class="co-intro-band__media">
                            <img src="https://media.istockphoto.com/id/157434207/photo/recycling-of-cars.jpg?s=612x612&w=0&k=20&c=vcZpknsr3xkGYVv_L4qoEb7oxV4m3gRWs7cI-FgFO0c=" alt="Vehicle recycling and pickup in Orlando" loading="lazy" width="640" height="400">
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <p class="co-intro-band__kicker">Local buyers · Orlando &amp; Central Florida</p>
                        <h2 class="co-intro-band__h">Turn the car in your driveway into cash</h2>
                        <p class="co-intro-band__text">We buy unwanted vehicles in almost any condition — running or not. Get a clear offer, schedule pickup, and get paid without the dealership games.</p>
                        <ul class="co-intro-band__list">
                            <li>
                                <span class="co-check-ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span>Free towing when you accept our offer</span>
                            </li>
                            <li>
                                <span class="co-check-ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span>Paperwork guidance from a real team</span>
                            </li>
                            <li>
                                <span class="co-check-ico" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
                                <span>Same-day pickup windows when available</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        @include('brand')

        @include('home.inc.services-grid')

        @include('home.inc.buycars')

        {{-- WHY (kept) --}}
        <section class="co-why" aria-labelledby="co-why-heading">
            <div class="container">
                <p class="co-section-label">Why us</p>
                <h2 id="co-why-heading" class="co-section-h2">Why sell your car to us</h2>
                <p class="text-center text-muted mb-5 mx-auto" style="max-width: 640px;">Five reasons sellers choose Cashing Orlando over lowball texts and noisy marketplaces.</p>
                <div class="row g-4">
                    <div class="col-md-6 col-xl-4">
                        <article class="co-why-card">
                            <div class="co-why-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M8 36V20l16-10 16 10v16"/><path d="M20 36v-8h8v8"/></svg>
                            </div>
                            <h3 class="co-why-card__title">Strong offers</h3>
                            <p class="co-why-card__text">Competitive cash offers based on real demand — know your number in minutes, not days of back-and-forth.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="co-why-card">
                            <div class="co-why-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M14 24l7 7 13-14"/><circle cx="24" cy="24" r="18"/></svg>
                            </div>
                            <h3 class="co-why-card__title">No dealership drama</h3>
                            <p class="co-why-card__text">Skip the trade-in games and finance office — one buyer, one price, one pickup window.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <article class="co-why-card">
                            <div class="co-why-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75"><rect x="10" y="8" width="28" height="32" rx="2"/><path d="M16 16h16M16 22h10"/></svg>
                            </div>
                            <h3 class="co-why-card__title">Paperwork help</h3>
                            <p class="co-why-card__text">We walk you through title and transfer steps so nothing gets lost in fine print.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <article class="co-why-card h-100">
                            <div class="co-why-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75"><circle cx="24" cy="22" r="8"/><path d="M12 40c2-6 7-9 12-9s10 3 12 9"/></svg>
                            </div>
                            <h3 class="co-why-card__title">Central Florida coverage</h3>
                            <p class="co-why-card__text">Local Orlando focus with the scale of a national buyer — more tow partners, more flexibility.</p>
                        </article>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <article class="co-why-card h-100">
                            <div class="co-why-card__icon" aria-hidden="true">
                                <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.75"><path d="M12 28h24l-2-14H14l-2 14z"/><circle cx="18" cy="34" r="3"/><circle cx="30" cy="34" r="3"/></svg>
                            </div>
                            <h3 class="co-why-card__title">Cash for cars, simplified</h3>
                            <p class="co-why-card__text">One call or form submission — we handle inspection at pickup and pay you on the spot.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        @if (!empty($sections))
            @foreach($sections as $section)
                @php
                    $section ??= [];
                    $sectionView = data_get($section, 'view');
                    $sectionData = (array) data_get($section, 'data');
                @endphp
                @if (!empty($sectionView) && $sectionView === 'home.inc.search')
                    @continue
                @endif
                @if (!empty($sectionView) && view()->exists($sectionView))
                    @if ($sectionView == 'home.inc.latest' || $sectionView == 'home.inc.premium')
                        @includeFirst(
                            [config('larapen.core.customizedViewPath') . $sectionView, $sectionView],
                            ['sectionData' => $sectionData, 'firstSection' => $loop->first]
                        )
                    @endif
                @endif
            @endforeach
        @endif

        @include('home.inc.search')

        @include('home.inc.sold')

        <section class="co-final-cta" aria-labelledby="co-final-cta-h">
            <div class="container">
                <h2 id="co-final-cta-h" class="co-final-cta__h">Ready to get paid?</h2>
                <p class="co-final-cta__sub">Get your offer in 60 seconds. No obligation.</p>
                <a href="{{ route('get_offer') }}" class="co-btn co-btn--final-cta">Get My Offer Now →</a>
            </div>
        </section>

        <div class="container co-legacy-wrap">
            <div class="row co-legacy-panel g-3">
                <div class="col-lg-4 co-legacy-panel__aside">
                    <h3>Why choose us?</h3>
                    <ul>
                        <li>Immediate Cash Deal: Receive a market-competitive rate for your car instantly.</li>
                        <li>Quick Removal: Get your car towed away the same day you sell it with payment on the spot.</li>
                        <li>Hassle-Free Process: Letting go of your old car is no longer a struggle.</li>
                        <li>Effortless Transaction: Sell your car without any hassle.</li>
                        <li>Reliable Expertise: Count on us to guide the process with professionalism and efficiency.</li>
                    </ul>
                </div>
                <div class="col-lg-8 co-legacy-panel__body">
                    <h4>Sell your car today</h4>
                    <ul>
                        <li>Receive an instant offer to sell your car quickly. Get an accurate valuation in just minutes.</li>
                        <li>Rest assured of our guaranteed offer. Once quoted, the amount you receive will not decrease.</li>
                        <li>Receive immediate payment for your car on the spot when we arrive to pick it up.</li>
                    </ul>
                    <h4 class="mt-4">Sell your car the easy way today</h4>
                    <ul>
                        <li>Receive bids directly on your phone, making selling used cars a breeze.</li>
                        <li>Same day pick up in most cases.</li>
                        <li>Receive cash for your car nationwide. We simplify the process, ensuring you can sell your car anywhere.</li>
                    </ul>
                </div>
            </div>

            <div class="row co-legacy-panel g-3">
                <div class="col-lg-4 co-legacy-panel__aside">
                    <h3>Cash for old cars in Orlando — we buy junk vehicles</h3>
                    <ul>
                        <li>No Keys? No Worries: Whether your car has keys or not, we’re still ready to buy.</li>
                        <li>No Tires? Missing tires? We’ll still make you a competitive offer for your junk car.</li>
                        <li>Running or Not: Whether your car is in running condition or nonoperational, we’re here to buy it.</li>
                        <li>Engine Status: Regardless of whether the engine is functioning, we’re still eager to purchase your junk car.</li>
                        <li>Get the Best Deals Quickly: We&apos;re ready to provide top offers and quick service.</li>
                    </ul>
                </div>
                <div class="col-lg-8 co-legacy-panel__body">
                    <h4>Best car buyer near you</h4>
                    <ul>
                        <li>We offer the best car buying experience in your area.</li>
                        <li>Find us nearby for easy and hassle-free transactions.</li>
                        <li>Choose the junk car buyer with a proven track record of excellence.</li>
                        <li>Our local presence ensures easy access and hassle-free transactions.</li>
                        <li>Our experienced team provides professional and efficient service from start to finish.</li>
                    </ul>
                </div>
            </div>

            <div class="co-donate-bar">
                <p>Donate a car to a family in need — Orlando area programs welcome your vehicle.</p>
                <a href="{{ route('donate') }}" class="co-btn co-btn--secondary">Donate now</a>
            </div>
        </div>

        @include('easy_step')
        @include('client_logo')
        @include('faq')
        @include('blogs')

    </div>
@endsection

@section('after_scripts')
    <script>
        function categorys() {
            var category_id = $('#category').val();
            $('#subcategorys').html('');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "{{ route('get_car_model') }}",
                type: 'GET',
                data: { category_id: category_id },
                dataType: 'json',
                success: function (response) {
                    $('#subcategorys').html('<option value="">-- Select Car Brand --</option>');
                    $.each(response.states, function (key, value) {
                        $("#subcategorys").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }

        function sub_categorys() {
            var sub_category_id = $('#subcategorys').val();
            $('#sub_subcategorys').html('');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "{{ route('get_car_model_sub') }}",
                type: 'GET',
                data: { sub_category_id: sub_category_id },
                dataType: 'json',
                success: function (response) {
                    $('#sub_subcategorys').html('<option value="">-- Select Car Model --</option>');
                    $.each(response.states, function (key, value) {
                        $("#sub_subcategorys").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }

        function sub_sub_categorys() {
            var sub_category_id = $('#sub_subcategorys').val();
            $('#sub_sub_subcategorys').html('');
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: "{{ route('get_car_model_sub_sub') }}",
                type: 'GET',
                data: { sub_category_id: sub_category_id },
                dataType: 'json',
                success: function (response) {
                    $('#sub_sub_subcategorys').html('<option value="">-- Select Car Sub Model --</option>');
                    $.each(response.states, function (key, value) {
                        $("#sub_sub_subcategorys").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('.city').html('<option value="">-- Select City --</option>');
                }
            });
        }

        (function () {
            var typer = document.querySelector("span[words]");
            if (!typer || !typer.getAttribute("words")) {
                return;
            }
            var wordsToType = typer.getAttribute("words").split(','),
                typingSpeed = (parseInt(typer.getAttribute('typing-speed')) || 70),
                typingDelay = (parseInt(typer.getAttribute('typing-delay')) || 700);
            var currentWordIndex = 0, currentCharacterIndex = 0;
            function type() {
                var wordToType = wordsToType[currentWordIndex % wordsToType.length];
                if (currentCharacterIndex < wordToType.length) {
                    typer.innerHTML += wordToType[currentCharacterIndex++];
                    setTimeout(type, typingSpeed);
                } else {
                    setTimeout(erase, typingDelay);
                }
            }
            function erase() {
                var wordToType = wordsToType[currentWordIndex % wordsToType.length];
                if (currentCharacterIndex > 0) {
                    typer.innerHTML = wordToType.substr(0, --currentCharacterIndex - 1);
                    setTimeout(erase, typingSpeed);
                } else {
                    currentWordIndex++;
                    setTimeout(type, typingDelay);
                }
            }
            window.addEventListener('load', function () {
                type();
            });
        })();
    </script>
@endsection
