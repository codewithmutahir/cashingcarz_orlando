@extends('layouts.master')


@section('meta_title', 'Sell Junk Car for Cash - Get a Quick Online Quote')
@section('meta_description', 'Got a junk car? Turn it into cash fast! Sell Junk Car for Cash with free towing and no hassle. Get paid today—simple, quick, and stress-free!')
@section('meta_keywords', 'Sell Junk Car for Cash')
@section('meta_robots', 'index, follow')


@section('content')
    <div class="row mb-3 co-sells-page">
        <div class="col-12">
            <div class="intro co-sells-hero">
                <div class="container text-center py-4 py-md-5">

                    <h1 class="intro-title animated fadeInDown co-sells-hero__title">
                        Tow-Riffic Way of Selling a Car
                    </h1>
                    <h2 class="sub animateme fittext3 animated fadeIn co-sells-hero__subtitle">
                        Sell Your Junk Car For Cash And Same Day Pickup
                    </h2>

                    <form id="search" name="search" action="{{route('get_offer')}}" method="GET">
                        <div class="row animated fadeInUp co-sells-hero__form-row justify-content-center">
                            <div class="col-md-3 col-sm-12  mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

                                <select class="form-select" name="year" id="category"
                                        onchange="categorys()">
                                    <option value="">What year is your car?</option>
                                    @foreach(\App\Models\Category:: where('active',1)->where('parent_id',null)->orderBy('name','DESC')->get() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="col-md-3 col-sm-12  mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

                                <select class="form-select" name="brand" id="subcategorys"
                                        onchange="sub_categorys()">

                                </select>

                            </div>

                            <div class="col-md-2 col-sm-12  mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

                                <select class="form-select" name="model" id="sub_subcategorys"
                                        onchange="sub_sub_categorys()">


                                </select>

                            </div>

                            <div class="col-md-2 col-sm-12  mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

                                <select class="form-select" name="sub_model" id="sub_sub_subcategorys">


                                </select>

                            </div>

                            <div class="col-md-2 col-sm-12 col-12">

                                <button type="submit" class="btn btn-primary float-start w-100 co-sells-hero__submit">
                                    <strong>Get offer</strong>
                                </button>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="container co-sells-page">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card co-content-card">
                    <div class="card-body">
                        <p class="text-center co-sells-intro">
                            Cashing Carz is the premier platform in the USA for selling your junk car. We offer top
                            dollar for
                            your
                            vehicle, ensuring you get the best price. If our offer doesn't meet your expectations, you
                            can list
                            your
                            car for free on our platform and connect with numerous cash-for-junk car buyers in your
                            area.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('easy_step')
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
    </script>
@endsection