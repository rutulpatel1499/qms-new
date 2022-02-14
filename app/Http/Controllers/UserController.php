<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Image;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function __construct() {
       
    }
    public function user()
    {
        if (Auth::check())
        {
            
            // dd(auth()->user()->roles);
            $userRole = auth()->user()->roles->name;
            if ($userRole == 'user') {
            return redirect()->route('CompanySidebar');
            //  abort(403);
           
            }
            
            return view('admin.users.user');
        
        }
        return view('common.login');
    }
}
        
    

            
