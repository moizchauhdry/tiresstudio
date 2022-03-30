<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Make;
use App\VehicleModelAxle;
use Illuminate\Http\Request;
use App\Product;
use App\VehicleModel;
use App\Brand;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $response['popular_wheels'] = Product::groupBy('model')->where('boltPattern','!=','BLANK')->take(12)->skip(1)->where('sku_type', 'Wheel')->get();
        $response['years'] = array_unique(VehicleModel::select('year')->orderBy('year', 'asc')->pluck('year')->toArray());
        rsort($response['years']);
        $response['brands'] = Brand::orderBy('description', 'asc')->take(6)->get();
        return view('frontend.pages.index', compact('response'));
    }

    public function wheels(Request $request)
    {
        $response['type'] = 'Wheel';
        $response['products'] = Product::groupBy('model')->where('sku_type', 'Wheel')->where('boltPattern','!=','BLANK')->paginate(9);
        $filter = array();
        if ($request->ajax()) {
            $products = Product::select('id', 'title', 'boltPattern', 'finishCode')->where('sku_type', 'Wheel')->where('boltPattern','!=','BLANK');


            if ($request->has('brand_id') && !empty($request->get('brand_id'))) {
                $products->where('brand_id', $request->brand_id);
                $filter['brand_id'] = $request->brand_id;
            }

            if ($request->has('finish') && !empty($request->get('finish'))) {
                $products->where('finishCode', $request->finish);
                $filter['finishCode'] = $request->finishCode;
            }

            if ($request->has('diameter') && !empty($request->get('diameter'))) {
                $products->where('diameter', $request->diameter);
                $filter['diameter'] = $request->diameter;
            }

            if ($request->has('offset') && !empty($request->get('offset'))) {
                $products->where('offset', $request->offset);
                $filter['offset'] = $request->offset;
            }

            if ($request->has('sizeDesc') && !empty($request->get('sizeDesc'))) {
                $products->where('sizeDesc', $request->sizeDesc);
                $filter['sizeDesc'] = $request->sizeDesc;
            }

            if ($request->has('boltPattern') && !empty($request->get('boltPattern'))) {
                $products->where('boltPattern', $request->boltPattern);
                $filter['boltPattern'] = $request->boltPattern;
            }

            if ($request->has('search') && !empty($request->get('search'))) {
                $search = $request->get('search');
                $products->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('finish', 'LIKE', "%$search%")
                        ->orWhere('diameter', 'LIKE', "%$search%")
                        ->orWhere('offset', 'LIKE', "%$search%")
                        ->orWhere('sizeDesc', 'LIKE', "%$search%")
                        ->orWhere('boltPattern', 'LIKE', "%$search%")
                        ->orWhereHas('brand', function ($qry) use ($search) {
                            $qry->where('description', 'LIKE', "%$search%");
                        });
                });
                $filter['search'] = $search;
            }

            if ($request->hasAny(['year', 'model', 'make']) && (!empty($request->get('year')) || !empty($request->get('model')) || !empty($request->get('make')))) {
                $vehicles = VehicleModel::select('*');

                if ($request->has('year') && !empty($request->get('year'))) {
                    $vehicles->where('year', $request->year);
                    $filter['year'] = $request->year;
                }

                if ($request->has('make') && !empty($request->get('make'))) {
                    $vehicles->where('make_id', $request->make);
                    $filter['make'] = $request->make;
                }

                if ($request->has('model') && !empty($request->get('model'))) {
                    $vehicles->where('id', $request->model);
                    $filter['model'] = $request->model;
                }

                $ids = $vehicles->pluck('id')->toArray();
                $axles = VehicleModelAxle::whereIn('vehicle_model_id', $ids);
                $minDiameter = $axles->orderBy('minDiameterIn', 'asc')->first();
                $maxDiameter = $axles->orderBy('maxDiameterIn', 'asc')->first();
                $offsetMinMm = $axles->orderBy('offsetMinMm', 'asc')->first();
                $offsetMaxMm = $axles->orderBy('offsetMaxMm', 'asc')->first();
                $boltPatternMm = $axles->orderBy('boltPatternMm', 'desc')->first();
                $lugCnt = $axles->orderBy('lugCnt', 'desc')->first();
                $maxBs = $axles->orderBy('maxBs', 'desc')->first();
                /*dump($axles->get());
                dump($minDiameter->minDiameterIn);
                dump($maxDiameter->maxDiameterIn);
                dump($offsetMinMm->offsetMinMm);
                dump($offsetMaxMm->offsetMaxMm);
                dump(number_format($maxBs->maxBs,2));
                dump($centerBoreMm->centerBoreMm);
                dump($lugCnt->lugCnt . 'X' . $boltPatternMm->boltPatternMm);
                dd('here');*/

                $boltPattern = floatval($boltPatternMm->boltPatternMm) ?? 0;

                $products->where('diameter', '>=', $minDiameter->minDiameterIn)
                    ->where('diameter', '<=', $maxDiameter->maxDiameterIn)
                    ->where('offset', '>=', $offsetMinMm->offsetMinMm)
                    ->where('offset', '<=', $offsetMaxMm->offsetMaxMm)
                    ->where('backspacing','<=',number_format($maxBs->maxBs,2))
                    ->where('boltPattern','LIKE',$lugCnt->lugCnt . 'X'.$boltPattern);
            }

            $response['filter'] = $filter;
            $response['products'] = $products->groupBy('model')->paginate(9);
            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }

        if (!$request->ajax() && $request->isMethod('POST')) {

            $vehicles = VehicleModel::select('*');

            if ($request->has('year') && !empty($request->get('year'))) {
                $vehicles->where('year', $request->year);
                $filter['year'] = $request->year;
            }

            if ($request->has('make') && !empty($request->get('make'))) {
                $vehicles->where('make_id', $request->make);
                $filter['make'] = $request->make;
            }

            if ($request->has('model') && !empty($request->get('model'))) {
                $vehicles->where('id', $request->model);
                $filter['model'] = $request->model;
            }

            $ids = $vehicles->pluck('id')->toArray();
            $axles = VehicleModelAxle::whereIn('vehicle_model_id', $ids);
            $minDiameter = $axles->orderBy('minDiameterIn', 'asc')->first();
            $maxDiameter = $axles->orderBy('maxDiameterIn', 'asc')->first();
            $offsetMinMm = $axles->orderBy('offsetMinMm', 'asc')->first();
            $offsetMaxMm = $axles->orderBy('offsetMaxMm', 'asc')->first();
            $boltPatternMm = $axles->orderBy('boltPatternMm', 'desc')->first();
            $lugCnt = $axles->orderBy('lugCnt', 'desc')->first();
            $centerBoreMm = $axles->first();
            $maxBs = $axles->orderBy('maxBs', 'desc')->first();
            /*dump($axles->get());
            dump($minDiameter->minDiameterIn);
            dump($maxDiameter->maxDiameterIn);
            dump($offsetMinMm->offsetMinMm);
            dump($offsetMaxMm->offsetMaxMm);
            dump(number_format($maxBs->maxBs,2));
            dump($centerBoreMm->centerBoreMm);
            dump($lugCnt->lugCnt . 'X' . $boltPatternMm->boltPatternMm);
            dd('here');*/

            $boltPattern = floatval($boltPatternMm->boltPatternMm) ?? 0;

            $products = Product::groupBy('model')->where('diameter', '>=', $minDiameter->minDiameterIn)
                ->where('diameter', '<=', $maxDiameter->maxDiameterIn)
                ->where('offset', '>=', $offsetMinMm->offsetMinMm)
                ->where('offset', '<=', $offsetMaxMm->offsetMaxMm)
                ->where('backspacing','<=',number_format($maxBs->maxBs,2))
                ->where('boltPattern','LIKE',$lugCnt->lugCnt . 'X'.$boltPattern);
            $response['products'] = $products->paginate(9);
        }

        $response['finishes'] = array_unique(Product::select('finishCode')->where('sku_type', 'Wheel')->pluck('finishCode')->toArray());
        $response['boltPatterns'] = array_unique(Product::select('boltPattern')->where('sku_type', 'Wheel')->pluck('boltPattern')->toArray());
        $response['diameter'] = array_unique(Product::select('diameter')->where('sku_type', 'Wheel')->pluck('diameter')->toArray());
        $response['offset'] = array_unique(Product::select('offset')->where('sku_type', 'Wheel')->pluck('offset')->toArray());
        $response['sizeDesc'] = array_unique(Product::select('sizeDesc')->where('sku_type', 'Wheel')->pluck('sizeDesc')->toArray());
        $response['brands'] = Brand::whereHas('products', function ($query) {
            $query->where('sku_type', 'Wheel');
        })->orderBy('description','asc')->get();
        $response['filter'] = $filter;

        return view('frontend.pages.wheels', compact('response'));
    }

    public function tires(Request $request)
    {
        $response['type'] = 'Tire';
        $response['products'] = Product::groupBy('model')->where('sku_type', 'TIRE')->paginate(9);
        $filter = array();
        if ($request->ajax()) {

            $products = Product::select('id', 'title')->where('sku_type', 'TIRE');
            if ($request->has('brand_id') && !empty($request->get('brand_id'))) {
                $products->where('brand_id', $request->brand_id);
                $filter['brand_id'] = $request->brand_id;
            }

            if ($request->has('width') && !empty($request->get('width'))) {
                $products->where('width', $request->width);
                $filter['width'] = $request->width;
            }

            if ($request->has('wheelDiameter') && !empty($request->get('wheelDiameter'))) {
                $products->where('wheelDiameter', $request->wheelDiameter);
                $filter['wheelDiameter'] = $request->wheelDiameter;
            }

            if ($request->has('diameter') && !empty($request->get('diameter'))) {
                $products->where('diameter', $request->diameter);
                $filter['diameter'] = $request->diameter;
            }

            if ($request->has('rimDiameter') && !empty($request->get('rimDiameter'))) {
                $products->where('rimDiameter', $request->rimDiameter);
                $filter['rimDiameter'] = $request->rimDiameter;
            }

            if ($request->has('speedRating') && !empty($request->get('speedRating'))) {
                $products->where('speedRating', $request->speedRating);
                $filter['speedRating'] = $request->speedRating;
            }


            if ($request->has('search') && !empty($request->get('search'))) {
                $search = $request->get('search');
                $products->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('width', 'LIKE', "%$search%")
                        ->orWhere('wheelDiameter', 'LIKE', "%$search%")
                        ->orWhere('diameter', 'LIKE', "%$search%")
                        ->orWhere('rimDiameter', 'LIKE', "%$search%")
                        ->orWhere('speedRating', 'LIKE', "%$search%")
                        ->orWhereHas('brand', function ($qry) use ($search) {
                            $qry->where('description', 'LIKE', "%$search%");
                        });
                });
                $filter['search'] = $search;
            }

            if ($request->hasAny(['year', 'model', 'make']) && (!empty($request->get('year')) || !empty($request->get('model')) || !empty($request->get('make')))) {
                $vehicles = VehicleModel::select('*');

                if ($request->has('year') && !empty($request->get('year'))) {
                    $vehicles->where('year', $request->year);
                    $filter['year'] = $request->year;
                }

                if ($request->has('make') && !empty($request->get('make'))) {
                    $vehicles->where('make_id', $request->make);
                    $filter['make'] = $request->make;
                }

                if ($request->has('model') && !empty($request->get('model'))) {
                    $vehicles->where('id', $request->model);
                    $filter['model'] = $request->model;
                }

                $ids = $vehicles->pluck('id')->toArray();
                $axles = VehicleModelAxle::whereIn('vehicle_model_id', $ids);
                $minDiameter = $axles->orderBy('minDiameterIn', 'asc')->first();
                $maxDiameter = $axles->orderBy('maxDiameterIn', 'asc')->first();
                /*$offsetMinMm = $axles->orderBy('offsetMinMm','asc')->first();
                $offsetMaxMm = $axles->orderBy('offsetMaxMm','asc')->first();*/
                $products->where('diameter', '>=', $minDiameter->minDiameterIn)
                    ->where('diameter', '<=', $maxDiameter->minDiameterIn);
                /*->where('offset','>=', $offsetMinMm->offsetMinMm)
                ->where('offset','<=', $offsetMaxMm->offsetMaxMm);*/
            }


            $response['filter'] = $filter;
            $response['products'] = $products->groupBy('model')->paginate(9);
            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }

        if (!$request->ajax() && $request->isMethod('POST')) {
            $vehicles = VehicleModel::select('*');

            if ($request->has('yearTire') && !empty($request->get('yearTire'))) {
                $vehicles->where('year', $request->yearTire);
                $filter['year'] = $request->yearTire;
            }

            if ($request->has('makeTire') && !empty($request->get('makeTire'))) {
                $vehicles->where('make_id', $request->makeTire);
                $filter['make'] = $request->makeTire;
            }

            if ($request->has('modelTire') && !empty($request->get('modelTire'))) {
                $vehicles->where('id', $request->modelTire);
                $filter['model'] = $request->modelTire;
            }

            $ids = $vehicles->pluck('id')->toArray();
            $axles = VehicleModelAxle::whereIn('vehicle_model_id', $ids);
            $minDiameter = $axles->orderBy('minDiameterIn', 'asc')->first();
            $maxDiameter = $axles->orderBy('maxDiameterIn', 'asc')->first();
            /*$offsetMinMm = $axles->orderBy('offsetMinMm','asc')->first();
            $offsetMaxMm = $axles->orderBy('offsetMaxMm','asc')->first();*/
            $products = Product::where('sku_type', 'TIRE')->groupBy('model')->where('diameter', '>=', $minDiameter->minDiameterIn)
                ->where('diameter', '<=', $maxDiameter->minDiameterIn);
            /*->where('offset','>=', $offsetMinMm->offsetMinMm)
            ->where('offset','<=', $offsetMaxMm->offsetMaxMm);*/
            $response['products'] = $products->paginate(9);

        }

        $response['width'] = array_unique(Product::select('width')->where('sku_type', 'Tire')->pluck('width')->toArray());
        $response['wheelDiameter'] = array_unique(Product::select('wheelDiameter')->where('sku_type', 'Tire')->pluck('wheelDiameter')->toArray());
        $response['diameter'] = array_unique(Product::select('diameter')->where('sku_type', 'Tire')->pluck('diameter')->toArray());
        $response['rimDiameter'] = array_unique(Product::select('rimDiameter')->where('sku_type', 'Tire')->pluck('rimDiameter')->toArray());
        $response['speedRating'] = array_unique(Product::select('speedRating')->where('sku_type', 'Tire')->pluck('speedRating')->toArray());
        $response['brands'] = Brand::whereHas('products', function ($query) {
            $query->where('sku_type', 'Tire');
        })->get();
        $response['filter'] = $filter;
        return view('frontend.pages.tires', compact('response'));
    }

    public function accessories(Request $request)
    {
        $response['type'] = 'ACC';
        $response['products'] = Product::where('sku_type', 'ACC')->paginate(9);
        $filter = array();
        if ($request->ajax()) {

            $products = Product::select('id', 'title')->where('sku_type', 'ACC');
            if ($request->has('brand_id') && !empty($request->get('brand_id'))) {
                $products->where('brand_id', $request->brand_id);
                $filter['brand_id'] = $request->brand_id;
            }

            if ($request->has('search') && !empty($request->get('search'))) {
                $search = $request->get('search');
                $products->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhereHas('brand', function ($qry) use ($search) {
                            $qry->where('description', 'LIKE', "%$search%");
                        });
                });
                $filter['search'] = $search;
            }

            /*if($request->hasAny(['year','model','make']) && (!empty($request->get('year')) || !empty($request->get('model'))  || !empty($request->get('make')))){
                $vehicles = VehicleModel::select('*');

                if($request->has('year') && !empty($request->get('year'))){
                    $vehicles->where('year',$request->year);
                    $filter['year'] = $request->year;
                }

                if($request->has('make') && !empty($request->get('make'))){
                    $vehicles->where('make_id',$request->make);
                    $filter['make'] = $request->make;
                }

                if($request->has('model') && !empty($request->get('model'))){
                    $vehicles->where('id',$request->model);
                    $filter['model'] = $request->model;
                }

                $ids = $vehicles->pluck('id')->toArray();
                $axles = VehicleModelAxle::whereIn('vehicle_model_id',$ids);
                $minDiameter = $axles->orderBy('minDiameterIn','asc')->first();
                $maxDiameter = $axles->orderBy('maxDiameterIn','asc')->first();
                $offsetMinMm = $axles->orderBy('offsetMinMm','asc')->first();
                $offsetMaxMm = $axles->orderBy('offsetMaxMm','asc')->first();
                $products->where('diameter','>=', $minDiameter->minDiameterIn)
                    ->where('diameter','<=', $maxDiameter->minDiameterIn)
                    ->where('offset','>=', $offsetMinMm->offsetMinMm)
                    ->where('offset','<=', $offsetMaxMm->offsetMaxMm);
            }*/


            $response['filter'] = $filter;
            $response['products'] = $products->paginate(9);
            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }

        /*if(!$request->ajax() && $request->isMethod('POST')){

            $vehicles = VehicleModel::select('*');

            if($request->has('year') && !empty($request->get('year'))){
                $vehicles->where('year',$request->year);
                $filter['year'] = $request->year;
            }

            if($request->has('make') && !empty($request->get('make'))){
                $vehicles->where('make_id',$request->make);
                $filter['make'] = $request->make;
            }

            if($request->has('model') && !empty($request->get('model'))){
                $vehicles->where('id',$request->model);
                $filter['model'] = $request->model;
            }

            $ids = $vehicles->pluck('id')->toArray();
            $axles = VehicleModelAxle::whereIn('vehicle_model_id',$ids);
            $minDiameter = $axles->orderBy('minDiameterIn','asc')->first();
            $maxDiameter = $axles->orderBy('maxDiameterIn','asc')->first();
            $offsetMinMm = $axles->orderBy('offsetMinMm','asc')->first();
            $offsetMaxMm = $axles->orderBy('offsetMaxMm','asc')->first();
            $products = Product::groupBy('model')->where('diameter','>=', $minDiameter->minDiameterIn)
                ->where('diameter','<=', $maxDiameter->minDiameterIn)
                ->where('offset','>=', $offsetMinMm->offsetMinMm)
                ->where('offset','<=', $offsetMaxMm->offsetMaxMm);
            $response['products'] = $products->paginate(9);

        }*/

        $response['brands'] = Brand::whereHas('products', function ($query) {
            $query->where('sku_type', 'ACC');
        })->get();
        $response['filter'] = $filter;

        return view('frontend.pages.accessories', compact('response'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        return view('frontend.pages.product', compact('product'));
    }

    public function brand(Request $request)
    {
        if ($request->ajax()) {
            $brands = Brand::paginate(9);
            $response['brands'] = $brands;
            $html = view('frontend.includes.brands')->with($response)->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }


        $brands = Brand::paginate(9);
        $response['brands'] = $brands;
        return view('frontend.pages.brands')->with($response);
    }

    public function brandProducts(Request $request, $id)
    {

        if ($request->ajax()) {
            $products = Product::where('brand_id', $id)->where('boltPattern','!=','BLANK')->groupBy('model');
            $response['products'] = $products->paginate(9);
            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }


        $brand = Brand::findOrFail($id);
        $response['brand'] = $brand;
        $response['products'] = Product::where('brand_id', $id)->groupBy('model')->paginate(9);
        return view('frontend.pages.brand')->with($response);
    }

    public function shop(Request $request)
    {
        $response['type'] = 'SHOP';
        $response['products'] = Product::groupBy('model')->paginate(9);
        $filter = array();
        if ($request->ajax()) {

            $products = Product::groupBy('model');
            if ($request->has('brand_id') && !empty($request->get('brand_id'))) {
                $products->where('brand_id', $request->brand_id);
                $filter['brand_id'] = $request->brand_id;
            }

            if ($request->has('search') && !empty($request->get('search'))) {
                $search = $request->get('search');
                $products->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', "%$search%")
                        ->orWhere('title', 'LIKE', "%$search%")
                        ->orWhereHas('brand', function ($qry) use ($search) {
                            $qry->where('description', 'LIKE', "%$search%");
                        });
                });
                $filter['search'] = $search;
            }

            /*if($request->hasAny(['year','model','make']) && (!empty($request->get('year')) || !empty($request->get('model'))  || !empty($request->get('make')))){
                $vehicles = VehicleModel::select('*');

                if($request->has('year') && !empty($request->get('year'))){
                    $vehicles->where('year',$request->year);
                    $filter['year'] = $request->year;
                }

                if($request->has('make') && !empty($request->get('make'))){
                    $vehicles->where('make_id',$request->make);
                    $filter['make'] = $request->make;
                }

                if($request->has('model') && !empty($request->get('model'))){
                    $vehicles->where('id',$request->model);
                    $filter['model'] = $request->model;
                }

                $ids = $vehicles->pluck('id')->toArray();
                $axles = VehicleModelAxle::whereIn('vehicle_model_id',$ids);
                $minDiameter = $axles->orderBy('minDiameterIn','asc')->first();
                $maxDiameter = $axles->orderBy('maxDiameterIn','asc')->first();
                $offsetMinMm = $axles->orderBy('offsetMinMm','asc')->first();
                $offsetMaxMm = $axles->orderBy('offsetMaxMm','asc')->first();
                $products->where('diameter','>=', $minDiameter->minDiameterIn)
                    ->where('diameter','<=', $maxDiameter->minDiameterIn)
                    ->where('offset','>=', $offsetMinMm->offsetMinMm)
                    ->where('offset','<=', $offsetMaxMm->offsetMaxMm);
            }*/


            $response['filter'] = $filter;
            $response['products'] = $products->paginate(9);
            $html = view('frontend.includes.products', compact('response'))->render();

            return response()->json([
                'status' => true,
                'view' => $html,
            ]);
        }


        $response['brands'] = Brand::orderBy('description', 'asc')->get();
        $response['filter'] = $filter;

        return view('frontend.pages.accessories', compact('response'));
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
        // return view('frontend.pages.gallery');
        return view('frontend.pages.under-construction');
    }

    public function getMakesByYear(Request $request)
    {
        $year = $request->year;
        $makes = Make::whereHas('vehicles', function ($query) use ($year) {
            $query->where('year', $year);
        })->orderBy('name', 'asc')->get();

        return response()->json([
            'status' => true,
            'data' => $makes,
        ]);
    }

    public function getModelsByMakes(Request $request)
    {
        $models = VehicleModel::where('make_id', $request->make)->where('year', $request->year)->orderBy('model', 'asc')->get();

        return response()->json([
            'status' => true,
            'data' => $models,
        ]);
    }
}
