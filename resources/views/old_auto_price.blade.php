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
    </style>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Auto Price Value</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Year</th>
                            <th>Condition</th>
                            <th>SUV Model</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auto_prices as $key=>$auto_price)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$auto_price->year}}</td>
                                <td>{{$auto_price->up_or_down==1?"above ".$auto_price->year:"under ".$auto_price->year}}</td>
                                <td>{{$auto_price->suv_model==1?"SUV Model ":"Not SUV Model "}}</td>
                                <td>${{$auto_price->value}}</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary"
                                       onclick="auto_price_update({{$auto_price->id}})">
                                        <i class="far fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-xs btn-danger" data-button-type="delete"
                                       onclick="delete_modal('{{route('auto.price.setting.destroy',$auto_price->id)}}')">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </a>
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
                            <input type="text" class="form-control mb-2" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="year" placeholder="Enter year">

                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Condition Set</label>
                            <select class="form-control mb-2" id="exampleFormControlSelect1" name="up_or_down">
                                <option value="">Select Condition</option>
                                <option value="1">Above</option>
                                <option value="0">Under</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Condition Set</label>
                            <select class="form-control mb-2" id="exampleFormControlSelect1" name="suv_model">
                                <option value="">Select Condition</option>
                                <option value="1">SUV Model</option>
                                <option value="0">Non SUV Model</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter price" name="price">

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