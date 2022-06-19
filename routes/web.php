<?php

use Illuminate\Support\Facades\Route;

/**
 *****************************************************************************
 ************************** FRONTEND ROUTES *******************************
 *****************************************************************************
 */

Route::get('/', 'Frontend\FrontendController@index')->name('frontend.pages.index');
Route::any('/wheels', 'Frontend\FrontendController@wheels')->name('frontend.pages.wheels');
Route::any('/tires', 'Frontend\FrontendController@tires')->name('frontend.pages.tires');
Route::any('/accessories', 'Frontend\FrontendController@accessories')->name('frontend.pages.accessories');
Route::get('/product/{id}', 'Frontend\FrontendController@product')->name('frontend.pages.product');
Route::any('/brands', 'Frontend\FrontendController@brand')->name('frontend.pages.brands');
Route::any('/brands/{id}', 'Frontend\FrontendController@brandProducts')->name('frontend.pages.brand-products');
Route::any('/shop', 'Frontend\FrontendController@shop')->name('frontend.pages.shop');
Route::any('/page/{id}', 'Frontend\FrontendController@page')->name('frontend.pages.page');


Route::prefix('cart')->group(function () {
    Route::any('/', 'Frontend\CartController@cart')->name('frontend.cart');
    Route::post('/decrement', 'Frontend\CartController@decrement')->name('frontend.cart.decrement');
    Route::post('/increment', 'Frontend\CartController@increment')->name('frontend.cart.increment');
    Route::post('/destroy', 'Frontend\CartController@destroy')->name('frontend.cart.destroy');
});

Route::any('/contact', 'Frontend\FrontendController@contact')->name('frontend.pages.contact');
Route::get('/about', 'Frontend\FrontendController@about')->name('frontend.pages.about');
Route::get('/gallery', 'Frontend\FrontendController@gallery')->name('frontend.pages.gallery');

Route::any('/register', 'Frontend\RegisterController@register')->name('frontend.pages.register');
Route::any('/login', 'Frontend\RegisterController@login')->name('frontend.pages.login');
Route::any('/checkout', 'Frontend\OrderController@checkout')->name('frontend.pages.checkout');
Route::post('/order', 'Frontend\OrderController@order')->name('frontend.customer.order');
Route::post('/payment', 'Frontend\OrderController@payment')->name('frontend.customer.payment');
Route::get('/payment-success/{id?}', 'Frontend\OrderController@paymentSuccess')->name('frontend.customer.payment-success');

Route::group(['prefix' => 'customer', 'middleware' => 'customer'], function () {
    Route::get('/dashboard', 'Frontend\CustomerController@dashboard')->name('frontend.customer.dashboard');
    Route::any('/profile', 'Frontend\CustomerController@profile')->name('frontend.customer.profile');
    Route::post('/logout', 'Frontend\CustomerController@logout')->name('frontend.customer.logout');
});

Route::group(['prefix' => 'get', 'as' => 'get.'], function () {
    Route::post('/makesByYear', 'Frontend\FrontendController@getMakesByYear')->name("makes-by-year");
    Route::post('/modelByMakes', 'Frontend\FrontendController@getModelsByMakes')->name("model-by-makes");
});

/**
 *****************************************************************************
 ************************** ADMIN PANEL ROUTES *******************************
 *****************************************************************************
 */

Route::get('/getSessions', function () {
    dd(Session::all());
});

Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/admin/dashboard', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    });

    Route::prefix('admin')->group(function () {
        Route::match(['get', 'post'], '/login', 'AdminController@login')->name('admin.login');

        Route::group(['middleware' => ['adminCheckSuspend']], function () {
            Route::group(['middleware' => ['admin']], function () {
                Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
                Route::get('/logout', 'AdminController@logout')->name('admin.logout');
                Route::post('/store', 'NotificationController@storeToken')->name('token.store');
                Route::any('/get-notifications', 'NotificationController@getNotifications')->name('admin.get-notifications');
                Route::any('/read-notifications', 'NotificationController@readNotifications')->name('admin.read-notifications');

                Route::group(['middleware' => ['permission:manage-admin-users']], function () {
                    Route::group(['prefix' => 'admin-users'], function () {
                        Route::get('/', 'AdminUserController@index')->name('admins.index');
                        Route::get('/create', 'AdminUserController@create')->name('admins.create');
                        Route::post('/store', 'AdminUserController@store')->name('admins.store');
                        Route::get('/edit/{id}', 'AdminUserController@edit')->name('admins.edit');
                        Route::post('/update/{id}', 'AdminUserController@update')->name('admins.update');
                    });
                });

                // Route::group(['middleware' => ['permission:manage-products']],function(){
                Route::group(['prefix' => 'products'], function () {
                    Route::get('/', 'ProductController@index')->name('products.index');
                    Route::get('/fetchProducts', 'ProductController@fetchProducts')->name('products.fetch-products');
                    Route::get('/fetchTireProducts', 'ProductController@fetchTireProducts')->name('products.fetch-tire-products');
                    Route::get('/show/{id}', 'ProductController@show')->name('products.show');
                    Route::get('/create', 'ProductController@create')->name('products.create');
                    Route::post('/store', 'ProductController@store')->name('products.store');
                    Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
                    Route::post('/update/{id}', 'ProductController@update')->name('products.update');
                    Route::post('/destroyImage/', 'ProductController@destroyImage')->name('products.destroyImage');
                });
                // });

                Route::group(['prefix' => 'vehicle', 'as' => 'vehicle.'], function () {
                    Route::get('/', 'VehicleController@index')->name('index');
                    Route::get('/makes', 'VehicleController@index')->name('index');
                    Route::get('/show/{id}', 'VehicleController@show')->name('show');
                });

                Route::get('/makes', 'VehicleController@indexMake')->name('vehicle.indexMake');

                // Route::group(['middleware' => ['permission:manage-brands']],function(){
                Route::group(['prefix' => 'brands'], function () {
                    Route::get('/', 'BrandController@index')->name('brands.index');
                    Route::get('/create', 'BrandController@create')->name('brands.create');
                    Route::post('/store', 'BrandController@store')->name('brands.store');
                    Route::get('/edit/{id}', 'BrandController@edit')->name('brands.edit');
                    Route::post('/update/{id}', 'BrandController@update')->name('brands.update');
                });
                // });

                Route::group(['prefix' => 'fetch', 'as' => 'fetch.'], function () {
                    Route::get('/wheels', 'FetchController@fetchProducts')->name('wheels');
                    Route::get('/tires', 'FetchController@fetchTireProducts')->name('tires');
                    Route::get('/vehicles', 'FetchController@getVehicles')->name('vehicles');
                    Route::get('/years', 'FetchController@getYears')->name('years');
                    Route::get('{year}/makes', 'FetchController@getMakes')->name('makes');
                });

                // Route::group(['middleware' => ['permission:manage-orders']],function(){
                Route::group(['prefix' => 'orders'], function () {
                    Route::get('/', 'OrderController@index')->name('orders.index');
                    Route::get('/detail/{id}', 'OrderController@detail')->name('orders.detail');
                    Route::post('/updateOrderStatus/{id}', 'OrderController@updateOrderStatus')->name('updateOrderStatus');
                    Route::get('/check', 'OrderController@check')->name('orders.check');
                });
                // });

                Route::get('payments', 'OrderController@paymentIndex')->name('payment.index');

                Route::group(['prefix' => 'import'], function () {
                    Route::any('/products', 'ImportController@importProducts')->name('import.importProducts');
                });

                Route::group(['prefix' => 'gallery'], function () {
                    Route::get('/', 'GalleryController@index')->name('gallery.index');
                    Route::get('/create', 'GalleryController@create')->name('gallery.create');
                    Route::post('/store', 'GalleryController@store')->name('gallery.store');
                    Route::get('/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
                    Route::post('/update/{id}', 'GalleryController@update')->name('gallery.update');
                    Route::post('/destroy', 'GalleryController@destroy')->name('gallery.destroy');
                });

                Route::group(['prefix' => 'pages'], function () {
                    Route::get('/', 'PageController@index')->name('pages.index');
                    Route::get('/create', 'PageController@create')->name('pages.create');
                    Route::post('/store', 'PageController@store')->name('pages.store');
                    Route::get('/edit/{id}', 'PageController@edit')->name('pages.edit');
                    Route::post('/update/{id}', 'PageController@update')->name('pages.update');
                    Route::post('/destroy', 'PageController@destroy')->name('pages.destroy');
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

Route::group(['prefix' => 'development'], function () {
    Route::get('/deleteTires', 'DevelopmentController@removeTires');
    Route::get('/products', 'DevelopmentController@products');
    Route::get('job-test', function () {
        dispatch(new \App\Jobs\ImportProductJob());
        dd('done');
    });

    Route::get('send-notification', "DevelopmentController@notification");
});
