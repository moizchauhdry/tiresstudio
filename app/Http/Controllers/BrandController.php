<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function index()
    {
        $brands = Brand::all();
        $response['brands'] = $brands;
        return view('admin.brands.index')->with($response);
    }
}
