<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\VehicleModel;

class FrontendController extends Controller
{
    public function index()
    {
        $response['popular_wheels'] = Product::take(9)->where('sku_type','Wheel')->get();
        return view('frontend.pages.index',compact('response'));
    }

    public function shop()
    {
        $response['products'] = Product::paginate(12);
        return view('frontend.pages.shop',compact('response'));
    }

    public function product($id)
    {
        $response['product'] = Product::find($id);
        return view('frontend.pages.product',compact('response'));
    }
}
