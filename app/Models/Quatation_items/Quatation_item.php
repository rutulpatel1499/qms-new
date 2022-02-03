<?php

namespace App\Models\Quatation_items;

use Illuminate\Database\Eloquent\Model;

class Quatation_item extends Model
{
    //
    public function quatations()
    {
       return $this->belongsTo('App\Models\Quatations\Quatation','quatation_id');
    }
    public function products()
    {
       return $this->belongsTo('App\Models\Products\Product','product_id');
    }
}
