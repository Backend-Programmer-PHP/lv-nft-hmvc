<?php

namespace App\Modules\ICO\Models;

use Illuminate\Database\Eloquent\Model;

class Users_Model extends Model
{

    protected $table = "users";
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
