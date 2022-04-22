<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Tips_Model extends Model
{

    protected $table = "tips";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
