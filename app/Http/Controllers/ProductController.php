<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductImage;
use App\ProductInventory;
use App\ProductPrice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

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
        if ($request->ajax()) {
            $data = Product::select('id','sku','upc','sku_type','title');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function(Product $data){
                    $btn1 = '<a class="btn btn-primary btn-sm" href="'.route('products.show', $data->id).'">View Detail</a>';
                    return $btn1;
                })
                ->filter(function ($instance) use ($request) {

                    if ($request->get('sku_type')) {
                        $instance->where('sku_type', $request->get('sku_type'));
                    }


                    if (!empty($request->get('search'))) {
                        $instance->where(function($query) use($request){
                            $search = $request->get('search');
                            $query->orWhere('id', 'LIKE', "%$search%")
                                ->orWhere('sku', 'LIKE', "%$search%")
                                ->orWhere('upc', 'LIKE', "%$search%")
                                ->orWhere('sku_type', 'LIKE', "%$search%")
                                ->orWhere('title', 'LIKE', "%$search%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
}
