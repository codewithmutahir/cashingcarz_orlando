@extends('admin.layouts.master')
@section('header')
    <div class="row page-titles">
        <div class="col-md-6 col-12 align-self-center">
            <h2 class="mb-0">
                {{ __('Auto Price Update Settings') }}
            </h2>
        </div>
        <div class="col-md-6 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ __('Auto Price') }}</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .close:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .modal-header .close {
            padding: 1rem;
            margin: -1rem -1rem -1rem auto;
        }

        button.close {
            padding: 0;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
        }

        table th {
            font-weight: bold;
        }
    </style>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Auto Price Value</h5>
                </div>
                <div class="card-body">
                    <table class="table table-stripe table-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Year</th>
                            <th>Car Brand</th>
                            <th>Car Model</th>
                            <th>Car Sub Model</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auto_prices as $key=>$auto_price)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{\App\Models\Category::where('id',$auto_price->year)->value('name')}}</td>
                                <td>{{\App\Models\Category::where('id',$auto_price->car_brand)->orwhere('parent_id',$auto_price->car_brand)->value('name')}}</td>
                                <td>{{!empty($auto_price->car_model)?\App\Models\Category::where('id',$auto_price->car_model)->orwhere('parent_id',$auto_price->car_model)->value('name'):"-"}}</td>
                                <td>{{!empty($auto_price->car_sub_model)?\App\Models\Category::where('id',$auto_price->car_sub_model)->orwhere('parent_id',$auto_price->car_sub_model)->value('name'):"-"}}</td>
                                <td>${{$auto_price->value}}</td>
                                <td>
                                    {{--                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary"--}}
                                    {{--                                       onclick="auto_price_update({{$auto_price->id}})">--}}
                                    {{--                                        <i class="far fa-edit"></i>--}}
                                    {{--                                        Edit--}}
                                    {{--                                    </a>--}}
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-danger" data-button-type="delete"
                                       onclick="delete_modal('{{route('auto.price.setting.destroy',$auto_price->id)}}')">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href=""><i class="far fa-edit"></i></a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                    {{$auto_prices->links()}}
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <form action="{{route('auto.price.setting.store')}}" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h5>Auto Price Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Year</label>
                            <select class="form-select" name="year" id="category"
                                    onchange="categorys()">
                                <option value="">What year is your car?</option>
                                @foreach(\App\Models\Category:: where('active',1)->where('parent_id',null)->get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Car Brand</label>
                            <select class="form-select" name="car_brand" id="subcategorys"
                                    onchange="sub_categorys()">

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Car Model</label>
                            <select class="form-select" name="car_model" id="sub_subcategorys"
                                    onchange="sub_sub_categorys()">


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Car Sub Model</label>
                            <select class="form-select" name="car_sub_model" id="sub_sub_subcategorys">


                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Value</label>
                            <input class="form-control" type="text" name="price" id="" placeholder="Enter Value">

                        </div>
                        <button type="submit" class="btn btn-primary float-end mt-3 mb-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Auto Price Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('auto.price.setting.update')}}" method="POST" id="dataShow">
                        @csrf

                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            onclick="delete_modalClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('Are you sure delete this record?')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="delete_modalClose()">
                        Close
                    </button>
                    <a id="confirm_delete_button" type="button" class="btn btn-primary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after_scripts')
    <script !src="">

        function modalClose() {
            $('#exampleModal').modal('hide');
        }

        function auto_price_update(id) {
            $.ajax({
                method: 'GET',
                type: 'html',
                url: '{{route('auto.price.setting.edit')}}',
                data: {id: id},
                success: function (res) {
                    $('#dataShow').html(res);
                    $('#exampleModal').modal('show');
                }
            });
        }

        function delete_modal(id) {
            $('#confirm_delete_button').attr('href', id);
            $('#delete_modal').modal('show');
        }

        function delete_modalClose() {
            $('#delete_modal').modal('hide');
        }

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