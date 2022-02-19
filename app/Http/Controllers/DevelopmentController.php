<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductInventory;
use App\ProductPrice;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    //
    public function removeTires()
    {
        $productIds = Product::where('sku_type','Tire')->pluck('id')->toArray();
        dd($productIds);
        $productPrice = ProductPrice::whereIn('product_id',$productIds)->delete();
        $productInventory = ProductInventory::whereIn('product_id',$productIds)->delete();


    }
}
