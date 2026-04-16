@extends('admin.layouts.master')
@section('header')
    <div class="row page-titles">
        <div class="col-md-6 col-12 align-self-center">
            <h2 class="mb-0">
                {{ __('Donate Car Photo Gallery') }}
            </h2>
        </div>
        <div class="col-md-6 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="{{ admin_url() }}">{{ trans('admin.dashboard') }}</a></li>
                <li class="breadcrumb-item active d-flex align-items-center">{{ __('Photo Gallery') }}</li>
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
                    <h5>Donate Car Gallery</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auto_prices as $key=>$auto_price)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$auto_price->title}}</td>
                                <td>{{$auto_price->description}}</td>
                                <td><img style="width: 150px;height: 80px;object-fit: fill;"
                                         src="{{asset('storage').'/'.$auto_price->photo}}" alt=""></td>

                                <td>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-primary"
                                       onclick="auto_price_update({{$auto_price->id}})">
                                        <i class="far fa-edit"></i>
                                        Edit
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="btn btn-xs btn-danger" data-button-type="delete"
                                       onclick="delete_modal('{{route('donate.photo.gallery.destroy',$auto_price->id)}}')">
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
            <form action="{{route('donate.photo.gallery.store')}}" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <h5>Donate Car Photo Gallery</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control mb-2" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="title" placeholder="Enter Title" required>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Car Photo</label>
                            <input class="form-control mb-2" type="file" name="photo" id="" required>

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
                    <h5 class="modal-title" id="exampleModalLabel">Donate Car Photo Gallery Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="modalClose()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('donate.photo.gallery.update')}}" method="POST" id="dataShow">
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
                url: '{{route('donate.photo.gallery.edit')}}',
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
    </script>
@endsection