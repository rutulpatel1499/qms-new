<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function products()
    {
        return $this->hasOne('App\Models\Products\Product','id');
    }
}
