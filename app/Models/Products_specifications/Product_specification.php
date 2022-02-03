<?php

namespace App\Models\Products_specifications;

use Illuminate\Database\Eloquent\Model;

class Product_specification extends Model
{
    //
    public function products()
    {
        return $this->belongsTo('App\Models\Products\Product','product_id');
    }
}
