<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery_Model extends Model
{

    protected $table = "gallery";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
