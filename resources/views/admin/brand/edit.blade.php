@extends('admin.layouts.master')
@section('header')
    <div class="row page-titles">
        <div class="col-md-6 col-12 align-self-center">
            <h2 class="mb-0">
                {{ __('Car Brand') }}
            </h2>
        </div>
        <div class="col-md-6 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ __('Brand') }}</li>
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
        <div class="col-md-4 mx-auto">
            <form action="{{route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Car Brand</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control mb-2" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="name" placeholder="Enter Brand Name"
                                   value="{{$brand->name}}" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Car Photo</label>
                            <input class="form-control mb-2" type="file" name="photo" id="" required>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-end" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
