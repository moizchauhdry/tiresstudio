<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getSessions', function () {
    dd(Session::all());
});

/**
 *****************************************************************************
 ************************** ADMIN PANEL ROUTES *******************************
 *****************************************************************************
*/
Route::group(['middleware' => 'prevent-back-history'], function()
{
    Route::get('/dashboard', function () {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    });

    Route::prefix('admin')->group(function()
    {
        Route::match(['get','post'],'/','AdminController@login')->name('admin.login');

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

                // Route::group(['middleware' => ['permission:manage-brands']],function(){
                Route::group(['prefix' => 'brands'],function(){
                    Route::get('/', 'BrandController@index')->name('brands.index');
                });
                // });

            });
        });
    });
});

// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
