<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //
    public function reset()
    {
        
        return view('admin.users.resetpassword');
    }
    
}
