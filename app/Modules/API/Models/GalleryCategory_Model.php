<?php

namespace App\Modules\API\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory_Model extends Model
{

    protected $table = "gallery_category";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
