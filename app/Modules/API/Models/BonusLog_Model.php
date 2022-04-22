<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class BonusLog_Model extends Model
{

    protected $table = "bonus_log";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
