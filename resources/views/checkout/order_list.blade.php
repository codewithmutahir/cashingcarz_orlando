@extends('admin.layouts.master')

@section('content')
    <style>
        @media screen and (max-width: 767px) {
            .sm-devices {
                margin-top: 40px;
            }

            .sm-devices-hide {
                display: none;
            }

        }
    </style>
    <div class="row sm-devices">
        <div class="col-12">

            {{--            @if (isTranslatableModel($xPanel->model))--}}
            {{--                <div class="card mb-0 rounded">--}}
            {{--                    <div class="card-body">--}}
            {{--                        <h3 class="card-title"><i class="fa fa-question-circle"></i> {{ trans('admin.Help') }}</h3>--}}
            {{--                        <p class="card-text">--}}
            {{--                            {!! trans('admin.help_translatable_table') !!}--}}
            {{--                            @if (config('larapen.admin.show_translatable_field_icon'))--}}
            {{--                                &nbsp;{!! trans('admin.help_translatable_column') !!}--}}
            {{--                            @endif--}}
            {{--                        </p>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            <div class="card rounded">

                <div class="card-header">
                    <h2>Order List</h2>
                </div>

                {{-- List Filters --}}


                <div class="card-body">
                    <form class="mb-5" action="" id="Yes_list" method="get">
                        <div class="row">
                            <div class="col-md-2 mb-2">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="id" id="" placeholder="ID/Reference">
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group">
                                    <select class="form-select" name="payment_status" id="">
                                        <option value="">Select Payment Status</option>
                                        <option value="1">Paid</option>
                                        <option value="0"> Unpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="form-group">
                                    <select class="form-select" name="delivery_status" id="">
                                        <option value="">Select Delivery Status</option>
                                        <option value="1">Received</option>
                                        <option value="0"> Processing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 mb-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>


                    </form>
                    <table id="crudTable"
                           class="dataTable table table-bordered table-striped display dt-responsive nowrap dtr-inline collapsed"
                           style="width: 100%;" role="grid" aria-describedby="crudTable_info">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th class="sm-devices-hide">Seller</th>
                            <th class="sm-devices-hide">Buyer</th>
                            <th class="sm-devices-hide">Pickup</th>
                            <th class="sm-devices-hide">Date</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @php
                                $user=\App\Models\User::where('id',$order->user_id)->first();
                                $seller=!empty($order->post)?$order->post->user_id:null;
                                if ($seller!=null){
                                    $user2=\App\Models\User::where('id',$seller)->first();
                                }

                            @endphp
                            <tr>
                                <td>{{$order->id}}</td>
                                @if($order->post->title)
                                    <td>
                                        <a href="{{ url('/'.$order->post->title.'/'.$order->post->id.'/?preview=1') }}"
                                           target="_blank">
                                            @if($order->post)
                                                @if($order->post->title)
                                                    {{$order->post->title}}
                                                @else
                                                    {{__('-')}}
                                                @endif
                                            @endif
                                            {{--                                        {{!empty($order->post->title)?$order->post->title:'-'}}--}}
                                        </a>
                                    </td>
                                @endif


                                <td class="sm-devices-hide">
                                    <ul>
                                        <li><span style="font-weight: bold">Name:</span>&nbsp;{{$user2->name}}
                                            ({{$user2->country_code}})
                                        </li>
                                        <li><span style="font-weight: bold">Email:</span>&nbsp;{{$user2->email}}</li>
                                        <li><span style="font-weight: bold">Phone:</span>&nbsp;{{$user2->phone}}</li>
                                    </ul>
                                </td>
                                <td class="sm-devices-hide">

                                    <ul>
                                        <li><span style="font-weight: bold">Name:</span>&nbsp;{{$user->name}}
                                            ({{$user->country_code}})
                                        </li>
                                        <li><span style="font-weight: bold">Email:</span>&nbsp;{{$user->email}}</li>
                                        <li><span style="font-weight: bold">Phone:</span>&nbsp;{{$user->phone}}</li>
                                    </ul>
                                </td>

                                <td class="sm-devices-hide">
                                    @php $pickup=\App\Models\pickup_poin_info::where('post_id',$order->post_id)->first(); @endphp
                                    <ul>
                                        <li><span style="font-weight: bold">Address:</span>&nbsp;{{$pickup->address}}
                                        </li>
                                        <li><span style="font-weight: bold">Time:</span>&nbsp;{{$pickup->slot}}</li>

                                    </ul>
                                </td>
                                <td class="sm-devices-hide">{{$order->created_at}}</td>
                                <td>${{$order->price}}</td>
                                <td></td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                    {{$orders->appends(request()->query())->links()}}

                </div>


            </div>
        </div>
    </div>
@endsection

@section('after_styles')
    {{-- DATA TABLES --}}
    {{--<link href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" />--}}
    <link href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/css/dataTables.bootstrap5.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/plugins/datatables/extensions/Responsive-2.2.9/css/responsive.bootstrap5.css') }}"
          rel="stylesheet" type="text/css"/>

    {{-- CRUD LIST CONTENT - crud_list_styles stack --}}
    @stack('crud_list_styles')

    <style>

        /* tr > td:first-child, */
        table.dataTable > tbody > tr:not(.no-padding) > td:first-child {
            width: 30px;
            white-space: nowrap;
            text-align: center;
        }


        /* Fix the 'Actions' column size */
        /* tr > td:last-child, */
        table.dataTable > tbody > tr:not(.no-padding) > td:last-child,
        table:not(.dataTable) > tbody > tr > td:last-child {
            width: 10px;
            white-space: nowrap;
        }
    </style>
@endsection

@section('after_scripts')
    {{-- DATA TABLES SCRIPT --}}
    <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/js/dataTables.bootstrap5.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive-2.2.9/js/dataTables.responsive.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/datatables/extensions/Responsive-2.2.9/js/responsive.bootstrap5.js') }}"
            type="text/javascript"></script>

    {{--
    <script src="{{ asset('assets/plugins/datatables/js/pages/datatable/custom-datatable.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/js/pages/datatable/datatable-basic.init.js') }}"></script>
    --}}


    {{--        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>--}}
    {{--        <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"--}}
    {{--                type="text/javascript"></script>--}}
    {{--        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap.min.js"--}}
    {{--                type="text/javascript"></script>--}}
    {{--        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" type="text/javascript"></script>--}}
    {{--        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js" type="text/javascript"></script>--}}
    {{--        <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js" type="text/javascript"></script>--}}
    {{--        <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js" type="text/javascript"></script>--}}
    {{--        <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js" type="text/javascript"></script>--}}
    {{--        <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js" type="text/javascript"></script>--}}






    @stack('crud_list_scripts')
@endsection



