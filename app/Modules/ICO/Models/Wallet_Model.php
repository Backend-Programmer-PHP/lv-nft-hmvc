<?php

namespace App\Modules\ICO\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet_Model extends Model
{

    protected $table = "wallet";
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
