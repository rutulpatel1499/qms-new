<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function quatations()
    {
        return $this->hasOne(' App\Models\Quatations\Quatation','id');
    }
}
