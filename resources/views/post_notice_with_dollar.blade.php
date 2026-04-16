@extends('layouts.master')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Custom styles */
        .custom-car-sales-container {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            padding: 2rem 0;
            overflow-x: hidden;
        }

        .custom-car-sales-wrapper {
            background: rgba(255, 255, 255, 0.95);
            margin-top: 3rem;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .custom-car-sales-heading {
            color: #2563eb;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .custom-car-sales-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: #2563eb;
            border-radius: 2px;
        }

        .custom-car-sales-description {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .custom-feature-list {
            list-style: none;
            padding: 0;
        }

        .custom-feature-item {
            background: #f8fafc;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
            overflow: hidden;
        }

        .custom-feature-item:hover {
            transform: translateX(10px);
            background: #f1f5f9;
        }

        .custom-feature-heading {
            color: #1e293b;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .custom-feature-heading::before {
            content: '→';
            margin-right: 0.75rem;
            color: #2563eb;
        }

        .custom-offer-card {
            background: #ffffff;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .custom-offer-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, #2563eb 0%, #f97316 100%);
        }

        .custom-offer-title {
            color: #1e293b;
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .custom-offer-amount {
            background: #ffffff;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .custom-offer-price {
            color: #2edd07;
            font-size: 4rem;
            font-weight: 700;
            margin: 1rem 0;
        }

        .custom-btn-sell {
            background: #2563eb;
            color: #ffffff;
            padding: 1rem 2rem;
            border-radius: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 1rem;
        }

        .custom-btn-sell:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        .custom-btn-cancel {
            background: #ef4444;
            color: #ffffff;
            padding: 1rem 2rem;
            border-radius: 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .custom-btn-cancel:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(239, 68, 68, 0.2);
        }

        .custom-reference-number {
            background: #2563eb;
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .custom-reference-number:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .thank-you-text {
            font-family: Poppins;
            font-weight: 700;
        }

        .sale_agree {
            background-color: rgba(255, 255, 255, 0.315) !important;
            backdrop-filter: blur(10px) !important;
            border: 1px solid black !important;
            box-shadow: 1px 10px black !important;
        }
    </style>

<div class="custom-car-sales-container">
    <div class="container custom-car-sales-wrapper">
        <h3 style="text-align:center; margin-bottom:38px; font-size:28px; font-weight:600;">Are You Sure You Want To Sell Your Car?</h3>
        <div class="row">
            <div class="col-md-7">
                <h3 class="custom-car-sales-heading">Sell Your Car Quickly</h3>
                <p class="custom-car-sales-description">Enter your car information now for an instant online quote and sale within minutes.</p>

                <div class="custom-feature-list">
                    <div class="custom-feature-item">
                        <h4 class="custom-feature-heading">More Than 500,000 Happy Customers</h4>
                        <p>We provide the optimal solution for customers looking to sell their cars quickly, easily, and securely.</p>
                    </div>

                    <div class="custom-feature-item">
                        <h4 class="custom-feature-heading">Get an Offer Online</h4>
                        <p>We provide a complimentary online evaluation tool for you to receive an instant quote for your car.</p>
                    </div>

                    <div class="custom-feature-item">
                        <h4 class="custom-feature-heading">30 Minutes or Less</h4>
                        <p>You can start your offer online. We value our customers and their time.</p>
                    </div>

                    <div class="custom-feature-item">
                        <h4 class="custom-feature-heading">Get Paid Today</h4>
                        <p>Receive payment today! Contact us at (+1) 469-383-8321 to get your offer.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="custom-offer-card" id="yes_btn_hide">
                    <h1 class="custom-offer-title">Your Offer Details</h1>
                    <p class="text-center text-primary">Would you like to accept our offer ?</p> 

                    <div class="custom-offer-amount">
                        <p>Your offer amount is</p>
                        <div class="custom-offer-price">${{$offer_price}}</div>
                       

                        <a href="javascript:void(0)" style="color:white;" onclick="desired_price({{$post_id}})" class="custom-btn-cancel mb-3">NO</a>
                        <a href="javascript:void(0)" style="color:white;" onclick="agree_for_sale({{$post_id}}, '{{$customer}}', '{{$offer_price}}', '{{session('refer')}}')" class="custom-btn-sell">YES</a>
                        <!--<a href="javascript:void(0)" style="color:white;" onclick="agree_for_sale({{$post_id}})" class="custom-btn-sell">YES</a>-->

                        <div class="text-center mt-4">
                            <a href="" class="custom-reference-number text-white">ID/Reference: {{!empty($post_id)?$post_id:'-'}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sale Agreement Modal -->
<div class="modal fade" id="sale_agree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="thank-you-text text-center mt-3">Awesome!!</h1>
                <div class="text-center">
                    <p class="p-2" style="color: #4e4f50; font-size: 18px;">
                        You have accepted our offer<br>
                        Your reference number is <strong>{{$post_id}}</strong><br>
                        One of our team members will contact you shortly<br>
                        For immediate assistance, please call us at <a class="text-dark" href="tel: (469) 383-8321"> (469) 383-8321</a>
                    </p>
                  
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="close_fn()" type="button" class="custom-btn-cancel" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div class="modal fade" id="progress_bars" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loader-custom"></div>
                <p class="text-center" style="color: #134F87; font-weight: 500; font-size: 18px;">"Please wait..."</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_scripts')
<script type="text/javascript">
    gsap.from(".custom-feature-list", {
        x: -200,
        duration: 0.7,
        stagger: 1
    });

    function close_fn() {
        $('#sale_agree').modal('hide');
        window.location.href = "/";  // Close and redirect to home
    }

        function agree_for_sale(post_id, customer_id, offer_price, refer) {
        $('#sale_agree').modal('show');
        $('#yes_btn_hide').addClass('d-none');
    
        $.ajax({
            url: '{{ route('get_offer.result.status') }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                post_id: post_id,
                customer_id: customer_id,
                offer_price: offer_price,
                refer: refer
            },
            success: function (res) {
                console.log('AJAX Response:', res);
                if (res.success) {
                    $('#sale_agree').modal('show');
                    $('#yes_btn_hide').addClass('d-none');
                } else {
                    $('#progress_bars').modal('hide');
                }
            },
            error: function (err) {
                console.error('AJAX Error:', err);
            }
        });
    }


    function desired_price(id) {
        $.ajax({
            url: '{{route('no_button_click')}}',  // Route for handling "No" click
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: { post_id: id },
            success: function (res) {
                console.log('Desired Price Response:', res);
            }
        });

        // Show confirmation popup
        if (confirm("Are you sure you want to cancel the sale?")) {
            window.location.href = "/";  // Redirect to home if "No"
        }
    }
</script>
@endsection