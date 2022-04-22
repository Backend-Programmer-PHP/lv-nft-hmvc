<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class Users_Model extends Model
{

    protected $table = "users";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
