@extends('admin.layouts.master')
@section('header')
    <div class="row page-titles">
        <div class="col-md-6 col-12 align-self-center">
            <h2 class="mb-0">
                {{ __('Donate Request') }}
            </h2>
        </div>
        <div class="col-md-6 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ __('Donate Request') }}</li>
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
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5>Auto Price Value</h5>
                </div>
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success" role="alert">
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th class="">Phone Status</th>
                            <th class="">Car Received</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auto_prices as $key=>$auto_price)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$auto_price->name}}</td>
                                <td>{{$auto_price->email}}</td>
                                <td>{{$auto_price->phone}}</td>
                                <td>{{$auto_price->description}}</td>
                                <td class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="phone_status"
                                               id="exampleRadios1"
                                               value="1"
                                               {{$auto_price->phone_status==1?'checked':''}} onclick="phone_statuss({{$auto_price->id}})">

                                    </div>
                                </td>

                                <td class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="received"
                                               id="exampleRadios2" value="1"
                                               {{$auto_price->received==1?'checked':''}} onclick="car_recived({{$auto_price->id}})">

                                    </div>
                                </td>
                                <td>

                                    <a href="javascript:void(0)"
                                       class="btn btn-xs btn-danger" data-button-type="delete"
                                       onclick="delete_modal('{{route('donate.list.destroy',$auto_price->id)}}')">
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
        function showAlert(message) {
            alert(message);
        }

        function delete_modal(id) {
            $('#confirm_delete_button').attr('href', id);
            $('#delete_modal').modal('show');
        }

        function delete_modalClose() {
            $('#delete_modal').modal('hide');
        }

        function car_recived(id) {
            if ($('#exampleRadios2').prop('checked')) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.ajax({
                method: 'Post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{route('donate.list.car.received.status')}}',
                data: {id: id, status: status},
                success: function (res) {
                    if (res == 1) {
                        showAlert('Successfully update your status');
                    }

                }
            });
        }

        function phone_statuss(id) {
            if ($('#exampleRadios1').prop('checked')) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.ajax({
                method: 'Post',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{route('donate.list.phone.status')}}',
                data: {id: id, status: status},
                success: function (res) {
                    if (res == 1) {
                        showAlert('Successfully update your status');
                    }

                }
            });
        }
    </script>
@endsection