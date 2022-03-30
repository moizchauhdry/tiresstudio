<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductImage;
use App\ProductInventory;
use App\ProductPrice;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Validator;
use Auth;

class ProductController extends Controller
{

    public function authorizeAPI()
    {
        $credentials = [
            "userName" => "au.haseeb@gmail.com",
            "password" => "Shiekh!@40"
        ];

        $clientHeader = new \GuzzleHttp\Client(['headers' => [
            'Content-Type' => 'application/json',
        ],
            'body' => json_encode($credentials)]);

        $result = $clientHeader->request('post', 'https://api.wheelpros.com/auth/v1/authorize');
        $resultData = json_decode($result->getBody()->getContents(), true);

        $authorization = $resultData;
        $authorization['expiryTime'] = strtotime(Carbon::now()) + $authorization['expiresIn'];
        Session::put('authorization', $authorization);

        return $authorization;
    }

    public function fetchProducts()
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] > strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);


        $res = $client->request('GET', 'https://api.wheelpros.com/products/v1/search/wheel');
        $data = json_decode($res->getBody()->getContents(), true);

        $dataCount = (int)$data['totalCount'];

        $iteration = round($dataCount/50,1);


        for($i = 1; $i <= $iteration ; $i++){

            if ($authorization['expiryTime'] > strtotime(Carbon::now())) {
                dump('newKey');
                $authorization = $this->authorizeAPI();
            }

            $res = $client->request('GET', 'https://api.wheelpros.com/products/v1/search/wheel?pageSize=50&page='.$i);
            $data = json_decode($res->getBody()->getContents(), true);
            $products = $data['results'];
            foreach ($products as $key => $product) {

                $brandData = [
                    'code' => $product['brand']['code'],
                    'description' => $product['brand']['description'],
                    'parent' => $product['brand']['parent'],
                ];

                $brand = Brand::firstOrCreate($brandData);

                $ProductData = [
                    'sku_type' => $product['skuType'],
                    'title' => $product['title'],
                    'brand_id' => $brand->id,
                    // Properties
                    'model' => $product['properties']['model'],
                    'offset' => $product['properties']['offset'],
                    'bolt_pattern' => $product['properties']['boltPattern'],
                    'finish_code' => $product['properties']['finishCode'],
                    'finish' => $product['properties']['finish'],
                    'width' => $product['properties']['width'],
                    'diameter' => $product['properties']['diameter'],
                    'centerbore' => $product['properties']['centerbore'],
                ];

                $product1 = Product::updateOrCreate(['sku' => $product['sku'],
                    'upc' => $product['sku']], $ProductData);
                $product1->save();

                if(!empty($product['images'])){
                    $directory = 'public/' . $product1->id;
                    foreach ($product['images'] as $image) {
                        $content = file_get_contents($image['imageUrl']);
                        $resizedImageUrlContent = file_get_contents($image['resizedImageUrl']);
                        $name = $image['fileName'];
                        $path = $directory . '/' . $name;
                        $resizedName = 'resized_'.$name;
                        $resizedPath = $directory . '/' . $resizedName;
                        Storage::put($path, $content);
                        Storage::put($resizedPath, $resizedImageUrlContent);
                        $productImage = new ProductImage();
                        $productImage->product_id = $product1->id;
                        $productImage->image_url = $path;
                        $productImage->resized_image_url = $resizedPath;
                        $productImage->save();
                    }
                }

                if ($product['prices']['msrp'] != NULL) {
                    foreach ($product['prices']['msrp'] as $productPrice) {
                        $priceData = [
                            'product_id' => $product1->id,
                            'currency_amount' => $productPrice['currencyAmount'],
                            'currency_code' => $productPrice['currencyCode'],
                        ];

                        $price = ProductPrice::firstOrCreate($priceData);

                    }
                }

                if ($product['inventory'] != NULL) {
                    $inventoryData = [
                        'product_id' => $product1->id,
                        'type' => $product['inventory']['type'],
                        'local_stock' => $product['inventory']['localStock'],
                        'global_stock' => $product['inventory']['globalStock'],
                    ];
                    $inventory = ProductInventory::firstOrCreate($inventoryData);
                }

            }
            dump('Iteration = '. ($i) . ' executed.');
        }

        dd('success');
    }

    public function fetchTireProducts()
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] > strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);


        $res = $client->request('GET', 'https://api.wheelpros.com/products/v1/search/tire');
        $data = json_decode($res->getBody()->getContents(), true);

        $dataCount = (int)$data['totalCount'];

        $iteration = round($dataCount/50,1);


        for($i = 1; $i <= $iteration ; $i++){

            if ($authorization['expiryTime'] > strtotime(Carbon::now())) {
                dump('newKey');
                $authorization = $this->authorizeAPI();
            }

            $res = $client->request('GET', 'https://api.wheelpros.com/products/v1/search/tire?pageSize=50&page='.$i);
            $data = json_decode($res->getBody()->getContents(), true);
            $products = $data['results'];
            foreach ($products as $key => $product) {

                $brandData = [
                    'code' => $product['brand']['code'],
                    'description' => $product['brand']['description'],
                    'parent' => $product['brand']['parent'],
                ];

                $brand = Brand::firstOrCreate($brandData);

                $ProductData = [
                    'sku_type' => $product['skuType'],
                    'title' => $product['title'],
                    'brand_id' => $brand->id,
                    // Properties
                    'model' => $product['properties']['model'],
                    'width' => $product['properties']['width'],
                    'diameter' => $product['properties']['diameter'],
                    'wheel_diameter' => $product['properties']['wheelDiameter'],
                ];

                $product1 = Product::updateOrCreate(['sku' => $product['sku'],
                    'upc' => $product['sku']], $ProductData);
                $product1->save();

                /*if(!empty($product['images'])){
                    $directory = 'public/' . $product1->id;
                    foreach ($product['images'] as $image) {
                        $content = file_get_contents($image['imageUrl']);
                        $resizedImageUrlContent = file_get_contents($image['resizedImageUrl']);
                        $name = $image['fileName'];
                        $path = $directory . '/' . $name;
                        $resizedName = 'resized_'.$name;
                        $resizedPath = $directory . '/' . $resizedName;
                        Storage::put($path, $content);
                        Storage::put($resizedPath, $resizedImageUrlContent);
                        $productImage = new ProductImage();
                        $productImage->product_id = $product1->id;
                        $productImage->image_url = $path;
                        $productImage->resized_image_url = $resizedPath;
                        $productImage->save();
                    }
                }*/

                if ($product['prices']['msrp'] != NULL) {
                    foreach ($product['prices']['msrp'] as $productPrice) {
                        $priceData = [
                            'product_id' => $product1->id,
                            'currency_amount' => $productPrice['currencyAmount'],
                            'currency_code' => $productPrice['currencyCode'],
                        ];

                        $price = ProductPrice::firstOrCreate($priceData);

                    }
                }

                if ($product['inventory'] != NULL) {
                    $inventoryData = [
                        'product_id' => $product1->id,
                        'type' => $product['inventory']['type'],
                        'local_stock' => $product['inventory']['localStock'],
                        'global_stock' => $product['inventory']['globalStock'],
                    ];
                    $inventory = ProductInventory::firstOrCreate($inventoryData);
                }

            }
            dump('Iteration = '. ($i) . ' executed.');
        }

        dd('success');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::all();
        if ($request->ajax()) {
            $data = Product::select('id','sku','upc','sku_type','title','created_at');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(Product $data){
                    $btn1 = '<a class="btn btn-primary btn-sm mr-2 mb-1" href="'.route('products.show', $data->id).'">View Detail</a>';
                    $btn1 .= '<a class="btn btn-warning btn-sm mb-1" href="'.route('products.edit', $data->id).'">Edit</a>';
                    return $btn1;
                })
                ->filter(function ($instance) use ($request) {

                    if ($request->get('sku_type')) {
                        $instance->where('sku_type', $request->get('sku_type'));
                    }

                    if ($request->get('brand_id')) {
                        $instance->where('brand_id', $request->get('brand_id'));
                    }


                    if (!empty($request->get('search'))) {
                        $instance->where(function($query) use($request){
                            $search = $request->get('search');
                            $query->orWhere('id', 'LIKE', "%$search%")
                                ->orWhere('sku', 'LIKE', "%$search%")
                                ->orWhere('upc', 'LIKE', "%$search%")
                                ->orWhere('sku_type', 'LIKE', "%$search%")
                                ->orWhere('title', 'LIKE', "%$search%")
                                ->orWhere('model', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.products.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $response['type'] = null;

        if($request->has('type')){
            $response['type'] = $request->type;
        }

        $response['brand'] = Brand::all();

        return view('admin.products.create')->with($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'sku_type' => 'required',
            'title' => 'required',
            'brand_id' => 'required',
            'images.*' => 'nullable|mimes:jpeg,jpg,png',
        ];

        $validator = Validator::make($request->all(), $rules , $message = [
            'images.*.mimes' => 'Images must be a file of type: jpeg, jpg, png.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $product = new Product();
        $product->sku = $request->sku ?? null;
        $product->upc = $request->upc ?? null;
        $product->sku_type = $request->sku_type ?? null;
        $product->title = $request->title ?? null;
        $product->brand_id = $request->brand_id ?? null;
        $product->model = $request->model ?? null;
        $product->offset = $request->offset ?? null;
        $product->boltPattern = $request->boltPattern ?? null;
        $product->finishCode = $request->finishCode ?? null;
        $product->finish = $request->finish ?? null;
        $product->width = $request->width ?? null;
        $product->diameter = $request->diameter ?? null;
        $product->centerbore = $request->centerbore ?? null;
        $product->wheelDiameter = $request->wheelDiameter ?? null;
        $product->tireSize = $request->tireSize ?? null;
        $product->terrain = $request->terrain ?? null;
        $product->utqg = $request->utqg ?? null;
        $product->mileageWarranty = $request->mileageWarranty ?? null;
        $product->series = $request->series ?? null;
        $product->sectionWidth = $request->sectionWidth ?? null;
        $product->weight = $request->weight ?? null;
        $product->speedRating = $request->speedRating ?? null;
        $product->rimDiameter = $request->rimDiameter ?? null;
        $product->minWidthIn = $request->minWidthIn ?? null;
        $product->maxWidthIn = $request->maxWidthIn ?? null;
        $product->loadIndex = $request->loadIndex ?? null;
        $product->treadDepth = $request->treadDepth ?? null;
        $product->load_pounds = $request->load_pounds ?? null;
        $product->overall_diameter = $request->overall_diameter ?? null;
        $product->productDesc = $request->productDesc ?? null;
        $product->imageCode = $request->imageCode ?? null;
        $product->backspacing = $request->backspacing ?? null;
        $product->wheelWeight = $request->wheelWeight ?? null;
        $product->capPartNo = $request->capPartNo ?? null;
        $product->rivetPartNo = $request->rivetPartNo ?? null;
        $product->tpmsCompatible = $request->tpmsCompatible ?? null;
        $product->lipDepth = $request->lipDepth ?? null;
        $product->certification = $request->certification ?? null;
        $product->structuralWarranty = $request->structuralWarranty ?? null;
        $product->finishWarranty = $request->finishWarranty ?? null;
        $product->openEndCap = $request->openEndCap ?? null;
        $product->capScrewNo = $request->capScrewNo ?? null;
        $product->otherAccessories = $request->otherAccessories ?? null;
        $product->additionalAccessories = $request->additionalAccessories ?? null;
        $product->catalogPage = $request->catalogPage ?? null;
        $product->loadRating = $request->loadRating ?? null;
        $product->sizeDesc = $request->sizeDesc ?? null;
        $product->submitted_by = Auth::guard('admin')->user()->id;
        $product->save();

        $product->sku = 'TS'.sprintf("%05d", $product->id);
        $product->save();

        $price = ProductPrice::create([
            'product_id' => $product->id,
            'currency_amount' => $request->currency_amount,
            'currency_code' => getCurrencyCode(),
        ]);

        foreach ($request->file('images') as $image){
            $imageDirectory = 'customProducts';
            if ($image) {

                $fileName = $image->getClientOriginalName();

                if(!Storage::disk('public')->exists($imageDirectory)){
                    Storage::disk('public')->makeDirectory($imageDirectory);
                }
                $imageUrl = Storage::disk('public')->putFile($imageDirectory, new File($image));
                ProductImage::create([
                    'product_id' => $product->id,
                    'filename' => $fileName,
                    'image_url' => $imageUrl,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success','Product Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,$id)
    {
        $response['product'] = Product::find($id);

        return view('admin.products.detail')->with($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $response['product'] = Product::find($id);
        $response['brand'] = Brand::all();

        return view('admin.products.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product,$id)
    {

        $product = Product::find($id);

        if($product == null){
            return redirect()->back()->with('error','product not found');
        }

        $rules = [
            'sku_type' => 'required',
            'title' => 'required',
            'brand_id' => 'required',
            'images.*' => 'nullable|mimes:jpeg,jpg,png',
        ];

        $validator = Validator::make($request->all(), $rules , $message = [
            'images.*.mimes' => 'Images must be a file of type: jpeg, jpg, png.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }



        if($product->submitted_by != null){
            $product->sku = $request->sku ?? null;
            $product->upc = $request->upc ?? null;
            $product->sku_type = $request->sku_type ?? null;
            $product->title = $request->title ?? null;
            $product->brand_id = $request->brand_id ?? null;
            $product->model = $request->model ?? null;
            $product->offset = $request->offset ?? null;
            $product->boltPattern = $request->boltPattern ?? null;
            $product->finishCode = $request->finishCode ?? null;
            $product->finish = $request->finish ?? null;
            $product->width = $request->width ?? null;
            $product->diameter = $request->diameter ?? null;
            $product->centerbore = $request->centerbore ?? null;
            $product->wheelDiameter = $request->wheelDiameter ?? null;
            $product->tireSize = $request->tireSize ?? null;
            $product->terrain = $request->terrain ?? null;
            $product->utqg = $request->utqg ?? null;
            $product->mileageWarranty = $request->mileageWarranty ?? null;
            $product->series = $request->series ?? null;
            $product->sectionWidth = $request->sectionWidth ?? null;
            $product->weight = $request->weight ?? null;
            $product->speedRating = $request->speedRating ?? null;
            $product->rimDiameter = $request->rimDiameter ?? null;
            $product->minWidthIn = $request->minWidthIn ?? null;
            $product->maxWidthIn = $request->maxWidthIn ?? null;
            $product->loadIndex = $request->loadIndex ?? null;
            $product->treadDepth = $request->treadDepth ?? null;
            $product->load_pounds = $request->load_pounds ?? null;
            $product->overall_diameter = $request->overall_diameter ?? null;
            $product->productDesc = $request->productDesc ?? null;
            $product->imageCode = $request->imageCode ?? null;
            $product->backspacing = $request->backspacing ?? null;
            $product->wheelWeight = $request->wheelWeight ?? null;
            $product->capPartNo = $request->capPartNo ?? null;
            $product->rivetPartNo = $request->rivetPartNo ?? null;
            $product->tpmsCompatible = $request->tpmsCompatible ?? null;
            $product->lipDepth = $request->lipDepth ?? null;
            $product->certification = $request->certification ?? null;
            $product->structuralWarranty = $request->structuralWarranty ?? null;
            $product->finishWarranty = $request->finishWarranty ?? null;
            $product->openEndCap = $request->openEndCap ?? null;
            $product->capScrewNo = $request->capScrewNo ?? null;
            $product->otherAccessories = $request->otherAccessories ?? null;
            $product->additionalAccessories = $request->additionalAccessories ?? null;
            $product->catalogPage = $request->catalogPage ?? null;
            $product->loadRating = $request->loadRating ?? null;
            $product->sizeDesc = $request->sizeDesc ?? null;
            $product->submitted_by = Auth::guard('admin')->user()->id;
            $product->save();

            $product->sku = 'TS'.sprintf("%05d", $product->id);
            $product->save();
        }

        $price = ProductPrice::updateOrCreate([
            'product_id' => $product->id,
            'currency_code' => getCurrencyCode(),
        ],['currency_amount' => $request->currency_amount,]);

        if($request->has('images')){
            foreach ($request->file('images') as $image){
                $imageDirectory = 'customProducts';
                if ($image) {

                    $fileName = $image->getClientOriginalName();

                    if(!Storage::disk('public')->exists($imageDirectory)){
                        Storage::disk('public')->makeDirectory($imageDirectory);
                    }
                    $imageUrl = Storage::disk('public')->putFile($imageDirectory, new File($image));
                    ProductImage::create([
                        'product_id' => $product->id,
                        'filename' => $fileName,
                        'image_url' => $imageUrl,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function destroyImage(Request $request)
    {
        $id =  $request->id;
        $image = ProductImage::find($id);
        if($image != null){
            $image->delete();
            return response()->json(['status' => 1,'message' => 'Product image deleted successfully']);
        }else{
            return response()->json(['status' => 0,'message' => 'Product image error']);
        }
    }
}
