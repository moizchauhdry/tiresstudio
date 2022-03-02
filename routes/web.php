<?php

use Illuminate\Support\Facades\Route;

/**
 *****************************************************************************
 ************************** FRONTEND ROUTES *******************************
 *****************************************************************************
*/

Route::get('/', 'Frontend\FrontendController@index')->name('frontend.pages.index');
Route::get('/shop', 'Frontend\FrontendController@shop')->name('frontend.pages.shop');
Route::get('/product/{id}', 'Frontend\FrontendController@product')->name('frontend.pages.product');
Route::any('/cart', 'Frontend\FrontendController@cart')->name('frontend.pages.cart');
Route::post('/cart/destroy', 'Frontend\FrontendController@destroyCart')->name('frontend.pages.cart.destroy');
Route::get('/checkout', 'Frontend\FrontendController@checkout')->name('frontend.pages.checkout');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::get('/about', 'Frontend\FrontendController@about')->name('frontend.pages.about');
Route::get('/gallery', 'Frontend\FrontendController@gallery')->name('frontend.pages.gallery');
Route::get('/register', 'Frontend\FrontendController@register')->name('frontend.pages.register');

/**
 *****************************************************************************
 ************************** ADMIN PANEL ROUTES *******************************
 *****************************************************************************
*/

Route::get('/getSessions', function () {
    dd(Session::all());
});

Route::group(['middleware' => 'prevent-back-history'], function()
{
    Route::get('/admin/dashboard', function () {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    });

    Route::prefix('admin')->group(function()
    {
        Route::match(['get','post'],'/login','AdminController@login')->name('admin.login');

        Route::group(['middleware' => ['adminCheckSuspend']],function()
        {
            Route::group(['middleware' => ['admin']],function()
            {
                Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
                Route::get('/logout', 'AdminController@logout')->name('admin.logout');

                Route::group(['middleware' => ['permission:manage-admin-users']],function(){
                    Route::group(['prefix' => 'admin-users'],function(){
                        Route::get('/', 'AdminUserController@index')->name('admins.index');
                        Route::get('/create', 'AdminUserController@create')->name('admins.create');
                        Route::post('/store', 'AdminUserController@store')->name('admins.store');
                        Route::get('/edit/{id}', 'AdminUserController@edit')->name('admins.edit');
                        Route::post('/update/{id}', 'AdminUserController@update')->name('admins.update');
                    });
                });

                // Route::group(['middleware' => ['permission:manage-products']],function(){
                    Route::group(['prefix' => 'products'],function(){
                        Route::get('/', 'ProductController@index')->name('products.index');
                        Route::get('/fetchProducts', 'ProductController@fetchProducts')->name('products.fetch-products');
                        Route::get('/fetchTireProducts', 'ProductController@fetchTireProducts')->name('products.fetch-tire-products');
                        Route::get('/show/{id}', 'ProductController@show')->name('products.show');
                        Route::get('/create', 'ProductController@create')->name('products.create');
                        Route::post('/store', 'ProductController@store')->name('products.store');
                        Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
                        Route::post('/update/{id}', 'ProductController@update')->name('products.update');
                    });
                // });

                Route::group(['prefix' => 'vehicle','as'=>'vehicle.'],function(){
                    Route::get('/', 'VehicleController@index')->name('index');
                    Route::get('/makes', 'VehicleController@index')->name('index');
                    Route::get('/show/{id}', 'VehicleController@show')->name('show');
                });

                Route::get('/makes', 'VehicleController@indexMake')->name('vehicle.indexMake');

                // Route::group(['middleware' => ['permission:manage-brands']],function(){
                Route::group(['prefix' => 'brands'],function(){
                    Route::get('/', 'BrandController@index')->name('brands.index');
                });
                // });

                Route::group(['prefix' => 'fetch','as' => 'fetch.'],function(){
                    Route::get('/wheels', 'FetchController@fetchProducts')->name('wheels');
                    Route::get('/tires', 'FetchController@fetchTireProducts')->name('tires');
                    Route::get('/vehicles', 'FetchController@getVehicles')->name('vehicles');
                    Route::get('/years', 'FetchController@getYears')->name('years');
                    Route::get('{year}/makes', 'FetchController@getMakes')->name('makes');
                });

            });
        });
    });
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

/**
 *****************************************************************************
 ************************** DEVELOPMENT ROUTES *******************************
 *****************************************************************************
 */

Route::group(['prefix' => 'development'],function (){
    Route::get('/deleteTires','DevelopmentController@removeTires');
    Route::get('/products','DevelopmentController@products');
});
