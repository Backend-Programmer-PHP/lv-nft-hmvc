<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Welcome_Model extends Model
{

    protected $table = "welcome";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
