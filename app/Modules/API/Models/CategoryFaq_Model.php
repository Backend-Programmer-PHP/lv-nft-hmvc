<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFaq_Model extends Model
{

    protected $table = "category_faq";
    protected $guarded = [];

//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
