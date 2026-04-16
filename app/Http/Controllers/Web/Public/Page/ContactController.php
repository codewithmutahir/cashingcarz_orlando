<?php
/*
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 * Author: BeDigit | https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - https://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Web\Public\Page;

use App\Helpers\UrlGen;
use App\Http\Controllers\Api\Picture\SingleStepPictures;
use App\Http\Controllers\Web\Public\FrontController;

//use App\Http\Requests\Admin\Request;
use App\Models\OfferSubmission;
use App\Http\Requests\Front\ContactRequest;
use App\Mail\NewAccountCreated;
use App\Mail\OfferAccepted;
use App\Mail\PromoteCashingCarz;
use App\Mail\SalesRequest;
use App\Models\auto_price_update_settings;
use App\Models\Category;
use App\Models\City;
use App\Models\donate;
use App\Models\donate_car_gellery;
use App\Models\pickup_poin_info;
use App\Models\Post;
use App\Models\Post_others_info;
use App\Models\testimonial;
use App\Models\User;
use App\Services\TwilioSMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Larapen\LaravelMetaTags\Facades\MetaTag;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ContactController extends FrontController
{
    use SingleStepPictures;


    public function getForm()
    {
        $city = null;
        if (config('services.googlemaps.key')) {
            // Get the Country's largest city for Google Maps
            // Call API endpoint
            $endpoint = '/countries/' . config('country.code') . '/cities';
            $queryParams = ['firstOrderByPopulation' => 'desc'];
            $data = makeApiRequest('get', $endpoint, $queryParams);

            $message = $this->handleHttpError($data);
            $city = data_get($data, 'result');
        }

        // Meta Tags
        [$title, $description, $keywords] = getMetaTag('contact');
        MetaTag::set('title', $title);
        MetaTag::set('description', strip_tags($description));
        MetaTag::set('keywords', $keywords);

        return appView('pages.contact', compact('city'));
    }

    /**
     * @param \App\Http\Requests\Front\ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postForm(ContactRequest $request)
    {
        // Add required data in the request for API
        $request->merge([
            'country_code' => config('country.code'),
            'country_name' => config('country.name'),
        ]);

        // Call API endpoint
        $endpoint = '/contact';
        $data = makeApiRequest('post', $endpoint, $request->all());

        // Parsing the API response
        $message = !empty(data_get($data, 'message')) ? data_get($data, 'message') : 'Unknown Error.';

        // HTTP Error Found
        if (!data_get($data, 'isSuccessful')) {
            return back()->withErrors(['error' => $message])->withInput();
        }

        // Notification Message
        if (data_get($data, 'success')) {
            flash($message)->success();
        } else {
            flash($message)->error();
        }

        return redirect()->to(UrlGen::contact());
    }

    public function donate()
    {
        $donate_car_gallery = donate_car_gellery::all();
        return appView('pages.donate', compact('donate_car_gallery'));
    }

    public function donate_store(Request $request)
    {

        $donate = new donate();
        $donate->name = $request->name;
        $donate->email = $request->email;
        $donate->phone = $request->phone;
        $donate->description = $request->description;
        $donate->save();
        $messageBody = "New Donation Request!\n" .
            "Donor Name: $request->name\n" .
            "Donor Phone: $request->phone\n";
        $twilio = new TwilioSMS();
        $twilio->sendSms($messageBody);
        return back()->with('message', 'Your request has been sent.Please wait for confirmation phone');
    }

    public function donate_list()
    {
        $auto_prices = donate::paginate(15);
        return view('admin.donate.index', compact('auto_prices'));
    }

    public function donate_list_destroy($id)
    {
        donate::findorfail($id)->delete();
        return back()->with('message', 'Donate list successfully deleted');
    }

    public function donate_list_phone_status(Request $request)
    {
        $donate = donate::findorfail($request->id);
        $donate->phone_status = $request->status;
        $donate->save();
        return 1;
    }

    public function donate_list_car_received_status(Request $request)
    {
        $donate = donate::findorfail($request->id);
        $donate->received = $request->status;
        $donate->save();
        return 1;
    }

    public function donate_photo_gallery()
    {
        $auto_prices = donate_car_gellery::paginate(15);
        return view('admin.donate.gallery', compact('auto_prices'));
    }

    public function donate_photo_gallery_store(Request $request)
    {
        $photo_gallery = new donate_car_gellery();
        $photo_gallery->title = $request->title;
        $photo_gallery->description = $request->description;
        if ($request->has('photo')) {
            $path = $request->file('photo')->store('Car_img', 'public');
            $photo_gallery->photo = $path;

        }
        $photo_gallery->save();
        return back()->with('message', 'Post Successfully Created');
    }

    public function donate_photo_gallery_edit(Request $request)
    {
        $donate_gallery = donate_car_gellery::findorfail($request->id);
        ob_start()
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control mb-2" id="exampleInputEmail1"
                   aria-describedby="emailHelp" name="title" placeholder="Enter Title"
                   value="<?php echo $donate_gallery->title ?>">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" name="description" id="" cols="30"
                      rows="10"><?php echo $donate_gallery->description ?></textarea>

        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Car Photo</label>
            <input class="form-control mb-2" type="file" name="photo" id="">

        </div>
        <div class="photo mt-2 mb-2">
            <img style="object-fit:fill;" src="<?php echo asset('storage') . '/' . $donate_gallery->photo ?>" alt=""
                 width="100%" height="350">

        </div>
        <button type="submit" class="btn btn-primary float-end mt-3 mb-3">Submit</button>

        <?php
        return ob_get_clean();
    }

    public function donate_photo_gallery_update(Request $request)
    {
        $photo_gallery = donate_car_gellery::findorfail($request->id);
        $photo_gallery->title = $request->title;
        $photo_gallery->description = $request->description;
        if ($request->has('photo')) {
            $path = $request->file('photo')->store('Car_img', 'public');
            $photo_gallery->photo = $path;

        }
        $photo_gallery->save();
        return with('message', 'Post Successfully Update');
    }

    public function donate_photo_gallery_destroy($id)
    {
        $photo_gallery = donate_car_gellery::findorfail($id);
        $path = storage_path('app/public') . '/' . $photo_gallery->photo;
        if (file_exists($path)) {
            unlink($path);
        }
        $photo_gallery->delete();
        return back()->with('message', 'Post Successfully Deleted');
    }

    public function testimonial()
    {
        $testimonials = testimonial::all();
        return appView('pages.testimonial', compact('testimonials'));
    }

    public function get_offer()
    {
//        $post = new Post();
//        $post->save();
//        $post_edit = Post::findorfail($post->id);
//        dd($post_edit);

        return view('post.post_create');
    }

    public function get_car_model(Request $request)
    {
        $getstate['states'] = Category::where('parent_id', $request->category_id)->where('active', 1)->get(["name", "id"]);

        return response()->json($getstate);
    }

    public function get_car_model_sub(Request $request)
    {
        $getstate['states'] = Category::where('parent_id', $request->sub_category_id)->where('active', 1)->get(["name", "id"]);

        return response()->json($getstate);
    }


    public function get_car_model_sub_sub(Request $request)
    {
        $getstate['states'] = Category::where('parent_id', $request->sub_category_id)->where('active', 1)->get(["name", "id"]);

        return response()->json($getstate);
    }

    public function get_car_model_sub_store(Request $request)
    {

        $category_id = null;
        $offer_price = 0;
        $flag = 0;
        $customer = null;
        if ($request->car_sub_model == null) {
            $p = auto_price_update_settings::where('year', $request->car_reg_year)
                ->where('car_brand', $request->car_brand)
                ->where('car_model', $request->car_model)
                ->first();
            if ($p != null) {
                $offer_price = $p->value;
                $flag = 1;
            }
            $category_id = $request->car_model;
        } else {
            $p = auto_price_update_settings::where('year', $request->car_reg_year)
                ->where('car_brand', $request->car_brand)
                ->where('car_model', $request->car_model)
//                ->where('car_sub_model', $request->car_sub_model)
                ->first();
            if ($p != null) {
                $offer_price = $p->value;
                $flag = 1;
            }
            $category_id = $request->car_sub_model;
        }

//        if ($flag == 0) {
        $select_year = Category::find($request->car_reg_year);
        if ($select_year->name <= 2000) {

            $offer_price += 300;
        } else {
            $offer_price += 320;
        }
//        }

        if ($request->car_mileage > 'Yes') {
            $offer_price += 10;

        } else {
            $offer_price -= 10;
        }


        if ($request->car_title == 'Yes') {
            $offer_price += 5;
        } else {
            $offer_price -= 10;
        }


        if ($request->car_battery == 'Yes') {
            $offer_price += 10;
        } else {
            $offer_price -= 10;
        }


        if ($request->car_start == 'Yes') {
            $offer_price += 10;
        } elseif ($request->car_start == 'No') {
            $offer_price -= 5;
        } elseif ($request->car_start == 'NoNo') {
            $offer_price -= 10;
        }


        if ($request->car_condition == "No") {
            $offer_price -= 200;
        } else {
            $offer_price += 10;
        }


        if ($request->car_exterior_damage == 'Yes') {
            $offer_price -= 5;
        }


        if ($request->car_exterior_missing == 'Yes') {
            $offer_price -= 10;
        }

        if ($request->car_catalytic == 'No') {
            $offer_price -= 99;
        } else {
            $offer_price += 10;
        }


        if ($request->car_interior == 'No') {
            $offer_price -= 5;
        }

        if ($request->car_flood == "Yes") {
            $offer_price -= 15;
        }


        $brand_name = Category::findorfail($request->car_brand);
        $model_name = Category::findorfail($request->car_model);

        $title = $select_year->name . ' ' . $brand_name->name . ' ' . $model_name->name;
        $post = new Post();
        $post->country_code = $request->country_code;
        $post->title = $title;
        $post->city_id = $request->city_id;
        $post->contact_name = $request->contact_name;
        $post->auth_field = $request->auth_field;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->phone_country = $request->phone_country;
//        $post->car_brand_id = $request->car_brand_id;
        $post->category_id = $category_id;
        $post->price = $offer_price;
            if ($request->has('desired_price') && $request->desired_price != null) {
        $post->customer_desired_price = $request->desired_price;
    }
        if ($request->phone_hidden != null) {
            $post->phone_hidden = $request->phone_hidden;
        }

        if ($request->auto_registration == 1) {
            $user_check = User::where('email', $request->email)->first();
            if ($user_check == null) {
                $user = new User();
                $user->country_code = $request->country_code;
                $user->name = $request->contact_name;
                $user->auth_field = $request->auth_field;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->password = Hash::make($request->phone);
                $user->save();
                $post->user_id = $user->id;

                // Example data
                $username = $request->contact_name;
                $password = $request->phone;
                try {
                    // Send email
                    Mail::to($request->email)->send(new NewAccountCreated($username, $password, $request->email));

                } catch (\Exception $e) {
                    logger('Email send error:' . $e);
                }

                Auth::login($user);
            } else {
                Auth::login($user_check);
            }

        }
        if (auth()->user()) {
            $post->user_id = auth()->user()->id;
            $customer = auth()->user()->id;
        } else {
            $customer = $user->id;
        }

        if ($request->accept_terms == 1) {
            $post->accept_terms = $request->accept_terms;
        }

        if ($request->accept_marketing_offers == 1) {
            $post->accept_marketing_offers = $request->accept_marketing_offers;
        }
        if ($request->city_id != null) {
            $city_laid = City::findorfail($request->city_id);
            $post->lon = $city_laid->longitude;
            $post->lat = $city_laid->latitude;
        }
        if ($offer_price <= 0) {
            $post->email_verified_at = date('Y-m-d H:i:s');
            $post->reviewed_at = null;
        } else {
            $post->email_verified_at = date('Y-m-d H:i:s');
            $post->reviewed_at = date('Y-m-d H:i:s');
        }
        $post->save();

        $others_info = new Post_others_info();
        $others_info->post_id = $post->id;
        $others_info->car_mileage = $request->car_mileage;
        $others_info->car_title = $request->car_title;
        $others_info->car_title_clear = $request->car_title_clear;
//        $others_info->car_pickup_point = $request->car_pickup_point;
        $others_info->car_owner = $request->car_owner;
        $others_info->car_wheels = $request->car_wheels;
        $others_info->car_battery = $request->car_battery;
        $others_info->car_start = $request->car_start;
        $others_info->car_condition = $request->car_condition;
        $others_info->car_exterior_damage = $request->car_exterior_damage;
        $others_info->car_exterior_missing = $request->car_exterior_missing;
        $others_info->car_catalytic = $request->car_catalytic;
        $others_info->car_interior = $request->car_interior;
        $others_info->car_flood = $request->car_flood;
        $others_info->save();

        if ($request->car_pickup_point_address != null) {
            $pick_up_point = new pickup_poin_info();
            $pick_up_point->post_id = $post->id;
            $pick_up_point->address = $request->car_pickup_point_address;
            $pick_up_point->slot = $request->car_pickup_time_slot;
            $pick_up_point->save();

        }

        if ($offer_price <= 0) {
            return redirect()->route('get_offer.result');
        }
        $post_id = $post->id;

        $extra = [];


        session()->put('price', $offer_price);
        session()->put('refer', $post_id);
        session()->put('customer', $customer);
        
        // Build SMS message based on car_start selection
        if ($request->car_start === 'Yes') {
            // For "Yes it start and drive" - Show only desired price
            if (\auth()->check()) {
                $user_name = \auth()->user()->name;
                
                $messageBody = "New Query!\n" .
                    "Name: $user_name\n" .
                    "ID: $post->id\n" .
                    "Address: $request->car_pickup_point_address\n".
                    "Car Condition: Yes it starts and drive\n";
                
                // Add customer's desired price if provided
                if ($request->has('desired_price') && $request->desired_price != null) {
                    $messageBody .= "Customer Desired Price: $" . number_format($request->desired_price, 2) . "\n";
                }
                
                $messageBody .= "Phone: $request->phone\n".
                    "Model: $model_name->name\n".
                    "Brand: $brand_name->name\n".
                    "Year: $select_year->name\n";
                
                if ($request->car_pickup_time_slot) {
                    $slot = date('d F,Y H:i A', strtotime($request->car_pickup_time_slot));
                    $messageBody .= "Time Slot: $slot";
                }
                
            } else {
                $messageBody = "New Query!\n" .
                    "Name: $request->contact_name\n" .
                    "ID: $post->id\n" .
                    "Address: $request->car_pickup_point_address\n".
                    "Car Condition: Yes it starts and drive\n";
                
                // Add customer's desired price if provided
                if ($request->has('desired_price') && $request->desired_price != null) {
                    $messageBody .= "Customer Desired Price: $" . number_format($request->desired_price, 2) . "\n";
                }
                
                $messageBody .= "Phone: $request->phone\n".
                    "Model: $model_name->name\n".
                    "Brand: $brand_name->name\n".
                    "Year: $select_year->name\n";
                
                if ($request->car_pickup_time_slot) {
                    $slot = date('d F,Y H:i A', strtotime($request->car_pickup_time_slot));
                    $messageBody .= "Time Slot: $slot";
                }
            }
            
        } else {
            // For "No" or "NoNo" - Show both our offer and desired price
            if (\auth()->check()) {
                $user_name = \auth()->user()->name;
                
                $messageBody = "New Query!\n" .
                    "Name: $user_name\n" .
                    "ID: $post->id\n" .
                    "Address: $request->car_pickup_point_address\n".
                    "Our Offer: $" . number_format($offer_price, 2) . "\n";
                
                // Add customer's desired price if provided
                if ($request->has('desired_price') && $request->desired_price != null) {
                    $messageBody .= "Customer Desired Price: $" . number_format($request->desired_price, 2) . "\n";
                }
                
                $messageBody .= "Phone: $request->phone\n".
                    "Model: $model_name->name\n".
                    "Brand: $brand_name->name\n".
                    "Year: $select_year->name\n";
                
                if ($request->car_pickup_time_slot) {
                    $slot = date('d F,Y H:i A', strtotime($request->car_pickup_time_slot));
                    $messageBody .= "Time Slot: $slot";
                }
                
            } else {
                $messageBody = "New Query!\n" .
                    "Name: $request->contact_name\n" .
                    "ID: $post->id\n" .
                    "Address: $request->car_pickup_point_address\n".
                    "Our Offer: $" . number_format($offer_price, 2) . "\n";
                
                // Add customer's desired price if provided
                if ($request->has('desired_price') && $request->desired_price != null) {
                    $messageBody .= "Customer Desired Price: $" . number_format($request->desired_price, 2) . "\n";
                }
                
                $messageBody .= "Phone: $request->phone\n".
                    "Model: $model_name->name\n".
                    "Brand: $brand_name->name\n".
                    "Year: $select_year->name\n";
                
                if ($request->car_pickup_time_slot) {
                    $slot = date('d F,Y H:i A', strtotime($request->car_pickup_time_slot));
                    $messageBody .= "Time Slot: $slot";
                }
            }
        }
        
        // Send SMS
        $twilio = new TwilioSMS();
        $twilio->sendSms($messageBody);
        
        // Route based on car_start value
        if ($request->car_start === 'Yes') {
            return redirect()->route('get_offer.result');
        } else {
            return redirect()->route('get_offer.result.to', [
                'offer_price' => $offer_price, 
                'post_id' => $post_id, 
                'customer' => $customer
            ]);
        }

    }

    public function post_notice_zero_dollar()
    {
        return view('post_notice_zero_dollar');
    }

    // public function post_status_with_agree(Request $request)
    // {

    //     try {
    //         $commission = 0;
    //         $customer_info = User::findorfail(session()->get('customer'));
    //         $customerName = $customer_info->name;
    //         $offerAmount = session()->get('price');
    //         $referenceNumber = session()->get('refer');
    //         $post = Post::where('id', $request->post_id)->first();
    //         $post_creator = User::findorfail($post->user_id);
    //         $pick_details = pickup_poin_info::where('post_id', $post->id)->first();

    //         // Example data
    //         $postLink = url('/' . $post->title . '/' . $post->id);
    //         $price = '$' . $post->price;
    //         $name = $post_creator->name;
    //         $address = $pick_details->address;
    //         $email = $post_creator->email;
    //         $phoneNumber = $post_creator->phone;
    //         $profileLink = url('/' . 'account');
    //         $referenceNumber = $post->id;
    //         $pickupTime = date('H:i A', strtotime($pick_details->slot)) . ' on ' . date('M d,Y', strtotime($pick_details->slot));


    //         if ($post->agree_with != 1) {
    //             $post->agree_with = 1;
    //             $post->price += $commission;
    //             $post->reviewed_at = null;
    //             $post->save();
    //             Mail::to($customer_info->email)->send(new OfferAccepted($customerName, $offerAmount, $referenceNumber));
    //             Mail::to('info@cashingcarz.com')->send(new SalesRequest($postLink, $price, $name, $address, $email, $phoneNumber, $profileLink, $referenceNumber, $pickupTime));
    //             foreach (User::where('is_admin', 1)->get() as $admin) {
    //                 Mail::to($admin->email)->send(new SalesRequest($postLink, $price, $name, $address, $email, $phoneNumber, $profileLink, $referenceNumber, $pickupTime));
    //             }
    //             if ($pick_details) {
    //                 $slot = date('d F,Y H:i A', strtotime($pick_details->slot));
    //                 $messageBody = "Customer selects the 'Yes' button!\n" .
    //                     "Name: $customerName->name\n" .
    //                     "ID: $post->id\n" .
    //                     "Time Slot: $slot\n";
    //             } else {
    //                 $messageBody = "Customer selects the 'Yes' button!\n" .
    //                     "Name: $customerName->name\n" .
    //                     "ID: $post->id\n";
    //             }
    //             $twilio = new TwilioSMS();
    //             $twilio->sendSms($messageBody);
    //         }
    //         session()->forget('customer');
    //         session()->forget('price');
    //         session()->forget('refer');
    //         return 1;
    //     } catch (\Exception $e) {
    //         return $e->getMessage();
    //     } catch (\mysqli_sql_exception $exception) {
    //         return $exception->getMessage();
    //     }

    // }
    
    public function post_status_with_agree(Request $request)
{
     \Log::info('🚀 post_status_with_agree HIT');
     
    try {
        $commission = 0;
        $customer_info = User::findOrFail($request->customer_id);
        $customerName = $customer_info->name;
        $offerAmount = $request->offer_price;
        $referenceNumber = $request->refer;
        $post = Post::where('id', $request->post_id)->first();
        $post_creator = User::findOrFail($post->user_id);
        $pick_details = pickup_poin_info::where('post_id', $post->id)->first();

        $postLink = url('/' . $post->title . '/' . $post->id);
        $price = '$' . $post->price;
        $name = $post_creator->name;
        $address = $pick_details->address ?? 'N/A';
        $email = $post_creator->email;
        $phoneNumber = $post_creator->phone;
        $profileLink = url('/account');
        $referenceNumber = $post->id;
        $pickupTime = $pick_details
            ? date('H:i A', strtotime($pick_details->slot)) . ' on ' . date('M d,Y', strtotime($pick_details->slot))
            : 'N/A';
            
                OfferSubmission::create([
        'post_id' => $request->post_id,
        'customer_id' => $request->customer_id,
        'email' => $customer_info->email, // 👈 Add this
        'offer_price' => $request->offer_price,
        'reference_number' => $request->refer,
    ]);


        if ($post->agree_with != 1) {
            $post->agree_with = 1;
            $post->price += $commission;
            $post->reviewed_at = null;
            $post->save();

            // Send emails
            Mail::to($customer_info->email)->send(new OfferAccepted($customerName, $offerAmount, $referenceNumber));
            Mail::to('info@cashingcarz.com')->send(new SalesRequest($postLink, $price, $name, $address, $email, $phoneNumber, $profileLink, $referenceNumber, $pickupTime));
            foreach (User::where('is_admin', 1)->get() as $admin) {
                Mail::to($admin->email)->send(new SalesRequest($postLink, $price, $name, $address, $email, $phoneNumber, $profileLink, $referenceNumber, $pickupTime));
            }

            // Send SMS
            $slotFormatted = $pick_details
                ? date('d F,Y H:i A', strtotime($pick_details->slot))
                : 'N/A';
            $messageBody = "Customer selected 'Yes'!\n" .
                "Name: $customerName\n" .
                "ID: $post->id\n" .
                "Time Slot: $slotFormatted\n";

            $twilio = new TwilioSMS();
            $twilio->sendSms($messageBody);
        }

        // session()->forget(['customer', 'price', 'refer']);

        // Optional: return JSON or redirect
        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        \Log::error('❌ Error in post_status_with_agree: ' . $e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}


    public function post_notice_with_dollar($offer_price, $post_id, $customer)
    {
        return view('post_notice_with_dollar', compact('offer_price', 'post_id', 'customer'));
    }

    public function price_auto_update_settings()
    {
        $auto_prices = auto_price_update_settings::paginate(1500);
        return view('admin.auto_price.index', compact('auto_prices'));
    }

    public function price_auto_update_settings_store(Request $request)
    {

        $auto_price = auto_price_update_settings::where('year', $request->year)
            ->where('car_brand', $request->car_brand)
            ->where('car_model', $request->car_model)
            ->where('car_sub_model', $request->car_sub_model)
            ->where('value', $request->price)
            ->first();
        if ($auto_price) {
            return back()->withErrors(['error' => 'Already added']);
        }
        $auto_price = new auto_price_update_settings();
        $auto_price->year = $request->year;
        $auto_price->car_brand = $request->car_brand;
        $auto_price->car_model = $request->car_model;
        $auto_price->car_sub_model = $request->car_sub_model;
        $auto_price->value = $request->price;
        $auto_price->save();


        flash('Auto price settings successfully added')->success();


        return back();
    }

    public function price_auto_update_settings_edit(Request $request)
    {
        $auto_price = auto_price_update_settings::findorfail($request->id);
        ob_start()
        ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Year</label>
            <input type="text" class="form-control mb-2" id="exampleInputEmail1"
                   aria-describedby="emailHelp" name="year" placeholder="Enter year"
                   value="<?php echo $auto_price->year ?>">

            <input type="hidden" class="form-control mb-2" id="exampleInputEmail1"
                   aria-describedby="emailHelp" name="id" placeholder="Enter year"
                   value="<?php echo $auto_price->id ?>">

        </div>


        <div class="form-group">
            <label for="exampleFormControlSelect1">Condition Set</label>
            <select class="form-control mb-2" id="exampleFormControlSelect1" name="up_or_down">
                <option value="">Select Condition</option>
                <option value="1" <?php if ($auto_price->up_or_down == 1) {
                    echo 'selected';
                } ?>>Above
                </option>
                <option value="0" <?php if ($auto_price->up_or_down == 0) {
                    echo 'selected';
                } ?>>Under
                </option>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Condition Set</label>
            <select class="form-control mb-2" id="exampleFormControlSelect1" name="suv_model">
                <option value="">Select Condition</option>
                <option value="1" <?php if ($auto_price->suv_model == 1) {
                    echo 'selected';
                } ?> >SUV Model
                </option>
                <option value="0" <?php if ($auto_price->suv_model == 0) {
                    echo 'selected';
                } ?> >Non SUV Model
                </option>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" placeholder="Enter price" name="price"
                   value="<?php echo $auto_price->value ?>">
    
        </div>
        <button type="submit" class="btn btn-primary float-end mt-3 mb-3">Update</button>
        <?php

        return ob_get_clean();
    }

    public function price_auto_update_settings_update(Request $request)
    {
        $auto_price = auto_price_update_settings::where('year', $request->id)
            ->where('up_or_down', $request->up_or_down)
            ->where('suv_model', $request->suv_model)
            ->where('value', $request->price)
            ->first();
        if ($auto_price) {
            return back()->withErrors(['error' => 'Already added']);
        }
        $auto_price = auto_price_update_settings::findorfail($request->id);
        $auto_price->year = $request->year;
        $auto_price->up_or_down = $request->up_or_down;
        $auto_price->suv_model = $request->suv_model;
        $auto_price->value = $request->price;
        $auto_price->save();


        flash('Auto price settings successfully added')->success();


        return back();
    }

    public function price_auto_update_settings_destroy($id)
    {
        $auto_price = auto_price_update_settings::findorfail($id);
        $auto_price->delete();
        return back();
    }

    public function customer_expected_price(Request $request)
    {

        $post = Post::findorfail($request->post_id);
        $time_slot = pickup_poin_info::where('post_id', $post->id)->first();
        $user = User::findorfail($post->user_id);
        if ($post) {
            $post->title = $request->title;
            $post->car_brand_id = $request->car_brand_id;
            $post->reviewed_at = date('Y-m-d H:i:s');
            $post->price = $request->exp_price;
            $post->agree_with = 0;
            // Save all pictures
            $extra['pictures'] = $this->singleStepPicturesStore($post->id, $request);
            $post->save();
            // Send email
            Mail::to($user->email)->send(new PromoteCashingCarz($user->name));
            Mail::to('info@cashingcarz.com')->send(new PromoteCashingCarz($user->name));
            foreach (User::where('is_admin', 1)->get() as $admin) {
                Mail::to($admin->email)->send(new PromoteCashingCarz($user->name));
            }
            if ($time_slot) {
                $slot = date('d F,Y H:i A', strtotime($time_slot->slot));
                $messageBody = "Post Request!\n" .
                    "Name: $user->name\n" .
                    "ID: $post->id\n" .
                    "Time Slot: $slot\n";
            } else {
                $messageBody = "Post Request!\n" .
                    "Name: $user->name\n" .
                    "ID: $post->id\n";
            }


            $twilio = new TwilioSMS();
            $twilio->sendSms($messageBody);
        }
        ob_start()
        ?>
        <script>
            alert('Your post has been successfully added');
            window.location.href = "/";
        </script>

        <?php


        return ob_get_clean();
    }

    public function sells()
    {
        return view('sells');
    }

    public function no_button_click(Request $request)
    {
        try {
            $post = Post::findorfail($request->post_id);
            $user = User::findorfail($post->user_id);
            $post->reviewed_at = date('Y-m-d H:i:s');
            $post->agree_with = 0;
            $post->save();
            // Send email
            Mail::to($user->email)->send(new PromoteCashingCarz($user->name));
            Mail::to('info@cashingcarz.com')->send(new PromoteCashingCarz($user->name));
            foreach (User::where('is_admin', 1)->get() as $admin) {
                Mail::to($admin->email)->send(new PromoteCashingCarz($user->name));
            }

            $messageBody = "Customer selects the 'No' button!\n" .
                "Name: $user->name\n" .
                "ID: $post->id\n";


            $twilio = new TwilioSMS();
            $twilio->sendSms($messageBody);
        } catch (\Exception $e) {
            Log::info('No Button Click Error: ' . $e->getMessage());
        }

    }
}
