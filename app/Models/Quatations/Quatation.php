<?php

namespace App\Models\Quatations;

use Illuminate\Database\Eloquent\Model;

class Quatation extends Model
{
    //
    public function clients()
    {
       return $this->belongsTo('App\Models\Clients\Client','client_id');
    }
    public function quatation_items()
    {
        return $this->hasOne(' App\Models\Quatation_items','id');
    }
}
