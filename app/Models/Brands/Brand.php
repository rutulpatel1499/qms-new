<?php

namespace App\Models\Brands;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public function products()
    {
        return $this->hasOne(' App\Models\Products\Product','id');
    }
}
