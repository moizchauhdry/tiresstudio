<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Make;
use Illuminate\Http\Request;
use App\Product;
use App\VehicleModel;
use App\Brand;

class FrontendController extends Controller
{
    public function index()
    {
        $response['popular_wheels'] = Product::take(9)->where('sku_type','Wheel')->get();
        $response['years'] = array_unique(VehicleModel::select('year')->orderBy('year','asc')->pluck('year')->toArray());
        return view('frontend.pages.index',compact('response'));
    }

    public function wheels(Request $request)
    {
        if($request->ajax()){

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

            if($request->has('search') && !empty($request->get('search'))){
                $search = $request->get('search');
                $products->where(function ($query) use($search){
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('finish', 'LIKE', "%$search%")
                        ->orWhere('diameter', 'LIKE', "%$search%")
                        ->orWhere('offset', 'LIKE', "%$search%")
                        ->orWhere('sizeDesc', 'LIKE', "%$search%")
                        ->orWhere('boltPattern', 'LIKE', "%$search%")
                        ->orWhereHas('brand', function ($qry) use($search){
                            $qry->where('description', 'LIKE', "%$search%");
                        });
                });
            }

            $response['products'] = $products->paginate(9);

            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html
            ]);

        }
        $response['finishes'] = array_unique(Product::select('finishCode')->where('sku_type','Wheel')->pluck('finishCode')->toArray());
        $response['boltPatterns'] = array_unique(Product::select('boltPattern')->where('sku_type','Wheel')->pluck('boltPattern')->toArray());
        $response['diameter'] = array_unique(Product::select('diameter')->where('sku_type','Wheel')->pluck('diameter')->toArray());
        $response['offset'] = array_unique(Product::select('offset')->where('sku_type','Wheel')->pluck('offset')->toArray());
        $response['sizeDesc'] = array_unique(Product::select('sizeDesc')->where('sku_type','Wheel')->pluck('sizeDesc')->toArray());
        $response['brands'] = Brand::all();
        $response['products'] = Product::paginate(9);
        return view('frontend.pages.wheels',compact('response'));
    }

    public function tires(Request $request)
    {
        return view('frontend.pages.under-construction');
    }

    public function accessories(Request $request)
    {
        return view('frontend.pages.under-construction');
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('frontend.pages.product',compact('product'));
    }

    public function checkout()
    {
        return view('frontend.pages.checkout');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function gallery()
    {
        return view('frontend.pages.gallery');
    }

    public function getMakesByYear(Request $request)
    {
        $year = $request->year;
        $makes = Make::whereHas('vehicles',function ($query) use ($year){
          $query->where('year',$year);
        })->get();

        return response()->json([
            'status' => true,
            'data' => $makes,
        ]);
    }

    public function getModelsByMakes(Request $request)
    {
        $models = VehicleModel::where('make_id',$request->make)->where('year',$request->year)->get();

        return response()->json([
            'status' => true,
            'data' => $models,
        ]);
    }
}
