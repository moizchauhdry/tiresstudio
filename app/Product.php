<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Product extends Model
{
    protected $guarded = [];
    protected $appends = ['product_image','price','detail_route'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function inventory()
    {
        return $this->hasOne(ProductInventory::class);
    }

    public function getProductImageAttribute()
    {
        $image = $this->images()->first();
        if($image != null){
            if($image->resized_image_url){
                return $image->image_url;
            }else{
                return $image->image_url;
            }
        }
        return '';
    }

    public function getPriceAttribute()
    {
        $price = $this->prices()->first();
        if($price != null){
            // return $price->currency_code.' '.$price->currency_amount;
            return $price->currency_amount;
        }
        return '';
    }

    public function getDetailRouteAttribute()
    {
        return URL::route('frontend.pages.product',$this->id);
    }
}
