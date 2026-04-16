@extends('admin.layouts.master')

@section('content')
    @php $total_buyer_spent= 0;
$topSellers_total_spent=0;

    @endphp
    <div class="row mt-3 mb-3">
        <div class="col-lg-3 col-6">

            <div class="card bg-orange rounded shadow">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-8 d-flex align-items-center">
                            <div>
                                <h2 class="fw-light">
                                    <a href="https://cashingcarz.com/admin/posts?active=0" class="text-white"
                                       style="font-weight: bold;">
                                        25$
                                    </a>
                                </h2>
                                <h6 class="text-white">

                                    Total Sales

                                </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-3 col-6">

            <div class="card bg-success rounded shadow">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-8 d-flex align-items-center">
                            <div>
                                <h2 class="fw-light">
                                    <a href="https://cashingcarz.com/admin/posts?active=1" class="text-white"
                                       style="font-weight: bold;">
                                        70$
                                    </a>
                                </h2>
                                <h6 class="text-white">

                                    Total Buy

                                </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-3 col-6">

            <div class="card bg-info rounded shadow">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-8 d-flex align-items-center">
                            <div>
                                <h2 class="fw-light">
                                    <a href="https://cashingcarz.com/admin/users" class="text-white"
                                       style="font-weight: bold;">
                                        56$
                                    </a>
                                </h2>
                                <h6 class="text-white">

                                    Total Profit

                                </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-3 col-6">

            <div class="card bg-inverse text-white rounded shadow">
                <div class="card-body">
                    <div class="row py-1">
                        <div class="col-8 d-flex align-items-center">
                            <div>
                                <h2 class="fw-light">
                                    <a href="https://cashingcarz.com/admin/countries" class="text-white"
                                       style="font-weight: bold;">
                                        1$
                                    </a>
                                </h2>
                                <h6 class="text-white">

                                    Total Commission

                                </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Sales Summary</h5>
                </div>
                <div class="card-body">
                    <form class="mb-5" action="" id="Yes_list" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="id" id="" placeholder="ID/Reference">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="id" id=""
                                               placeholder="ID/Reference">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>


                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Total</td>
                            <td>0</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Buy Summary</h5>
                </div>
                <div class="card-body">
                    <form class="mb-5" action="" id="Yes_list" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="id" id="" placeholder="ID/Reference">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="id" id=""
                                               placeholder="ID/Reference">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>


                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Total</td>
                            <td>0</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Profit Summary</h5>
                </div>
                <div class="card-body">
                    <form class="mb-5" action="" id="Yes_list" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="id" id="" placeholder="ID/Reference">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="id" id=""
                                               placeholder="ID/Reference">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>


                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Total</td>
                            <td>0</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Commission Summary</h5>
                </div>
                <div class="card-body">
                    <form class="mb-5" action="" id="Yes_list" method="get">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input class="form-control" type="date" name="id" id="" placeholder="ID/Reference">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="id" id=""
                                               placeholder="ID/Reference">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>


                    </form>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Total</td>
                            <td>0</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Top Seller</h5>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topSellers as $seller)
                            @php $topSellers_total_spent+=$seller->total_sales; @endphp
                            <tr>
                                <td>{{ $userss[$seller->user_id]->name }}({{ $userss[$seller->user_id]->email }})</td>
                                <td>{{ $seller->total_selled }}</td>
                                <td>{{ $seller->total_sales }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right">Total</td>
                            <td>{{$topSellers_total_spent}}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Top Buyer</h5>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topBuyers as $buyer)
                            @php $total_buyer_spent+= $buyer->total_spent; @endphp
                            <tr>
                                <td>{{ $users[$buyer->user_id]->name }}({{$users[$buyer->user_id]->email}})</td>
                                <td>{{ $buyer->order_count }}</td>
                                <td>{{ $buyer->total_spent }}</td>
                            </tr>
                        @endforeach

                        <tr>

                            <td colspan="2" style="text-align: right">Total</td>
                            <td>{{$total_buyer_spent}}</td>
                        </tr>
                        </tbody>

                    </table>
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



