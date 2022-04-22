<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Language_Model extends Model
{

    protected $table = "language";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
