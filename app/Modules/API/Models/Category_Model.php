<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Model extends Model
{

    protected $table = "categories";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
