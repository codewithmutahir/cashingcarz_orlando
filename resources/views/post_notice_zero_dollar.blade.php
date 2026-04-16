@extends('layouts.master')


@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato);

        @import url(https://fonts.googleapis.com/css?family=Roboto);

        .card_2 {
            background-color: #eaeaea;
            margin-top: 30vh;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3),
            inset 0 -1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card {
            background-color: #eaeaea;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3),
            inset 0 -1px 2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 20vh;
        }

        .card h1 {
            color: #3E4E50;
            font-size: 2.4rem;
            font-family: 'Roboto', sans-serif;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            margin-bottom: 24px;
        }

        .card p {
            font-family: 'Roboto', sans-serif;
            line-height: 1.2rem;
            margin-bottom: 16px;
        }

        .card a {
            font-family: 'Roboto', sans-serif;
            line-height: 1.2rem;
            font-weight: normal;
            text-decoration: none;
            text-transform: uppercase;
            color: #06D6A0;
            transition: all;
            transition-duration: 0.3s;
        }

        .card a:hover {
            color: #118AB2;
        }
    </style>
    <div class="main-container">
        <div class="container card_2">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h3 style="color: #2867FF;font-family: Arial">Sell Your Car Quickly</h3>
                                    <p>Enter your car information now for an instant online quote and sale within
                                        minutes.</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <h3 style="color: #000;font-family: Roboto">More Than 500,000 Happy Customers</h3>
                                    <p>We provide the optimal solution for customers looking to sell their cars quickly,
                                        easily,
                                        and securely.</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <ul>
                                        <li style="list-style: circle;margin-left: 15px"><h3>Get an Offer Online</h3>
                                        </li>
                                    </ul>
                                    <p>We provide a complimentary online evaluation tool for you to receive an instant
                                        quote for
                                        your car.
                                    </p>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <ul>
                                        <li style="list-style: circle;margin-left: 15px"><h3>30 Minutes or Less</h3>
                                        </li>
                                    </ul>
                                    <p>You can start your offer online. We value our customers and their time.
                                    </p>
                                </div>

                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <ul>
                                        <li style="list-style: circle;margin-left: 15px"><h3>Get Paid Today</h3></li>
                                    </ul>
                                    <p>Receive payment today! Contact us at (+1) 469-383-8321 to get your offer.
                                    </p>
                                </div>

                            </div>


                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <h1 style="text-align: center;">Your Offer Details</h1>
                                <p style="color: #2867FF;text-align: center;font-size: 18px;">CALL OUR PURCHASING
                                    DEPARTMENT <br>
                                    TO DISCUSS YOUR OFFER AMOUNT</p>
                                <div class="get_offer" style="border: 2px solid #000;border-radius: 20px;">
                                    <div class="text-center p-4">
                                        <p class="mb-2" style="font-size: 16px;">Your offer amount is ready, <br> please
                                            call now to finalize the
                                            <br>
                                            details and
                                            payment options</p>
                                        <a href="" class="btn btn-primary"
                                           style="padding: 10px 25px;display: inline-block">(+1) 469-383-8321</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection