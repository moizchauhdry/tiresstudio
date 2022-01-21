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


        $res = $client->request('GET', 'https://api.wheelpros.com/products/v1/search/wheel?pageSize=5&page=3');
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

            if($product['images'] != NULL){
                $directory = 'public/' . $product1->id;
                foreach ($product['images'] as $image) {
                    $content = file_get_contents($image['imageUrl']);
                    $name = $image['fileName'];
                    $path = $directory . '/' . $name;
                    Storage::put($path, $content);
                    $productImage = new ProductImage();
                    $productImage->product_id = $product1->id;
                    $productImage->image_url = $path;
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

        dd('success');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $response['products'] = $products;
        return view('admin.products.index')->with($response);
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
    public function show(Product $product)
    {
        //
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
