<?php

namespace App\Modules\ICO\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionsBNB_Model extends Model
{

    protected $table = "transactions_bnb";
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