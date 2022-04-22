<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Bonus_Model extends Model
{

    protected $table = "bonus";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
