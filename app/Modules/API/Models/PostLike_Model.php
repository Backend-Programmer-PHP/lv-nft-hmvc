<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike_Model extends Model
{

    protected $table = "post_like";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
