<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\User;
use Socialize;
use Log;
class GoogleController extends Controller
{
    
    public function redirectToGoogle()
    {
        // log::info("hiiiiiiiiiii");
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
       try
        {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            // dd( $finduser);
            log::info($finduser);
            if($finduser)
            {
                Auth::login($finduser);
                return redirect('login');
            }
            else
            {
                $newUser =new User;
                $newUser ->role_id = 2;
                $newUser ->name = $user->name;
                $newUser -> email = $user->email;
                $newUser ->google_id= $user->id;
                $newUser -> password = encrypt('123456dummy');
                $newUser->save();
                
                Auth::login($newUser);
                return redirect('companyuser');
            }
        } 
        catch (Exception $e) 
        {
            // dd($e->getMessage());
            Log::info("Error Message: ".$e->getMessage());
            log::info('noooo');
        }
    }
}
 