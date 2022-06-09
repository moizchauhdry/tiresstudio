<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function creater()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function updater()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return (new Carbon($value))->format('d-m-Y');
    }
}
