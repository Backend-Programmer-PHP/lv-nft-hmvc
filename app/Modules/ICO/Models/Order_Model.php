<?php

namespace App\Modules\ICO\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Model extends Model
{

    protected $table = "order";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
