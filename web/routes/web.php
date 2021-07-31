<?php

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


use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/cc', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('config:cache');

    return 'DONE';
});

//common routes
Route::get('/about-us', 'CommonController@getAboutUs')->name('about-us');
Route::get('/contact-us', 'CommonController@getContactUs')->name('contact-us');
Route::post('/contact-us', 'CommonController@storeContactUs');
Route::get('/terms-conditions', 'CommonController@getTermsConditions')->name('terms-conditions');
Route::get('/site-map', 'CommonController@getSiteMap')->name('site-map');
Route::get('/privacy-policy', 'CommonController@getPrivacyPolicy')->name('privacy-policy');


Route::get('/developer-listings', 'CommonController@getDevListings')->name('developer-listings');
Route::get('/developer-leads', 'CommonController@getdeveloperLeads')->name('developer-leads');
Route::get('/developer-buy-leads', 'CommonController@getdeveloperBuyLeads')->name('developer-buy-leads');
Route::get('/developer-payments', 'CommonController@getdeveloperPayments')->name('developer-payments');

Route::group(['namespace' => 'Seeker', 'middleware' => ['auth']], function () {
    Route::get('/suggested-properties', 'SeekerController@getSuggestedProperties')->name('suggested-properties');
    Route::get('/contacted-properties', 'SeekerController@getContactedProperties')->name('contacted-properties');
    Route::get('/browsed-properties', 'SeekerController@getBrowsedProperties')->name('browsed-properties');
    Route::get('/recharge-balance', 'SeekerController@getRechargeBalance')->name('recharge-balance');
    Route::get('/refund-request/{id}', 'SeekerController@getRefundRequest')->name('refund-request');
    Route::post('/refund-request/store', 'SeekerController@customerRefundStore')->name('refund-request.store');
    Route::get('/payment-history', 'SeekerController@paymentHistory')->name('payment-history');
    Route::get('ajax-get-variants/{id}', 'SeekerController@getVariants')->name('get-variants');

});

Route::group(['namespace' => 'Owner', 'middleware' => ['auth']], function () {

    Route::get('/property-requirements', 'RequirementController@getMyRequirement')->name('property-requirements');
    Route::post('/property-requirements/store_or_update', 'RequirementController@storeOrUpdate')->name('property-requirements.store_or_update');
    Route::get('property-requirements/get_area/{id}', 'RequirementController@getArea')->name('property-requirements.get_area');

    Route::get('/owner-listings', 'OwnerController@getMyListings')->name('owner-listings');
    Route::get('/buy-leads', 'OwnerController@getOwnerBuyLeads')->name('buy-leads');
    Route::get('/owner-leads', 'OwnerController@getOwnerLeads')->name('owner-leads');

    Route::get('listings/create', 'ListingController@create')->name('listings.create');
    Route::post('listings/store', 'ListingController@store')->name('listings.store');
    Route::get('listings/{id}/edit', 'ListingController@edit')->name('listings.edit');
    Route::post('listings/{id}/update', 'ListingController@update')->name('listings.update');
    Route::get('listings/{id}/delete', 'ListingController@delete')->name('listings.delete');



    Route::get('ajax-listings-delete_img/{id}', 'ListingController@deleteListingImage')->name('listings.delete_img');
    Route::get('ajax-get-property-type/{id}', 'ListingController@getPropertyType')->name('get.property_type');
    Route::get('ajax-get-available-floor', 'ListingController@getAvailableFloor')->name('get.available.floor');
    Route::get('ajax-add-listing-variant', 'ListingController@addListingVariant')->name('add-listing-variant');
    Route::get('ajax-get-area/{id}', 'OwnerController@getArea')->name('getarea');
});


Route::get('/my-account', 'UserController@getMyAccount')->name('my-account');
Route::get('/profile/edit', 'UserController@getEditProfile')->name('profile.edit');
Route::post('/profile/store_or_update', 'UserController@updateProfile')->name('profile.store_or_update');
Route::post('/profile/password_update', 'UserController@updatePass')->name('profile.password_update');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('ssl.pay');
//Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('ssl.success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('ssl.fail');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('ssl.cancel');

//Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn'])->name('ssl.ipn');
//SSLCOMMERZ END
