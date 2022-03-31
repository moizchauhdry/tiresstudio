<?php

namespace App\Imports;

use App\Brand;
use App\Product;
use App\ProductImage;
use App\ProductPrice;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ProductImport implements ToModel,WithHeadingRow,WithChunkReading
{
    use RemembersChunkOffset;
    protected $type,$total;

    function __construct($type,$total) {
        $this->type = $type;
        $this->total = $total;
    }
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        if($this->total == 0){
            if($this->type == "TYRE"){
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
        }else{

            try {
                $brand = Brand::updateOrCreate(
                    ['code' => $row['brand_cd']],
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
                            dump('Already Have Image');
                        }else{
                            $content = file_get_contents($row['image_url']);
                            $path = $directory . '/' . $name;
                            Storage::disk('public')->put($path, $content);
                            $productImage = new ProductImage();
                            $productImage->product_id = $product->id;
                            $productImage->filename = $name;
                            $productImage->image_url = $path;
                            $productImage->save();
                            dump('$productImage NEW');
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
                                dump("Multiple Image Already");
                            }else{
                                $content = file_get_contents($row['image_url'.$i]);
                                $path = $directory . '/' . $name;
                                Storage::disk('public')->put($path, $content);
                                $productImage = new ProductImage();
                                $productImage->product_id = $product->id;
                                $productImage->filename = $name;
                                $productImage->image_url = $path;
                                $productImage->save();
                                dump("Multiple Image NEW");
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
        }
        return $product;
    }

    /* public function batchSize(): int
     {
         return 1000;
     }*/

    public function chunkSize(): int
    {
        return 1000;
    }
}
