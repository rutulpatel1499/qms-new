<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

// dd($users);
class BrandPolicy
{
    use HandlesAuthorization;
    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function Admin(User  $users){
        // return $users->email == 'rutulpatel6550@gmail.com';
    }
}
