<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Orders_Model extends Model
{

    protected $table = "orders";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
