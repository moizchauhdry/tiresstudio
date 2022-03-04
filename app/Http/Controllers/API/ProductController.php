<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id','title','boltPattern','finishCode')->where('sku_type','Wheel')->paginate(12)->onEachSide(4);
        return response()->json([
            'status' => true,
            'data' => $products,
        ]);
    }

    public function sideBarData()
    {
        $response['finishes'] = array_unique(Product::select('finishCode')->where('sku_type','Wheel')->pluck('finishCode')->toArray());
        $response['boltPatterns'] = array_unique(Product::select('boltPattern')->where('sku_type','Wheel')->pluck('boltPattern')->toArray());
        $response['diameter'] = array_unique(Product::select('diameter')->where('sku_type','Wheel')->pluck('diameter')->toArray());
        $response['offset'] = array_unique(Product::select('offset')->where('sku_type','Wheel')->pluck('offset')->toArray());
        $response['sizeDesc'] = array_unique(Product::select('sizeDesc')->where('sku_type','Wheel')->pluck('sizeDesc')->toArray());
        $response['brands'] = Brand::all();
        return response()->json([
            'status' => true,
            'data' => $response,
        ]);

    }

    public function searchProducts(Request $request){
        $products = Product::select('id','title','boltPattern','finishCode')->where('sku_type','Wheel');
        if($request->has('brand_id') && !empty($request->get('brand_id'))){
            $products->where('brand_id',$request->brand_id);
        }

        if($request->has('finish') && !empty($request->get('finish'))){
            $products->where('finishCode',$request->finish);
        }

        if($request->has('diameter') && !empty($request->get('diameter'))){
            $products->where('diameter',$request->diameter);
        }

        if($request->has('offset') && !empty($request->get('offset'))){
            $products->where('offset',$request->offset);
        }

        if($request->has('sizeDesc') && !empty($request->get('sizeDesc'))){
            $products->where('sizeDesc',$request->sizeDesc);
        }

        if($request->has('boltPattern') && !empty($request->get('boltPattern'))){
            $products->where('boltPattern',$request->boltPattern);
        }

        return response()->json([
            'status' => true,
            'data' => $products->paginate(12)->onEachSide(4),
        ]);
    }
}
