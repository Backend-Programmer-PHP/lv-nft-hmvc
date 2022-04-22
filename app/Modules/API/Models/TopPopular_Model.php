<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class TopPopular_Model extends Model
{

    protected $table = "top_popular";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
