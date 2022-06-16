<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Brand;
use App\Page;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('brands')) {
            $brands = Brand::select('*')->groupBy('parent')->get();
            View::share(['brands' => $brands]);
        }
        if (Schema::hasTable('pages')) {
            $pages = Page::orderBy('title', 'asc')->get();
            $about = Page::orderBy('title', 'asc')->where('id', '7')->first();
            View::share([
                'pages' => $pages,
                'about' => $about,
            ]);
        }
    }
}
