<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class News_Model extends Model
{

    protected $table = "news";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
