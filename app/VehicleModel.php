<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    //
    protected $guarded = [];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function axles()
    {
        return $this->hasMany(VehicleModelAxle::class);
    }
}
