@extends('layouts.master')

@section('meta_title', 'Donate Your Junk Car | Cashing Carz')
@section('meta_description', 'Donate Your Junk Car today! Get free towing, a tax deduction, and help a good cause. Fast, easy, and hassle-free car donation process.')
@section('meta_keywords', 'Donate Your Junk Car')
@section('meta_robots', 'index, follow')


@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <style>
        /* Google Fonts - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        .slide-container {
            max-width: 1120px;
            width: 100%;
            padding: 40px 0;
        }

        .slide-content {
            margin: 0 40px;
            overflow: hidden;
            border-radius: 25px;
        }

        .card {
            border-radius: 25px;
            background-color: #FFF;
        }

        .image-content,
        .card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 14px;
        }

        .image-content {
            position: relative;
            row-gap: 5px;
            padding: 25px 0;
        }

        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #4070F4;
            border-radius: 25px 25px 0 25px;
        }

        .overlay::before,
        .overlay::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -40px;
            height: 40px;
            width: 40px;
            background-color: #4070F4;
        }

        .overlay::after {
            border-radius: 0 25px 0 0;
            background-color: #FFF;
        }

        .card-image {
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            background: #FFF;
            padding: 3px;
        }

        .card-image .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #4070F4;
        }

        .name {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        .description {
            font-size: 14px;
            color: #707070;
            text-align: center;
        }

        .button {
            border: none;
            font-size: 16px;
            color: #FFF;
            padding: 8px 16px;
            background-color: #4070F4;
            border-radius: 6px;
            margin: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button:hover {
            background: #265DF2;
        }

        .swiper-navBtn {
            color: #6E93f7;
            transition: color 0.3s ease;
        }

        .swiper-navBtn:hover {
            color: #4070F4;
        }

        .swiper-navBtn::before,
        .swiper-navBtn::after {
            font-size: 38px;
        }

        .swiper-button-next {
            right: 0;
        }

        .swiper-button-prev {
            left: 0;
        }

        .swiper-pagination-bullet {
            background-color: #6E93f7;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: #4070F4;
        }

        @media screen and (max-width: 768px) {
            .slide-content {
                margin: 0 10px;
            }

            .swiper-navBtn {
                display: none;
            }
        }

    </style>
    <div class="main-container co-inner-page co-donate-page">
        <div class="container">
            <div class="row clearfix mb-5">
                <div class="col-md-12">
                    <div class="content-body co-donate-hero">
                        <h1 class="co-donate-hero__title">
                            Donate a car
                            for a needy
                            family</h1>
                        <h2 class="co-donate-hero__sub">We
                            will work
                            with local Church, Mosque, Temple
                        </h2>

                    </div>
                </div>
            </div>

            <div class="row clearfix mb-5">
                <div class="col-md-5">
                    <div class="donate-sidebar">
                        <p style="padding: 8px; background-color: #EFEFEF">
                            Donate a Car with Ease!<br>
                            Are you contemplating a meaningful way to contribute to your community, perhaps through a
                            car donation? Whether your vehicle is in pristine condition or could use a bit of repair,
                            Pickabull is here to facilitate your generous gesture. We specialize in seamlessly accepting
                            car donations, ensuring they serve beneficial purposes within the community.
                            <br><br>
                            At Pickabull, every car has the potential to make a substantial impact. We collaborate with
                            a diverse network of religious and community organizations, including mosques, churches,
                            temples, and more, channeling your donations toward enriching local programs. From
                            empowering youth initiatives to bolstering food banks, your vehicle can become a catalyst
                            for positive change.
                            <br><br>
                            Embrace the opportunity to make a difference; donate your car through Pickabull. Our
                            commitment extends to handling all necessary repairs and making the process as convenient
                            for you as possible. Reach out to us to discover how your donation can support various
                            community causes and to arrange for your car's pickup.
                            <br><br>
                            With Pickabull, your vehicle donation transcends simple giving it's a partnership for
                            community enhancement. Donate today and drive forward change in your community!
                            <br>

                        </p>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center"
                         style="border-right: 2px solid #2867FF;height: 500px;border-right-style: dashed;">

                    </div>
                </div>
                <div class="col-md-5">
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <form action="{{route('donate.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="name" id="" placeholder="Enter Your Name"
                                   required>
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="email" name="email" id="" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="phone" id="" placeholder="Enter Your Number"
                                   required>
                        </div>
                        <div class="form-group mb-3">
                        <textarea id="autoHeightTextarea" class="form-control" name="description"
                                  oninput="autoResize(this)"
                                  cols="5" rows="5"
                                  placeholder="Enter Your Address"
                                  style=" overflow-y: hidden;resize: none;min-height: 90px"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-primary float-end" type="submit">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

            <!--<div class="row clearfix mb-5">-->
            <!--    <div class="col-md-12">-->
            <!--        <div class="testmonial_header p-3"-->
            <!--             style="width: 80%;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background-color: #2867FF">-->
            <!--            <h2 class="text-left p-3"-->
            <!--                style="font-weight: bold;color: #FFF;">-->
            <!--                Donate Old/Junk Cars Gallery </h2>-->

            <!--        </div>-->
            <!--    </div>-->

            <!--</div>-->

            <!--<div class="row clearfix mb-5">-->
            <!--    <div class="col-md-12">-->
            <!--        <div class="slide-container swiper">-->
            <!--            <div class="slide-content">-->
            <!--                <div class="card-wrapper swiper-wrapper">-->
            <!--                    @foreach($donate_car_gallery as $i=>$donate_gallery)-->
            <!--                        <div class="card swiper-slide">-->
            <!--                            <div class="image-content">-->
            <!--                                <span class="overlay"></span>-->

            <!--                                <div class="card-image">-->
            <!--                                    <img src="{{asset($donate_gallery->photo)}}"-->
            <!--                                         alt="" class="card-img">-->
            <!--                                </div>-->
            <!--                            </div>-->

            <!--                            <div class="card-content">-->
            <!--                                <h2 class="name">{{$donate_gallery->title}}-->
            <!--                                </h2>-->
            <!--                                <p class="description">{{\Illuminate\Support\Str::limit($donate_gallery->description,120)}}</p>-->

            <!--                                {{--                                            <button class="button">View More</button>--}}-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    @endforeach-->

            <!--                </div>-->
            <!--            </div>-->

            <!--            <div class="swiper-button-next swiper-navBtn"></div>-->
            <!--            <div class="swiper-button-prev swiper-navBtn"></div>-->
            <!--            <div class="swiper-pagination"></div>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--</div>-->
        </div>
    </div>

@endsection
@section('after_scripts')
    <!-- Swiper JS -->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <!--Uncomment this line-->
    <!--<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>-->
    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = textarea.scrollHeight + 'px'; // Set height to scrollHeight
        }
    </script>
    <script !src="">

        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
            },
        });

    </script>
@endsection