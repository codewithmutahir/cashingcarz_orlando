<section class="co-testimonials" aria-labelledby="co-testimonials-heading">

    <div class="container">

        <p class="co-section-label">Reviews</p>

        <h2 id="co-testimonials-heading" class="co-section-h2 text-center">What Orlando sellers say.</h2>

        <p class="text-center co-testimonials__lead mx-auto mb-4">Real experiences from Central Florida — swipe on mobile.</p>



        @php

            $reviews = [

                ['q' => 'Selling my old sedan was painless — offer came in fast and pickup actually showed up on time.', 'n' => 'Alex Johnson', 'r' => 'Happy Seller'],

                ['q' => 'No haggling in a parking lot — just a straight number and a driver who knew what they were doing.', 'n' => 'Emma Lee', 'r' => 'Car Seller'],

                ['q' => 'Finally a buyer that didn’t ghost after the first text. Paperwork felt under control.', 'n' => 'Michael Brown', 'r' => 'Business Owner'],

                ['q' => 'Transparent offer and they explained every line on the bill of sale. Huge relief.', 'n' => 'Sarah Wilson', 'r' => 'Car Owner'],

                ['q' => 'Tow truck was professional, payment matched the quote — that’s all I wanted.', 'n' => 'James Carter', 'r' => 'Car Enthusiast'],

                ['q' => 'From Kissimmee to the east side — scheduling was flexible around my work shift.', 'n' => 'Sophia Taylor', 'r' => 'Customer'],

            ];

        @endphp



        <div id="coReviewsCarousel" class="carousel slide co-reviews-carousel" data-bs-ride="carousel" data-bs-interval="6500" data-bs-touch="true" aria-roledescription="carousel">

            <div class="co-reviews-carousel__stage">

                <button class="carousel-control-prev co-reviews-carousel__ctrl" type="button" data-bs-target="#coReviewsCarousel" data-bs-slide="prev">

                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                    <span class="visually-hidden">Previous</span>

                </button>

                <div class="carousel-inner">

                    @foreach ($reviews as $i => $rev)

                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">

                        <article class="co-t-card co-t-card--carousel mx-auto">

                            <div class="co-t-card__quote" aria-hidden="true">“</div>

                            <p class="co-t-card__text">{{ $rev['q'] }}</p>

                            <p class="co-t-card__name">{{ $rev['n'] }}</p>

                            <p class="co-t-card__role">{{ $rev['r'] }}</p>

                        </article>

                    </div>

                    @endforeach

                </div>

                <button class="carousel-control-next co-reviews-carousel__ctrl" type="button" data-bs-target="#coReviewsCarousel" data-bs-slide="next">

                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                    <span class="visually-hidden">Next</span>

                </button>

            </div>

            <div class="carousel-indicators co-reviews-carousel__dots">

                @foreach ($reviews as $i => $_)

                    <button type="button" data-bs-target="#coReviewsCarousel" data-bs-slide-to="{{ $i }}" @if($i === 0) class="active" aria-current="true" @endif aria-label="Slide {{ $i + 1 }}"></button>

                @endforeach

            </div>

        </div>

    </div>

</section>

