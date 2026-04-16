@extends('layouts.master')



@section('meta_title', 'Junk Car Removal & Cash for Cars | Cashing Orlando Services')

@section('meta_description', 'Cashing Orlando offers instant cash offers, free towing, same-day pickup, and paperwork help across Orlando and Central Florida. See every service we provide.')

@section('meta_keywords', 'junk car removal Orlando, cash for cars Orlando, Cashing Orlando services')

@section('meta_robots', 'index, follow')



@section('content')



<div class="co-inner-page co-services-page">

    <header class="co-services-page__hero" aria-labelledby="co-services-h1">

        <div class="container">

            <p class="co-section-label text-center mb-2">What we do</p>

            <h1 id="co-services-h1" class="co-services-page__title text-center">Sell your car the Orlando way</h1>

            <p class="co-services-page__lead text-center mx-auto">

                <strong>Cashing Orlando</strong> is Central Florida’s straightforward alternative to confusing buyers. We buy junk cars, trucks, and SUVs in any condition with transparent pricing and same-day pickup options.

            </p>

            <div class="text-center mt-4">

                <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary">Get instant offer</a>

            </div>

        </div>

    </header>



    <div class="container co-services-page__body py-4 py-lg-5">

        <div class="row justify-content-center">

            <div class="col-12 col-lg-10 col-xl-9">

                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">1</span>

                    <h2 class="co-services-page__card-title">Immediate cash offers</h2>

                    <p>Get a competitive quote for any make or model. We factor in condition, mileage, and local Orlando market demand — no bait-and-switch.</p>

                    <ul class="co-services-page__list">

                        <li>Fast, straightforward process</li>

                        <li>No hidden fees — our offer is what we pay</li>

                        <li>Same-day payment when we pick up your vehicle</li>

                    </ul>

                </article>



                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">2</span>

                    <h2 class="co-services-page__card-title">Sell from home or work</h2>

                    <p>Request your offer online or by phone. We coordinate pickup around your schedule in Orlando, Kissimmee, Sanford, and surrounding areas.</p>

                    <ul class="co-services-page__list">

                        <li>Instant online quote flow</li>

                        <li>Free vehicle review at pickup for a fair final price</li>

                        <li>No obligation — review the offer and decide</li>

                    </ul>

                </article>



                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">3</span>

                    <h2 class="co-services-page__card-title">Free valuation &amp; transparent pricing</h2>

                    <p>Know what your car is worth before we arrive. We explain how we priced your vehicle so you can sell with confidence.</p>

                    <ul class="co-services-page__list">

                        <li>100% free, no commitment</li>

                        <li>Pricing aligned with real demand in Central Florida</li>

                        <li>Quick responses — no waiting days for a callback</li>

                    </ul>

                </article>



                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">4</span>

                    <h2 class="co-services-page__card-title">We buy cars in any condition</h2>

                    <p>Non-running, damaged, high-mileage, or end-of-life — we still make an offer. Perfect for hurricane-season flood concerns, mechanical failures, or “just won’t start” sitters.</p>

                    <ul class="co-services-page__list">

                        <li>High mileage welcome</li>

                        <li>Damaged &amp; non-running vehicles</li>

                        <li>Older cars you’re ready to turn into cash</li>

                    </ul>

                </article>



                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">5</span>

                    <h2 class="co-services-page__card-title">Free towing &amp; scheduled pickup</h2>

                    <p>We dispatch a licensed partner to your driveway, office, or shop. Towing is included with accepted offers — no surprise charges.</p>

                    <ul class="co-services-page__list">

                        <li>Pickup at your location</li>

                        <li>No extra towing line items</li>

                        <li>Flexible windows so you’re not stuck waiting all day</li>

                    </ul>

                </article>



                <article class="co-services-page__card">

                    <span class="co-services-page__step" aria-hidden="true">6</span>

                    <h2 class="co-services-page__card-title">Same-day payment</h2>

                    <p>When your car is picked up and inspected, you get paid. We keep paperwork simple so you can move on with your day.</p>

                    <ul class="co-services-page__list">

                        <li>Secure, on-the-spot payment options</li>

                        <li>No weeks-long title delays from our side</li>

                        <li>Cash or verified payment methods — explained upfront</li>

                    </ul>

                </article>

            </div>

        </div>

    </div>



    <section class="co-final-cta" aria-labelledby="co-services-cta-h">

        <div class="container">

            <h2 id="co-services-cta-h" class="co-final-cta__h">Ready for your offer?</h2>

            <p class="co-final-cta__sub">Three steps: tell us about the car, accept your offer, get paid when we pick it up.</p>

            <a href="{{ route('get_offer') }}" class="co-btn co-btn--primary co-btn--final-cta">Get my offer now →</a>

        </div>

    </section>

</div>



@endsection

