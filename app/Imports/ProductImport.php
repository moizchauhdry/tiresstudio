<?php

namespace App\Imports;

use App\Product;
use App\ProductImage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{

    protected $type;

    function __construct($type) {
        $this->type = $type;
    }
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
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
        return $product;
    }
}
