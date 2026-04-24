@extends('layouts.master')

@section('meta_title', 'Customer Testimonials | Cashing Orlando')
@section('meta_description', 'See how Cashing Orlando helps drivers sell junk cars fast across Central Florida — same-day pickup, fair offers, and friendly service.')
@section('meta_keywords', 'Testimonial')
@section('meta_robots', 'index, follow')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Quicksand&display=swap');

        /*h5 {*/
        /*    font-family: 'Bree Serif', serif;*/
        /*    padding: 0 1rem;*/
        /*    font-size: 2rem;*/
        /*    margin-bottom: 1.5rem;*/
        /*}*/

        .testimonials-container {
            padding: 0 40px;
            margin: 30px 0 50px;
            position: relative;
            background-color: #F7F4EE;
            display: flex;
            flex-direction: column;
        }

        .testimonials {
            display: flex;
            justify-content: space-evenly;
            align-items: space-evenly;
        }

        .testimonials-container h5 {
            padding: 10px 10px 15px;
            text-align: center;
            width: 100%;
            margin: 0 auto 30px;
        }

        .testimonial {
            border-radius: 20px;
            /*background: linear-gradient(to right bottom, #fabf8f60, #ffc0a660, #ffc4bc60, #ffcbcf60, #f7d3dd60);*/
            background-color: #C3E9FF;
            padding: 20px;
            position: relative;
            margin-bottom: 20px;
        }

        .testimonial:after {
            content: "";
            display: block; /* reduce the damage in FF3.0 */
            position: absolute;
            bottom: -15px;
            right: 50px;
            width: 0;
            border-width: 15px 20px 0;
            border-style: solid;
            border-color: #C3E9FF transparent;
        }

        .testimonial h5 {
            margin-bottom: 10px;
        }

        .testimonial p {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .testimonal-author {
            font-size: 1rem;
            position: absolute;
            bottom: -40px;
            right: 0;
        }
        
        .testimonial > h2 {
    line-height: 2.3rem;
    font-size: 1.5rem;
    font-family: poppins;
    font-weight: 500;
}

        @media all AND (max-width: 700px) {

            .testimonials {
                flex-direction: column;
                align-items: center;
            }

            .testimonial {
                width: 90%;
                margin-bottom: 60px;
            }
            
            .vertical-lin-testimonials{
                display:none;
            }

        }
    </style>
    <div class="main-container">
        <div class="container">
            <h1 class="visually-hidden">Customer Testimonials</h1>
            <div class="row clearfix mb-5">
                <div class="col-md-12">
                    <div class="testmonial_header p-3"
                         style="width: 80%;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background-color: #2867FF">
                        <h2 class="text-left p-3"
                            style="font-weight: bold;
    color: #FFF;
    line-height: 40px;
    font-size: 1.6788rem;">
                            Best Websites To Sell Your Car
                            Online 2024</h2>

                    </div>
                </div>
            </div>

            <div class="row clearfix mb-5">
                <div class="col-md-5">
                    <div class="donate-sidebar">
                        <p style="padding: 8px;color: #2867FF;font-size: 2rem">
                            Our customers love our <br>service for making car <br> selling effortless.

                        </p>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center vertical-lin-testimonials"
                         style="border-right: 5px solid #EE95EC;height: 250px;margin-right: 165px">

                    </div>
                </div>
                <div class="col-md-5">
                    <p style="font-size: 1rem;text-align: justify;">
                        Pickabull has helped thousands quickly sell their vehicles. Customers appreciate our guaranteed
                        offers, friendly support, fair prices, complimentary car pickup, and swift nationwide service.
                        <br><br>
                        We take pride in offering the best car selling experience. Our exceptional customer support team
                        sets us apart. Recognizing the difficulties of selling a car, we walk our customers through our
                        quick and simple process.

                    </p>
                </div>
            </div>

            <div class="row clearfix mb-5">
                <div class="col-md-12">
                    <div class="gallery-wrapper">
                        <div class="gallery-inner">
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/2182212731/photo/lease-rental-car-sell-buy-dealership-send-contract-and-car-keys-to-new-owner-to-sign-sales.jpg?s=612x612&w=0&k=20&c=lXH_YVrNIhM6xP_W7chbJXKpRQuYMEcQZCFoH9lhnJ4=" alt="">
                            </div>
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/1582802930/photo/happy-man-driving-his-car.jpg?s=612x612&w=0&k=20&c=DC_5lCEay1nJPd7kXqleftuEnj_V9KuXG9TyIN4LZhg=" alt="">
                            </div>
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/2158074718/photo/commanding-her-road-destiny.jpg?s=612x612&w=0&k=20&c=XJ4ncrz2JzlxBaWiF3ShNRKhZ6C__t7VpBoc7q2G94U=" alt="">
                            </div>
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/92001381/photo/my-old-car.jpg?s=612x612&w=0&k=20&c=VByhYJVMx1JIi5iaQd30E12quehJ6UF5WA4LoS-PGXo=" alt="">
                            </div>
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/157434207/photo/recycling-of-cars.jpg?s=612x612&w=0&k=20&c=vcZpknsr3xkGYVv_L4qoEb7oxV4m3gRWs7cI-FgFO0c=" alt="">
                            </div>
                            <div class="gallery-img">
                                <img src="https://media.istockphoto.com/id/136178575/photo/fiat-500-orange.jpg?s=612x612&w=0&k=20&c=RwaNegLAGsthzDFzkUa8utTtX0sWW_3gevSqk7XPS-Y=" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix mb-5">
                <div class="col-md-12">
                    <div class="testmonial_header p-3"
                         style="width: 80%;border-bottom-right-radius: 20px;border-top-right-radius: 20px;background-color: #2867FF">
                        <h2 class="text-left p-3"
                            style="font-weight: bold;color: #FFF;">
                            Testimonials</h2>

                    </div>
                </div>

            </div>
            @if(count($testimonials)>0)
                @foreach($testimonials as $key=>$testimonial)
                    @if($key%2==0)
                        <div class="row clearfix mb-5">
                            <div class="col-md-6">
                                <div class="testimonials">
                                    <div class="testimonial">
                                        <h3>"{{$testimonial->title}}"</h3>
                                        <p> {{$testimonial->description}}. <span
                                                    class="testimonal-author">{{$testimonial->person}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <img src="{{asset($testimonial->image)}}" alt=""
                                         style="width: 360px;height: 240px; border: 2px solid red;object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row clearfix mb-5">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <img src="{{asset($testimonial->image)}}" alt=""
                                         style="width: 360px;height: 240px; border: 2px solid red;object-fit: cover">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="testimonials">
                                    <div class="testimonial">
                                        <h3>"{{$testimonial->title}}"</h3>
                                        <p> {{$testimonial->description}}. <span
                                                    class="testimonal-author">{{$testimonial->person}}</span></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

@endsection
@section('after_scripts')
    <script>
        function autoResize(textarea) {
            textarea.style.height = 'auto'; // Reset height to auto
            textarea.style.height = textarea.scrollHeight + 'px'; // Set height to scrollHeight
        }
    </script>
    <script !src="">
        const galleryStyleSheet = `
.gallery-wrapper {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	overflow-x: hidden;
}

.gallery-wrapper img {
	max-width: 100%;
	transition: all 0.2s ease-in-out;
}

.gallery-wrapper .gallery-img img {
	cursor: pointer;
}

.gallery-wrapper {
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 1rem;
	z-index: 2;
	position: relative;
}

.gallery-popup.active + .gallery-overlay {
	content: "";
	position: fixed;
	width: 100%;
	height: 100%;
	inset: 0;
	background-color: rgb(0 0 0 / 75%);
	z-index: 5;
	overflow: hidden;
}

.gallery-popup {
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: calc(100% - 48px);
	height: calc(100% - 80px);
	padding: 0px;
	display: none;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	z-index: 6;
	animation: showPopUp 0.45s linear;
}

.gallery-popup .close,
.gallery-popup .next,
.gallery-popup .prev {
	position: absolute;
	top: 0;
	right: 2rem;
	margin-left: auto;
	display: flex;
	align-items: center;
	justify-content: center;
}

.gallery-popup img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.gallery-popup .close {
	width: 30px;
	height: 30px;
	cursor: pointer;
	top: 5%;
	right: 0;
}

.gallery-popup .next {
	right: 0px;
	top: 50%;
	transform: translateY(-50%);
	width: 30px;
	height: 20px;
	font-size: 20px;
	cursor: pointer;
	padding: 10px;
	background-color: rgb(255 255 255 / 75%);
}

.gallery-popup .prev {
	left: 0px;
	right: auto;
	top: 50%;
	transform: translateY(-50%);
	width: 30px;
	height: 20px;
	font-size: 20px;
	cursor: pointer;
	padding: 10px;
	background-color: rgb(255 255 255 / 75%);
}

.gallery-wrapper .gallery-inner {
	display: grid;
	gap: 10px;
	grid-template-columns: repeat(4, 1fr);
	position: relative;
	z-index: 4;
}

@keyframes showPopUp {
	0% {
		opacity: 0;
		visibility: hidden;
	}
	50% {
		opacity: 0.5;
		visibility: visible;
	}
	100% {
		opacity: 1;
		visibility: visible;
	}
}

@keyframes imgTransitionNext {
	0% {
		transform: translateX(100vw);
		opacity: 0;
	}

	5% {
		transform: translateX(95vw);
		opacity: 0.15
	}

	10% {
		transform: translateX(90vw);
		opacity: 0.1;
	}

	15% {
		transform: translateX(85vw)
		opacity: 0.20
	}

	20% {
		transform: translateX(80vw);
		opacity: 0.2;
	}

	25% {
		transform: translateX(75vw)
		opacity: 0.20
	}

	30% {
		transform: translateX(70vw);
		opacity: 0.3;
	}

	35%{
		transform: translateX(75vw)
		opacity: 0.35;
	}

	40% {
		transform: translateX(60vw);
		opacity: 0.4;
	}

	45%{
		transform: translateX(55vw)
		opacity: 0.45;
	}

	50% {
		transform: translateX(50vw);
		opacity: 0.5;
	}

	55%{
		transform: translateX(45vw)
		opacity: 0.55;
	}

	60% {
		transform: translateX(40vw);
		opacity: 0.6;
	}

	65%{
		transform: translateX(65vw)
		opacity: 0.65;
	}

	70% {
		transform: translateX(30vw);
		opacity: 0.7;
	}

75%{
		transform: translateX(25vw)
		opacity: 0.75;
	}

	80% {
		transform: translateX(20vw);
		opacity: 0.8;
	}

	85%{
		transform: translateX(15vw)
		opacity: 0.85;
	}

	90% {
		transform: translateX(10vw);
		opacity: 0.9;
	}

	95%{
		transform: translateX(5vw)
		opacity: 0.95;
	}

	100%{
		transform: translateX(0vw);
		opacity: 1;
	}
}


@keyframes imgTransitionPrev {
	0% {
		transform: translateX(-100vw);
		opacity: 0;
	}

	5% {
		transform: translateX(-95vw);
		opacity: 0.15
	}

	10% {
		transform: translateX(-90vw);
		opacity: 0.1;
	}

	15% {
		transform: translateX(-85vw)
		opacity: 0.20
	}

	20% {
		transform: translateX(-80vw);
		opacity: 0.2;
	}

	25% {
		transform: translateX(-75vw)
		opacity: 0.20
	}

	30% {
		transform: translateX(-70vw);
		opacity: 0.3;
	}

	35%{
		transform: translateX(-75vw)
		opacity: 0.35;
	}

	40% {
		transform: translateX(-60vw);
		opacity: 0.4;
	}

	45%{
		transform: translateX(-55vw)
		opacity: 0.45;
	}

	50% {
		transform: translateX(-50vw);
		opacity: 0.5;
	}

	55%{
		transform: translateX(-45vw)
		opacity: 0.55;
	}

	60% {
		transform: translateX(-40vw);
		opacity: 0.6;
	}

	65%{
		transform: translateX(-65vw)
		opacity: 0.65;
	}

	70% {
		transform: translateX(-30vw);
		opacity: 0.7;
	}

75%{
		transform: translateX(-25vw)
		opacity: 0.75;
	}

	80% {
		transform: translateX(-20vw);
		opacity: 0.8;
	}

	85%{
		transform: translateX(-15vw)
		opacity: 0.85;
	}

	90% {
		transform: translateX(-10vw);
		opacity: 0.9;
	}

	95%{
		transform: translateX(-5vw)
		opacity: 0.95;
	}

	100%{
		transform: translateX(0vw);
		opacity: 1;
	}
}

@media only screen and (max-width: 1280px) {
	.gallery-wrapper .gallery-inner {
		grid-template-columns: repeat(3, 1fr);
	}
}

@media only screen and (max-width: 768px) {
	.gallery-wrapper .gallery-inner {
		grid-template-columns: repeat(2, 1fr);
	}

	.gallery-popup .next {
		right: 0px;
	}
	.gallery-popup .prev {
		left: 0px;
	}

	.gallery-popup {
		top: 60px !important;
		left: 50% !important;
		transform: translate(-50%, 0%);
		height: calc(350px - 60px)
	}
}

@media only screen and (max-width: 600px) {
	.gallery-wrapper .gallery-inner {
		grid-template-columns: repeat(1, 1fr);
	}
}
`;

        const body = document.querySelector("body");
        const galleryWrapper = document.querySelector(".gallery-wrapper");

        const styeElement = document.createElement("style");
        styeElement.innerHTML = galleryStyleSheet;
        styeElement.style.display = "none";
        body.append(styeElement);

        const galleryPopup = document.createElement("div");
        galleryPopup.className = "gallery-popup";

        galleryPopup.innerHTML = `
    <button class="close">&times;</button>
		<span class="next">&#187;</span>
		<span class="prev">&#171;</span>
		<img src="" alt="">
`;

        const galleryOverlay = document.createElement("div");
        galleryOverlay.className = "gallery-overlay";
        body.prepend(galleryOverlay);
        body.prepend(galleryPopup);

        const images = [...galleryWrapper.querySelectorAll(".gallery-img img")];
        const closeBtn = galleryPopup.querySelector(".close");
        const nextBtn = galleryPopup.querySelector(".next");
        const prevBtn = galleryPopup.querySelector(".prev");

        nextBtn.addEventListener("click", nextImg);
        prevBtn.addEventListener("click", prevImg);

        // Creating Animation For Image Transition
        const imgTransitionNext = `animation: imgTransitionNext 0.45s linear`;
        const imgTransitionPrev = `animation: imgTransitionPrev 0.45s linear`;
        let showImg = galleryPopup.querySelector(".gallery-popup img");

        let selectedImg = null;
        let startCount = 0;
        let endCount = images.length - 1;

        closeBtn.addEventListener("click", (e) => {
            galleryPopup.style.display = "none";
            galleryPopup.classList.remove("active");
            selectedImg === null;
            startCount = 0;
            endCount = images.length - 1;
            body.style.overflow = "auto";
        });

        // Click Next Button Function
        function nextImg() {
            if (selectedImg < 0) return;
            if (selectedImg === endCount) {
                selectedImg = startCount;
            } else {
                selectedImg++;
            }
            showImg.src = images[selectedImg].src;
            addRemoveAnimationNext();
        }

        // Click Prev Button Function
        function prevImg() {
            if (selectedImg < 0) return;
            if (selectedImg === startCount) {
                selectedImg = endCount;
            } else {
                selectedImg--;
            }
            showImg.src = images[selectedImg].src;
            addRemoveAnimationPrev();
        }

        // Initial Click Handler
        images.forEach((img, index) => {
            img.addEventListener("click", (e) => {
                galleryPopup.style.display = "block";
                galleryPopup.classList.add("active");
                showImg.src = e.currentTarget.src;
                selectedImg = index;
                body.style.overflow = "hidden";
            });
        });

        // Function for add and Remove Style Attribute
        function addRemoveAnimationNext() {
            showImg.setAttribute("style", imgTransitionNext);
            setTimeout(() => {
                showImg.setAttribute("style", "");
            }, 500);
        }

        function addRemoveAnimationPrev() {
            showImg.setAttribute("style", imgTransitionPrev);
            setTimeout(() => {
                showImg.setAttribute("style", "");
            }, 500);
        }

    </script>
@endsection