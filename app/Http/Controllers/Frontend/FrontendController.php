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
        $response['popular_wheels'] = VehicleModel::take(9)->get();
        return view('frontend.pages.index',compact('response'));
    }
}
