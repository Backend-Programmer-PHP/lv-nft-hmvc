<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Post_Model extends Model
{

    protected $table = "post";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
