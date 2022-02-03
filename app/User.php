<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //    
    public function roles()
    {
        return $this->belongsTo('App\Role','role_id');
    }
}
