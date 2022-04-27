<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Product;
use App\ProductInventory;
use App\ProductPrice;
use App\Services\FirebaseService;
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

    public function products()
    {
        $product = Product::paginate(15);

        dd($product->links());
    }

    public function notification()
    {
//        dd($admins = Admin::whereNotNull('device_token')->pluck('device_token'));
        $data = [
            "name" => "Dummy Mesage by Noaman",
            "message" => "dummy message by Noaman Hahsmi",
        ];

        $firebase = new FirebaseService();
        return $firebase->notifyAdmin1($data);
    }
}
