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

use App\Http\Controllers\Get_offer_controler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// install
Route::namespace('Install')->group(__DIR__ . '/web/install.php');

Route::middleware(['installed'])
	->group(function () {
		// admin
		$prefix = config('larapen.admin.route', 'admin');
		Route::namespace('Admin')->prefix($prefix)->group(__DIR__ . '/web/admin.php');
		
		// public
		Route::namespace('Public')->group(__DIR__ . '/web/public.php');
	});
//Route::get('donate', [Get_offer_controler::class, 'donate'])->name('donate');
//Route::get('testimonial', [Get_offer_controler::class, 'testimonial'])->name('testimonial');
//Route::get('get_offer', [Get_offer_controler::class, 'get_offer'])->name('get_offer');
//Route::get('get_car_model', [Get_offer_controler::class, 'get_car_model'])->name('get_car_model');
//Route::get('get_car_model_sub', [Get_offer_controler::class, 'get_car_model_sub'])->name('get_car_model_sub');
//Route::post('get_car_model_sub/store', [Get_offer_controler::class, 'get_car_model_sub_store'])->name('get_car_model_sub_store');