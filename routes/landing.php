<?php

use App\Http\Controllers\Landing as Landing;
use App\Http\Controllers\LandingScreenController;
use App\Http\Controllers\SuperAdminEnquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['xss']], function () {
    Route::get('/', [LandingScreenController::class, 'index'])->name('landing.home');
    Route::get('/about-us', [LandingScreenController::class, 'aboutUs'])->name('landing.about.us');
    Route::get('/our-services', [LandingScreenController::class, 'services'])->name('landing.services');
    Route::get('/contact-us', [LandingScreenController::class, 'contactUs'])->name('landing.contact.us');
    Route::get('/faqs', [LandingScreenController::class, 'faq'])->name('landing.faq');
    Route::get('pricing', [LandingScreenController::class, 'pricing'])->name('landing.pricing');
    Route::post('/enquiries', [SuperAdminEnquiryController::class, 'store'])->name('super.admin.enquiry.store');
    Route::post('/subscribe', [Landing\SubscriberController::class, 'store'])->name('subscribe.store');
});
