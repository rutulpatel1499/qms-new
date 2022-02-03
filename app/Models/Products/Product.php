<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
 {
    return $this->belongsTo('App\Models\Categories\Category','category_id');
 }
 public function brands()
 {
    return $this->belongsTo('App\Models\Brands\Brand','brand_id');
 }
 public function quatation_items()
    {
        return $this->hasOne('App\Models\Quatation_items','id');
    }
 public function product_specifications()
    {
        return $this->hasOne('App\Models\Products_specifications\Product_specification','id');
    }

}
