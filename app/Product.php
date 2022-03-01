<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $appends = ['product_image','price'];

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
            return $image->image_url;
        }
        return '';
    }

    public function getPriceAttribute()
    {
        $price = $this->prices()->first();
        if($price != null){
            return $price->currency_code.' '.$price->currency_amount;
        }
        return '';
    }
}
