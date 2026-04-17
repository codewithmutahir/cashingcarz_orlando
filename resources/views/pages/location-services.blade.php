@extends('layouts.master')

@section('meta_title', 'Location Services | Orlando & Central Florida | Cashing Carz')

@section('meta_description', 'Cashing Carz is now in Orlando, Florida. Explore local junk car removal and cash-for-cars service areas across Central Florida.')

@section('meta_keywords', 'junk car removal Orlando, cash for cars Central Florida, Cashing Carz Orlando')

@section('meta_robots', 'index, follow')

@section('content')

<div class="co-inner-page co-services-page">
    <header class="co-services-page__hero" aria-labelledby="co-loc-services-h1">
        <div class="container">
            <p class="co-section-label text-center mb-2">Where we serve</p>
            <h1 id="co-loc-services-h1" class="co-services-page__title text-center">Cashing Carz is now in Orlando, Florida</h1>
            <p class="co-services-page__lead text-center mx-auto">
                We operate throughout <strong>Orlando</strong> and <strong>Central Florida</strong> with same-day pickup options, free towing with accepted offers, and local pages for many cities in our service area.
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
                    <span class="co-services-page__step" aria-hidden="true">FL</span>
                    <h2 class="co-services-page__card-title">Central Florida location pages</h2>
                    <p>Tap a city to learn more about junk car removal and cash offers in that area.</p>
                    <ul class="co-services-page__list">
                        <li><a href="{{ route('locations.orlando-fl') }}">Orlando, FL</a></li>
                        <li><a href="{{ route('locations.winter-park-fl') }}">Winter Park, FL</a></li>
                        <li><a href="{{ route('locations.maitland-fl') }}">Maitland, FL</a></li>
                        <li><a href="{{ route('locations.altamonte-springs-fl') }}">Altamonte Springs, FL</a></li>
                        <li><a href="{{ route('locations.casselberry-fl') }}">Casselberry, FL</a></li>
                        <li><a href="{{ route('locations.winter-garden-fl') }}">Winter Garden, FL</a></li>
                        <li><a href="{{ route('locations.ocoee-fl') }}">Ocoee, FL</a></li>
                        <li><a href="{{ route('locations.edgewood-fl') }}">Edgewood, FL</a></li>
                        <li><a href="{{ route('locations.belle-isle-fl') }}">Belle Isle, FL</a></li>
                        <li><a href="{{ route('locations.kissimmee-fl') }}">Kissimmee, FL</a></li>
                        <li><a href="{{ route('locations.sanford-fl') }}">Sanford, FL</a></li>
                        <li><a href="{{ route('locations.apopka-fl') }}">Apopka, FL</a></li>
                        <li><a href="{{ route('locations.lake-mary-fl') }}">Lake Mary, FL</a></li>
                        <li><a href="{{ route('locations.longwood-fl') }}">Longwood, FL</a></li>
                        <li><a href="{{ route('locations.clermont-fl') }}">Clermont, FL</a></li>
                        <li><a href="{{ route('locations.oviedo-fl') }}">Oviedo, FL</a></li>
                        <li><a href="{{ route('locations.st-cloud-fl') }}">St. Cloud, FL</a></li>
                        <li><a href="{{ route('locations.sebring-fl') }}">Sebring, FL</a></li>
                        <li><a href="{{ route('locations.palm-bay-fl') }}">Palm Bay, FL</a></li>
                        <li><a href="{{ route('locations.daytona-beach-fl') }}">Daytona Beach, FL</a></li>
                        <li><a href="{{ route('locations.lakeland-fl') }}">Lakeland, FL</a></li>
                        <li><a href="{{ route('locations.deltona-fl') }}">Deltona, FL</a></li>
                        <li><a href="{{ route('locations.palm-coast-fl') }}">Palm Coast, FL</a></li>
                        <li><a href="{{ route('locations.melbourne-fl') }}">Melbourne, FL</a></li>
                        <li><a href="{{ route('locations.leesburg-fl') }}">Leesburg, FL</a></li>
                        <li><a href="{{ route('locations.davenport-fl') }}">Davenport, FL</a></li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</div>

@endsection
