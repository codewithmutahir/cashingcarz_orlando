@extends('layouts.master')

@section('meta_title', 'Earn $100 – Cashing Carz Referral Program | Cashing Carz')
@section('meta_description', 'Earn $100 cash with Cashing Carz! Join our Referral Program today and get rewarded for every successful car referral you make.')
@section('meta_keywords', 'Referral Program')
@section('meta_robots', 'index, follow')

@section('content')
<div class="container py-5 co-referrals-page">

    <div class="co-referrals-hero mb-4 mb-lg-5 p-4 p-lg-5 text-center text-white rounded-3">
        @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

        <h1 class="fw-bold">Refer &amp; earn</h1>
        <p class="lead mb-0 co-referrals-hero__lead">Help your friends sell their cars and earn bonuses every time a referral converts.</p>
    </div>

    <div class="card shadow-sm border co-referrals-card rounded-4 p-4">
        <h2 class="mb-4 text-center co-referrals-card__title">Referral information</h2>

        <form action="{{ route('referrals.store') }}" method="POST">
            @csrf
            
            <input type="hidden" name="year_id" id="year_id">
            <input type="hidden" name="brand_id" id="brand_id">
            <input type="hidden" name="model_id" id="model_id">
            <input type="hidden" name="sub_model_id" id="sub_model_id">
            
            <input type="hidden" name="year_name" id="year_name">
            <input type="hidden" name="brand_name" id="brand_name">
            <input type="hidden" name="model_name" id="model_name">
            <input type="hidden" name="sub_model_name" id="sub_model_name">


            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Your First Name</label>
                    <input type="text" name="first_name" class="form-control rounded-3" placeholder="Enter first name" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Your Email</label>
                    <input type="email" name="email" class="form-control rounded-3" placeholder="Enter email address" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Your Phone</label>
                    <input type="text" name="phone" class="form-control rounded-3" placeholder="Enter your phone number" required>
                </div>
            </div>
            
            <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Referral Phone Number</label>
                <input type="tel" id="referrer_phone" name="referrer_phone" class="form-control rounded-3" placeholder="Enter phone number" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Referral Email Address</label>
                <input type="email" name="referrer_email" class="form-control rounded-3" placeholder="Enter your email address" required>
            </div>
        </div>


            <hr class="my-4">

            <h3 class="text-secondary mb-3">Car Information</h3>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label class="form-label">Car Year</label>
                    <select class="form-select rounded-3" name="year" id="category" onchange="categorys()" required>
                        <option value="">Select Year</option>
                        @foreach(\App\Models\Category::where('active',1)->where('parent_id',null)->orderBy('name','DESC')->get() as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Brand</label>
                    <select class="form-select rounded-3" name="brand" id="subcategorys" onchange="sub_categorys()" required>
                        <option value="">Select Brand</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Model</label>
                    <select class="form-select rounded-3" name="model" id="sub_subcategorys" onchange="sub_sub_categorys()" required>
                        <option value="">Select Model</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Sub Model</label>
                    <select class="form-select rounded-3" name="sub_model" id="sub_sub_subcategorys" required>
                        <option value="">Select Sub Model</option>
                    </select>
                </div>
            </div>
            
            <div class="form-check mb-4 d-flex justify-content-center">
    <input class="form-check-input" type="checkbox" id="termsCheck" required>
    <label class="form-check-label" for="termsCheck">
        I agree to the <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#termsModal">referral terms and conditions</a>
    </label>
</div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                    🚀 Submit Referral
                </button>
            </div>
        </form>
        
        {{-- 🎥 How It Works Section --}}
<div class="mt-5">
    <h3 class="text-center text-primary fw-bold mb-3">How It Works</h3>
    <p class="text-center text-muted mb-4">Check out the step-by-step process to fill out the form</p>

    <div class="ratio ratio-16x9 rounded shadow">
        <video controls>
            <source src="{{ asset('videos/referral.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>
        
      <!-- Terms and Conditions Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h2 class="modal-title" id="termsModalLabel">Cashing Carz Referral Program – Terms & Conditions (T&Cs)</h2>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="line-height: 1.6; font-size: 15px;">
        <p><strong>Thank you for your interest in the Cashing Carz Referral Program!</strong></p>
        <p>The program enables you to receive rewards for referrals made to individuals who want to sell their car with us. Prior to sharing your referral link, please take time to read through these Terms & Conditions.</p>

        <h3 class="fw-bold mt-4">1. Your Agreement to the Terms</h3>
        <p>By participating in the Cashing Carz Referral Program, you are accepting these T&Cs. You're also agreeing that if at some point in the future we make changes to these terms, the fact that you continue participating means you're good with the new changes too.</p>

        <h3 class="fw-bold mt-4">2. How It Works</h3>
        <p>Once you submitted a lead via our referral program, you'll be assigned a reference number to keep track of your submitted lead.</p>
        <p>Here's the easy flow:</p>
        <ul>
          <li>1. First fill out all the details related to your lead on the form.</li>
          <li>2. Make sure to read the terms and conditions before you submit the lead.</li>
          <li>3. After that someone from our team will contact you via phone call.</li>
          <li>4. Once the lead is converted into sale then our team member will send you the referral amount to your bank account.</li>
        </ul>

        <h3 class="fw-bold mt-4">3. Referral Stages Explained</h3>
        <p>The status of each referral can be tracked through the reference number. Here's what each stage means:</p>
        <ul>
          <li><strong>Pending Referral:</strong> We have the lead and are working on it.</li>
          <li><strong>In-Progress Referral:</strong> We're working on it—typically calling the seller or scheduling pickup.</li>
          <li><strong>Canceled Referral:</strong> The lead didn't work out for one reason or another.</li>
          <li><strong>Completed Referral:</strong> We purchased or retrieved the car—yahoo! You're eligible for your reward.</li>
        </ul>

        <h3 class="fw-bold mt-4">4. Your Reward</h3>
        <p>For every Completed Referral, you'll earn <strong>$100</strong> (sent to your submitted bank account). You can see it all right in your account.</p>
        <p><em>Important note:</em> You're responsible for reporting any earnings on your taxes.</p>

        <h3 class="fw-bold mt-4">5. Important Rules and Requirements</h3>
        <p>Here’s what to keep in mind to qualify for the reward:</p>
        <ul>
          <li><strong>✅ What’s Required:</strong><br>Lead must be converted to sale.<br>The car must be picked up or purchased by Cashing Carz.</li>
          <li><strong>❌ What’s Not Eligible:</strong><br>Leads that get canceled or rejected.<br>Referrals that close after the program ends.</li>
        </ul>
        <p>Any Questions or Disputes? We’ll look into them, and Cashing Carz will make the final call.</p>

        <h3 class="fw-bold mt-4">6. Changes to the Program</h3>
        <p>We have the right to alter or end this referral program at our discretion. This can be achieved by adjusting the reward amount, altering the terms of eligibility, or even canceling the program altogether.</p>
        <p>We will try to let you know in case we make any changes through your account or email.</p>

        <h3 class="fw-bold mt-4">7. Play Fair</h3>
        <p>We ask that you promote the program ethically. That is, no spamming, no misrepresentations, and no underhanded tactics. If we find otherwise, we can remove you from the program.</p>

        <h3 class="fw-bold mt-4">8. No Guarantees (aka Our Disclaimer)</h3>
        <p>The referral program is offered as-is. We cannot promise it'll always be available, free of bugs, or perfect. We'll do our best, but sometimes technology blips happen.</p>

        <h3 class="fw-bold mt-4">9. Limits on Our Liability</h3>
        <p>We're not liable for damages or problems that may arise from being included in this program. In case something goes wrong, our absolute liability is capped at the total amount that we have paid you within the last year.</p>

        <h3 class="fw-bold mt-4">10. Your Responsibility</h3>
        <p>In case a problem arises due to an action of yours or gives rise to a legal issue, you undertake to bear all the costs or damage connected therewith for Cashing Carz and our staff.</p>

        <h3 class="fw-bold mt-4">11. Term & Updates</h3>
        <p>These terms continue to apply while you are a program participant. We can change them whenever we feel necessary, and the latest version is always accessible here.</p>

        <h3 class="fw-bold mt-4">12. What Happens After the Program Ends</h3>
        <p>Even if the program is cancelled or you choose to discontinue program participation, some provisions of these terms—like the limitation of our liability and your obligations—will be enforceable.</p>

        <h3 class="fw-bold mt-4">13. Third-Party Platform</h3>
        <p>Our referral program is run on your behalf by a well-established third-party business. When you join, you agree to allowing them access to your details—but only for the limited purpose of running the referral program. Both our privacy policies apply.</p>

        <p class="mt-4">Still have questions? <strong>Contact our team for more info.</strong> Thanks for being part of the Cashing Carz Referral Program. Happy referring—and happy earning!</p>
      </div>
    </div>
  </div>
</div>


    </div>
</div>
@endsection

@section('after_scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function categorys() {
        var category_name = $('#category').val();
        $('#subcategorys').html('<option value="">Select Brand</option>');
        $('#sub_subcategorys').html('<option value="">Select Model</option>');
        $('#sub_sub_subcategorys').html('<option value="">Select Sub Model</option>');

        // Create a mapping from the PHP data
        var categoryMapping = {
            @foreach(\App\Models\Category::where('active',1)->where('parent_id',null)->orderBy('name','DESC')->get() as $category)
                '{{$category->name}}': {{$category->id}},
            @endforeach
        };

        var selected_category_id = categoryMapping[category_name];

        if (selected_category_id) {
            $.ajax({
                url: "{{ route('get_car_model') }}",
                type: 'GET',
                data: {category_id: selected_category_id},
                success: function (response) {
                    $('#subcategorys').html('<option value="">Select Brand</option>');
                    if (response.states && response.states.length > 0) {
                        $.each(response.states, function (key, value) {
                            $('#subcategorys').append('<option value="' + value.name + '" data-id="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    }

    function sub_categorys() {
        var sub_category_id = $('#subcategorys option:selected').data('id');
        $('#sub_subcategorys').html('<option value="">Select Model</option>');
        $('#sub_sub_subcategorys').html('<option value="">Select Sub Model</option>');

        if (sub_category_id && sub_category_id !== undefined) {
            $.ajax({
                url: "{{ route('get_car_model_sub') }}",
                type: 'GET',
                data: {sub_category_id: sub_category_id},
                success: function (response) {
                    $('#sub_subcategorys').html('<option value="">Select Model</option>');
                    if (response.states && response.states.length > 0) {
                        $.each(response.states, function (key, value) {
                            $('#sub_subcategorys').append('<option value="' + value.name + '" data-id="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    }

    function sub_sub_categorys() {
        var sub_category_id = $('#sub_subcategorys option:selected').data('id');
        $('#sub_sub_subcategorys').html('<option value="">Select Sub Model</option>');

        if (sub_category_id && sub_category_id !== undefined) {
            $.ajax({
                url: "{{ route('get_car_model_sub_sub') }}",
                type: 'GET',
                data: {sub_category_id: sub_category_id},
                success: function (response) {
                    $('#sub_sub_subcategorys').html('<option value="">Select Sub Model</option>');
                    if (response.states && response.states.length > 0) {
                        $.each(response.states, function (key, value) {
                            $('#sub_sub_subcategorys').append('<option value="' + value.name + '" data-id="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    }

    // Add form submission debug    
   $('form').on('submit', function () {
    // Get names
    $('#year_name').val($('#category option:selected').text());
    $('#brand_name').val($('#subcategorys option:selected').text());
    $('#model_name').val($('#sub_subcategorys option:selected').text());
    $('#sub_model_name').val($('#sub_sub_subcategorys option:selected').text());

    // Get IDs from data attributes
    $('#year_id').val($('#category option:selected').data('id') || $('#category').val());
    $('#brand_id').val($('#subcategorys option:selected').data('id'));
    $('#model_id').val($('#sub_subcategorys option:selected').data('id'));
    $('#sub_model_id').val($('#sub_sub_subcategorys option:selected').data('id'));
});

document.addEventListener("DOMContentLoaded", function () {
    const referrerInput = document.querySelector("#referrer_phone");
    if (referrerInput) {
        window.intlTelInput(referrerInput, {
            onlyCountries: ["us"],
            separateDialCode: true,
            nationalMode: false,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.min.js"
        });
    }
});
</script>
@endsection