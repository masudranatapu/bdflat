<?php

Route::prefix('v1')->group(function () {
    Route::post('login', ['uses' => 'Api\AuthController@postLogin']);

	Route::group(['middleware' => ['chckt'], 'namespace' => 'Api'], function ($router) {
		Route::get('get-user', ['middleware' => 'api-acl:view_user', 'uses' => 'UserController@getUserList']);
        Route::post('get-master-products', ['middleware' => 'api-acl:view_user', 'uses' => 'ProductController@getProductList']);
        Route::post('get-variant', ['middleware' => 'api-acl:view_user', 'uses' => 'ProductController@getVariantList']);
        // Route::post('get-stockSearchList', ['middleware' => 'api-acl:view_user', 'uses' => 'ProductController@getStockSearchList']);
        // Route::post('get-variant-img', ['middleware' => 'api-acl:view_user', 'uses' => 'ProductController@getVariantImg']);

		// Route::get('get-products/{id}', ['middleware' => 'api-acl:view_user', 'uses' => 'ProductController@getProductListSingle']);
    });

    Route::group(['namespace' => 'Api'], function ($router) {
        // Route::post('get-master-products', ['uses' => 'ProductController@getProductList']);
        // Route::post('get-variant', ['uses' => 'ProductController@getVariantList']);
        // Route::get('get-variant-img/{id}', ['uses' => 'ProductController@getVariantImg']);
        Route::post('get-variant-img', ['uses' => 'ProductController@getVariantImg']);
        Route::post('get-stockSearchList', ['uses' => 'ProductController@getStockSearchList']);
    });
});

