<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Nft_Model extends Model
{

    protected $table = "nft";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
