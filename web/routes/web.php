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
Route::get('/terms-conditions', 'CommonController@getTermsConditions')->name('terms-conditions');
Route::get('/site-map', 'CommonController@getSiteMap')->name('site-map');
Route::get('/privacy-policy', 'CommonController@getPrivacyPolicy')->name('privacy-policy');

//user routes
Route::get('/my-account', 'UserController@getMyAccount')->name('my-account');
Route::get('/edit-profile', 'UserController@getEditProfile')->name('edit-profile');

Route::group(['namespace' => 'Front', 'middleware' => ['auth']], function () {
    Route::get('/property-requirements', 'RequirementController@getMyRequirement')->name('property-requirements');

    Route::get('/owner-listings', 'OwnerController@getMyListings')->name('owner-listings');
    Route::get('/buy-leads', 'OwnerController@getOwnerBuyLeads')->name('buy-leads');
    Route::get('/owner-leads', 'OwnerController@getOwnerLeads')->name('owner-leads');

    Route::get('listings/create', 'ListingController@create')->name('listings.create');
    Route::post('listings/store', 'ListingController@store')->name('listings.store');
    Route::get('listings/edit/{id}', 'ListingController@edit')->name('listings.edit');
    Route::post('listings/update', 'ListingController@updated')->name('listings.update');

    Route::get('ajax-get-available-floor', 'ListingController@getAvailableFloor')->name('get.available.floor');
    Route::get('ajax-add-listing-variant', 'ListingController@addListingVariant')->name('add-listing-variant');
    Route::get('ajax-get-area/{id}', 'OwnerController@getArea')->name('getarea');
});


Route::get('/suggested-properties', 'UserController@getSuggestedProperties')->name('suggested-properties');
Route::get('/varified-properties', 'UserController@getVarifiedProperties')->name('varified-properties');
Route::get('/contacted-properties', 'UserController@getContactedProperties')->name('contacted-properties');
Route::get('/browsed-properties', 'UserController@getBrowsedProperties')->name('browsed-properties');
Route::get('/recharge-balance', 'UserController@getRechargeBalance')->name('recharge-balance');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


