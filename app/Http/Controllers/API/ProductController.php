<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id','title','boltPattern','finishCode')->where('sku_type','Wheel')->paginate(9)->onEachSide(4);
        return response()->json([
            'status' => true,
            'data' => $products,
        ]);
    }

    public function sideBarData()
    {
        $response['finishes'] = array_unique(Product::select('finishCode')->where('sku_type','Wheel')->pluck('finishCode')->toArray());
        $response['boltPatterns'] = array_unique(Product::select('boltPattern')->where('sku_type','Wheel')->pluck('boltPattern')->toArray());

        return response()->json([
            'status' => true,
            'data' => $response,
        ]);

    }

    public function searchProducts(Request $request){
        $products = Product::select('id','title','boltPattern','finishCode')->where('sku_type','Wheel');
        $products->paginate(9);


        if($request->has('finish')){
            $products->where('finishCode',$request->finish);
        }

        if($request->has('boltPattern')){
            $products->where('boltPattern',$request->boltPattern);
        }

        return response()->json([
            'status' => true,
            'data' => $products->paginate(9)->onEachSide(4),
        ]);
    }
}
