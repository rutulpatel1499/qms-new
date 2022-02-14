<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Log;
use Socialite;
class logincontroller extends Controller
{
    public function __construct() {
         
        //  dd("constructor");
        //   $this->middleware('auth');
    }
    
    public function login()
    {
        if (Auth::check())

        {
            $userRole = auth()->user()->roles->name;
            {
                if ($userRole == 'admin') {
                return redirect()->route('user');
                }
                elseif ($userRole == 'user'){
                return redirect()->route('CompanySidebar');
                }
            }
        }
        
        return view('common.login');
       
    }
    // login controller
    public function userlogin(Request $Request)
    {
        try
        {
            $credential=$Request->only('email','password');
            // dd($credential);
            if(Auth::attempt($credential))
            {
            //
                $userRole = auth()->user()->roles->name;
                {
                    //  dd($userRole);
                    // log::info( $userRole);
                    if ($userRole == 'admin') {
                    return redirect()->route('user');
                    }
                    elseif ($userRole == 'user'){
                        return redirect()->route('CompanySidebar');
                    }
                }
            }
            else
            {
            return redirect()->route('login');   
            }
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
 
    }
 //logout controller
    public function logout()
    {
        // log::info('yessss');
        try
        {
            // log::info('logout');
            Auth::logout();
            return redirect('login');
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

}
                  
