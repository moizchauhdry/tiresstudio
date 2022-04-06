<?php

namespace App\Imports;

use App\Brand;
use App\Product;
use App\ProductImage;
use App\ProductInventory;
use App\ProductPrice;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ProductImport implements ToModel,WithHeadingRow,WithChunkReading,ShouldQueue
{
    use RemembersChunkOffset;
    protected $type,$requestType;

    function __construct($type,$requestType) {
        $this->type = $type;
        $this->requestType = $requestType;
    }
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        \Log::channel('queue')->info($this->requestType);
        \Log::channel('queue')->info($row);
        if($this->requestType == 0){
            if($this->type == "TIRE"){
                $directory = 'products/tires/';
                $product = Product::where('sku',$row['partnumber'])->first();
                if($product != null && $row['imageurl'] != null){
                    try {
                        $content = file_get_contents($row['imageurl']);
                        $name = $row['partnumber'].'_'.basename($row['imageurl']);
                        $path = $directory . '/'.$name ;
                        Storage::disk('public')->put($path, $content);
                        ProductImage::updateOrCreate(
                            [
                                'product_id' => $product->id,
                                'filename' => $name,
                            ],
                            [
                                'image_url' => $path,
                                'resized_image_url' => $path,
                            ]
                        );
                    }catch(\Throwable $e){
                        \Log::info('failed at part no. '.$row['partnumber']);
                        \Log::info($e);
                    }
                }
            }
            if($this->type == "ACC"){
                $directory = 'products/accessories/';
                if(!Storage::disk('public')->exists($directory)){
                    Storage::disk('public')->makeDirectory($directory);
                }
                $product = Product::where('sku',$row['partnumber'])->first();
                if($product != null && $row['imageurl'] != null){
                    try {
                        $content = file_get_contents($row['imageurl']);
                        $name = $row['partnumber'].'_'.basename($row['imageurl']);
                        $path = $directory . '/'.$name ;
                        Storage::disk('public')->put($path, $content);
                        ProductImage::updateOrCreate(
                            [
                                'product_id' => $product->id,
                                'filename' => $name,
                            ],
                            [
                                'image_url' => $path,
                                'resized_image_url' => $path,
                            ]
                        );
                    }catch(\Throwable $e){
                        \Log::info('failed at part no. '.$row['partnumber']);
                        \Log::info($e);
                    }
                }
            }
        }elseif($this->requestType == 1){

            if($this->type == "TIRE"){
                $brand = Brand::updateOrCreate(
                    ['code' => $row['tire_manufacturer'],'type' => $this->type],
                    [
                        'description' => $row['tire_manufacturer'],
                        'parent' => $row['tire_manufacturer'],
                    ]
                );

                $directory = 'products/tires/'.$brand->code;

                if(!Storage::disk('public')->exists($directory)){
                    Storage::disk('public')->makeDirectory($directory);
                }

                $check = [
                    'sku' => $row['sku'],
                ];

                $wheel = explode('-',$row["tire_size"]);

                $data = [
                    "upc" => $row["upc"] ?? null,
                    "sku_type" => "TIRE",
                    "title" => $row["tire_description"] ?? null,
                    "brand_id" => $brand->id,
                    "model" => $row["display_model_no"] ?? null,
                    "offset" => null,
                    "boltPattern" => null,
                    "finishCode" => null,
                    "finish" => null,
                    "width" => $row["section_width"] ?? null,
                    "diameter" => $row["tire_diameter_actual"] ?? null,
                    "centerbore" => null,
                    "wheelDiameter" => $wheel[1] ?? null,
                    "tireSize" => $row["tire_size"] ?? null,
                    "terrain" => $row["terrain"] ?? null,
                    "utqg" => $row["utqg"] ?? null,
                    "mileageWarranty" => null,
                    "series" => $row["series"] ?? null,
                    "sectionWidth" => $row["section_width"] ?? null,
                    "weight" => $row["weight"] ?? null,
                    "speedRating" => $row["speed_rating"] ?? null,
                    "rimDiameter" => $row["rim_diameter"] ?? null,
                    "minWidthIn" => $row["min_width_in"] ?? null,
                    "maxWidthIn" => $row["max_width_in"] ?? null,
                    "loadIndex" => $row["load_index"] ?? null,
                    "treadDepth" => $row['tread_depth'] ?? null,
                    "load_pounds" => $row['max_load'] ?? null,
                    "overall_diameter" => $row["tire_diameter_actual"] ?? null,
                    "productDesc" => $row["tire_description"] ?? null,
                    "imageCode" => null,
                    "backspacing" => null,
                    "wheelWeight" => null,
                    "capPartNo" => null,
                    "rivetPartNo" => null,
                    "tpmsCompatible" => null,
                    "lipDepth" => null,
                    "certification" => null,
                    "structuralWarranty" => null,
                    "finishWarranty" => null,
                    "openEndCap" => null,
                    "capScrewNo" => null,
                    "otherAccessories" => null,
                    "additionalAccessories" => null,
                    "catalogPage" => null,
                    "loadRating" => null,
                    "sizeDesc" => $row["tire_size"],
                    ];
                $product = Product::updateOrCreate($check,$data);
                $priceData = [
                    'product_id' => $product->id,
                    'currency_amount' => $row['msrp'],
                    'currency_code' => 'USD',
                ];
                $price = ProductPrice::firstOrCreate($priceData);

                if($row['image_url'] != null){
                        try {
                            $name = basename($row['image_url']);
                            $name = str_replace('?product_type=Wheels&size=500','',$name);
                            $productImage = ProductImage::where('product_id',$product->id)->where('filename',$name)->first();
                            if($productImage != null){
                                \Log::channel('queue')->info('Already Have Image');
                            }else{
                                $content = file_get_contents($row['image_url']);
                                $path = $directory . '/' . $name;
                                Storage::disk('public')->put($path, $content);
                                $productImage = new ProductImage();
                                $productImage->product_id = $product->id;
                                $productImage->filename = $name;
                                $productImage->image_url = $path;
                                $productImage->save();
                                \Log::channel('queue')->info('$productImage NEW');
                            }
                        }catch (\Throwable $e){
                            \Log::info('image error at sku = '.$row['sku'] . ' at dateTime = '. Carbon::now());
                            \Log::error($e);
                        }
                    }
                return $product;
            }elseif($this->type == "WHEEL"){
                try {
                    $brand = Brand::updateOrCreate(
                        ['code' => $row['brand_cd'],'type' => $this->type],
                        [
                            'description' => $row['brand_desc'],
                            'parent' => $row['brand_desc'],
                        ]
                    );

                    $directory = 'products/wheels/'.$brand->code;

                    if(!Storage::disk('public')->exists($directory)){
                        Storage::disk('public')->makeDirectory($directory);
                    }

                    $check = [
                        'sku' => $row['sku'],
                    ];


                    $data = [
                        'upc' => $row['upc'] ?? '',
                        'sku_type' => 'WHEEL',
                        'title' => $row['product_desc'],
                        'brand_id' => $brand->id,
                        'model' => $row['style'],
                        'offset' => $row['offset'],
                        'boltPattern' => $row['bolt_pattern_metric'],
                        'finishCode' => $row['fancy_finish_desc'],
                        'finish' => $row['fancy_finish_desc'] ?? null,
                        'width' => $row['width'] ?? null,
                        'diameter' => $row['diameter'] ?? null,
                        'centerbore' => $row['centerbore'] ?? null,
                        'backspacing' => $row['backspacing'] ?? null,
                        'wheelWeight' => $row['wheel_weight'] ?? null,
                        'capPartNo' => $row['cap_part_no'] ?? null,
                        'rivetPartNo' => $row['rivet_part_no'] ?? null,
                        'tpmsCompatible' => $row['tpms_compatible'] ?? null,
                        'lipDepth' => $row['lip_depth'] ?? null,
                        'certification' => $row['certification'] ?? null,
                        'structuralWarranty' => $row['structural_warranty'] ?? null,
                        'finishWarranty' => $row['finish_warranty'] ?? null,
                        'openEndCap' => $row['open_end_cap'] ?? null,
                        'capScrewNo' => null,
                        'otherAccessories' => $row['other_accessories'] ?? null,
                        'loadRating' => $row['load_rating_standard'] ?? null,
                        'sizeDesc' => $row['size_desc'],
                    ];


                    $product = Product::updateOrCreate(['sku' => $row['sku']],$data);
                    $priceData = [
                        'product_id' => $product->id,
                        'currency_amount' => $row['msrp'],
                        'currency_code' => 'USD',
                    ];
                    $price = ProductPrice::firstOrCreate($priceData);

                    if($row['image_url'] != null){
                        try {
                            $name = basename($row['image_url']);
                            $name = str_replace('?product_type=Wheels&size=500','',$name);
                            $productImage = ProductImage::where('product_id',$product->id)->where('filename',$name)->first();
                            if($productImage != null){
                                \Log::channel('queue')->info('Already Have Image');
                            }else{
                                $content = file_get_contents($row['image_url']);
                                $path = $directory . '/' . $name;
                                Storage::disk('public')->put($path, $content);
                                $productImage = new ProductImage();
                                $productImage->product_id = $product->id;
                                $productImage->filename = $name;
                                $productImage->image_url = $path;
                                $productImage->save();
                                \Log::channel('queue')->info('$productImage NEW');
                            }
                        }catch (\Throwable $e){
                            \Log::info('image error at sku = '.$row['sku'] . ' at dateTime = '. Carbon::now());
                            \Log::error($e);
                        }
                    }

                    for($i = 1;$i < 5;$i++){
                        if($row['image_url'.$i] != null){
                            try {
                                $name = basename($row['image_url'.$i]);
                                $name = str_replace('?product_type=Wheels&size=500','',$name);
                                $productImage = ProductImage::where('product_id',$product->id)->where('filename',$name)->first();
                                if($productImage != null){
                                    \Log::channel('queue')->info("Multiple Image Already");
                                }else{
                                    $content = file_get_contents($row['image_url'.$i]);
                                    $path = $directory . '/' . $name;
                                    Storage::disk('public')->put($path, $content);
                                    $productImage = new ProductImage();
                                    $productImage->product_id = $product->id;
                                    $productImage->filename = $name;
                                    $productImage->image_url = $path;
                                    $productImage->save();
                                    \Log::channel('queue')->info("Multiple Image NEW");
                                }
                            }catch (\Throwable $e){
                                \Log::info('image error at sku = '.$row['sku'] . ' at dateTime = '. Carbon::now());
                                \Log::error($e);
                            }
                        }
                    }

                    return $product;
                }catch (\Throwable $e){
                    \Log::error($e);
                    \Log::info($row);
                }
            }elseif($this->type == "ACC"){
                $brand = Brand::updateOrCreate(
                    ['code' => $row['brand_cd'],'type' => $this->type],
                    [
                        'description' => $row['brand_desc'],
                        'parent' => $row['brand_desc'],
                    ]
                );

                $directory = 'products/accessories/'.$brand->code;

                if(!Storage::disk('public')->exists($directory)){
                    Storage::disk('public')->makeDirectory($directory);
                }

                $check = [
                    'sku' => $row['sku'],
                ];

                $data = [
                    "upc" => $row["upc"] ?? null,
                    "sku_type" => "ACC",
                    "title" => $row["product_desc"] ?? null,
                    "brand_id" => $brand->id,
                    "model" => $row["product_desc"] ?? null,
                    "productDesc" => $row["product_desc"] ?? null,
                ];
                $product = Product::updateOrCreate($check,$data);
                $priceData = [
                    'product_id' => $product->id,
                    'currency_amount' => $row['msrp'],
                    'currency_code' => 'USD',
                ];
                $price = ProductPrice::firstOrCreate($priceData);

                if($row['image_url'] != null){
                    try {
                        $name = basename($row['image_url']);
                        $name = str_replace('?product_type=Wheels&size=500','',$name);
                        $productImage = ProductImage::where('product_id',$product->id)->where('filename',$name)->first();
                        if($productImage != null){
                            \Log::channel('queue')->info('Already Have Image');
                        }else{
                            $content = file_get_contents($row['image_url']);
                            $path = $directory . '/' . $name;
                            Storage::disk('public')->put($path, $content);
                            $productImage = new ProductImage();
                            $productImage->product_id = $product->id;
                            $productImage->filename = $name;
                            $productImage->image_url = $path;
                            $productImage->save();
                            \Log::channel('queue')->info('$productImage NEW');
                        }
                    }catch (\Throwable $e){
                        \Log::info('image error at sku = '.$row['sku'] . ' at dateTime = '. Carbon::now());
                        \Log::error($e);
                    }
                }
                return $product;
        }


        }elseif ($this->requestType == 2){

            $product = Product::where('sku',$row['partnumber'])->first();
            if($product == null){
                \Log::channel('queue')->info('no product found with sku '.$row['partnumber']);
                return;
            }
            $inventoryData = [
                'local_stock' => $row['totalqoh'],
                'global_stock' => 0,
            ];
            $inventory = ProductInventory::updateOrCreate(['product_id' => $product->id,'type' => $row['invordertype']],$inventoryData);
            \Log::channel('queue')->info('inventory ID = '.$inventory->id);
        }
    }

    /* public function batchSize(): int
     {
         return 1000;
     }*/

    public function chunkSize(): int
    {
        return 50;
    }
}
