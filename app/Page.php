<?php

namespace App;

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
}
