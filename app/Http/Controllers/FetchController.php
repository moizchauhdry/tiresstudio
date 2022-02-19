<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Make;
use App\Product;
use App\ProductImage;
use App\ProductInventory;
use App\ProductPrice;
use App\VehicleModel;
use App\VehicleModelAxle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FetchController extends Controller
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

    public function setClient($authorization)
    {
        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);

        return $client;
    }

    public function fetchProducts()
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

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

            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                dump('newKey');
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

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
                    'boltPattern' => $product['properties']['boltPattern'],
                    'finishCode' => $product['properties']['finishCode'],
                    'finish' => $product['properties']['finish'],
                    'width' => $product['properties']['width'],
                    'diameter' => $product['properties']['diameter'],
                    'centerbore' => $product['properties']['centerbore'],
                ];

                $product1 = Product::updateOrCreate(['sku' => $product['sku'],
                    'upc' => $product['upc']], $ProductData);
                $product1->save();

                try {
                    $productDetail = $this->getProductDetails($product['sku']);
                    $product1->update($productDetail['properties']);
                }catch(\Throwable  $e){
                    \Log::info($e);
                }

                if(!empty($product['images'])){
                    $this->uploadImage($product,$product1->id,'products/wheels/'.$product1->id);
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

    }

    public function fetchTireProducts()
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/products/v1/search/tire';

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        $dataCount = (int)$data['totalCount'];

        $iteration = round($dataCount/50,1);


        for($i = 1; $i <= $iteration ; $i++){

            if ($authorization['expiryTime'] < strtotime(Carbon::now())) {
                dump('newKey');
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }

            $res = $client->request('GET', $url.'?pageSize=50&page='.$i);
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
                    'wheelDiameter' => $product['properties']['wheelDiameter'],
                ];

                $product1 = Product::updateOrCreate(['sku' => $product['sku'],
                    'upc' => $product['upc']], $ProductData);
                $product1->save();

                try {
                    $productDetail = $this->getProductDetails($product['sku']);
                    $product1->update($productDetail['properties']);
                }catch(\Throwable  $e){
                    \Log::info($e);
                }

                if(!empty($product['images'])){
                    $this->uploadImage($product,$product1->id,'products/tires/'.$product1->id);
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

    }

    public function uploadImage($product,$id,$directory)
    {
        if(!empty($product['images'])){
            foreach ($product['images'] as $image) {
                try {
                    $content = file_get_contents($image['imageUrl']);
                    $resizedImageUrlContent = file_get_contents($image['resizedImageUrl']);
                    $name = $image['fileName'];
                    $path = $directory . '/' . $name;
                    $resizedName = 'resized_'.$name;
                    $resizedPath = $directory . '/' . $resizedName;
                    Storage::put($path, $content);
                    Storage::put($resizedPath, $resizedImageUrlContent);
                    $productImage = new ProductImage();
                    $productImage->product_id = $id;
                    $productImage->image_url = $path;
                    $productImage->resized_image_url = $resizedPath;
                    $productImage->save();
                }catch(\Throwable $e){
                    Log::info('Error Logged at '.Carbon::now(). ' from images loop');
                    Log::info($e);
                }
            }
        }
    }

    public function getProductDetails($sku)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/products/v1/details/'.$sku;

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getYears()
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/years';

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getMakes($year)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/years/'.$year.'/makes';

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getModels($year,$make)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/years/'.$year.'/makes/'.$make.'/models';

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getModelInfo($year,$make,$model)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/years/'.$year.'/makes/'.$make.'/models/'.$model;

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getSubModels($year,$make,$model)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/'.$year.'/makes/'.$make.'/models/'.$model.'/submodels';

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getSubModelInfo($year,$make,$model,$subModel)
    {
        if (Session::has('authorization')) {
            dump('hasSession');
            $authorization = Session::get('authorization');
            if ($authorization['expiryTime'] <= strtotime(Carbon::now())) {
                $authorization = $this->authorizeAPI();
                $client = $this->setClient($authorization);

            }
        } else {
            dump('noSession');
            $authorization = $this->authorizeAPI();
            $client = $this->setClient($authorization);

        }


        $client = new \GuzzleHttp\Client(['headers' => [
            'Authorization' => $authorization['tokenType'] . ' ' . $authorization['accessToken'],
            'Content-Type' => 'application/json',
        ]]);
        $url = 'https://api.wheelpros.com/vehicles/v1/'.$year.'/makes/'.$make.'/models/'.$model.'/submodels/'.$subModel;

        $res = $client->request('GET', $url);
        $data = json_decode($res->getBody()->getContents(), true);

        return $data;
    }

    public function getVehicles()
    {
        $years = $this->getYears();

        foreach ($years as $year){
            $makes = $this->getMakes($year);
            foreach ($makes as $make){
                $makeData = Make::updateOrCreate(['name' => $make]);
                $models = $this->getModels($year,$make);
                foreach ($models as $model){
                    try {
                        $subModels = $this->getSubModels($year,$make,$model);
                        foreach ($subModels as $subModel){
                            $info = $this->getSubModelInfo($year,$make,$model,$subModel);
                            dump($info);
                        }
                    }catch (\Throwable $error){
                        $infoModel = $this->getModelInfo($year,$make,$model);
                        dump($infoModel);
                        $modelData = VehicleModel::updateOrCreate(
                            [
                            'pro_id' => $infoModel['id'],
                            'model' => $infoModel['model'],
                            ],
                            [
                                'make_id' => $makeData->id,
                                'year' => $infoModel['year'],
                                'staggered' => $infoModel['properties']['staggered'],
                            ]
                        );

                        foreach ($infoModel['axles'] as $key => $axle){
                            $axleData = VehicleModelAxle::updateOrCreate(
                                [
                                    'placement' => $key,
                                    'code' => $axle['code'],
                                    'vehicle_model_id' => $modelData->id,
                                ],
                                [
                                    'vehiclePressureSensor' => $axle['vehiclePressureSensor'],
                                    'boltPatternMm' => $axle['boltPatternMm'],
                                    'oeWidthIn' => $axle['oeWidthIn'],
                                    'maxWidthIn' => $axle['maxWidthIn'],
                                    'oeTireTx' => $axle['oeTireTx'],
                                    'oeHexTx' => $axle['oeHexTx'],
                                    'nutBolt' => $axle['nutBolt'],
                                    'centerBoreMm' => $axle['centerBoreMm'],
                                    'minWheelLoad' => $axle['minWheelLoad'],
                                    'sensorPartNumberOe' => $axle['sensorPartNumberOe'],
                                    'hubCode' => $axle['hubCode'],
                                    'maxBs' => $axle['maxBs'],
                                    'maxFs' => $axle['maxFs'],
                                    'hubClearanceMm' => $axle['hubClearanceMm'],
                                    'yFactor' => $axle['yFactor'],
                                    'yFactor25' => $axle['yFactor25'],
                                    'yFactor50' => $axle['yFactor50'],
                                    'oeDiameterIn' => $axle['diameter']['oeDiameterIn'],
                                    'minDiameterIn' => $axle['diameter']['minDiameterIn'],
                                    'maxDiameterIn' => $axle['diameter']['maxDiameterIn'],
                                    'peakDepth' => $axle['caliper']['peakDepth'],
                                    'depth100mm' => $axle['caliper']['depth100mm'],
                                    'depth106mm' => $axle['caliper']['depth106mm'],
                                    'depth119mm' => $axle['caliper']['depth119mm'],
                                    'depth134mm' => $axle['caliper']['depth134mm'],
                                    'depth160mm' => $axle['caliper']['depth160mm'],
                                    'depth90mm' => $axle['caliper']['depth90mm'],
                                    'oeOffset' => $axle['offset']['oeOffset'],
                                    'offsetMaxMm' => $axle['offset']['offsetMaxMm'],
                                    'offsetMinMm' => $axle['offset']['offsetMinMm'],
                                    'liftOffsetMaxMm' => $axle['offset']['liftOffsetMaxMm'],
                                    'liftOffsetMinMm' => $axle['offset']['liftOffsetMinMm'],
                                    'amLugStyle' => $axle['lug']['amLugStyle'],
                                    'lugNutSizeTx' => $axle['lug']['lugNutSizeTx'],
                                    'lugCnt' => $axle['lug']['lugCnt']
                                ]
                            );
                        }
                    }

                }
            }
        }
    }

}
