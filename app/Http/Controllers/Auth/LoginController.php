<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Log;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        Log::info("user get");
        try {
    
            $user = Socialite::driver('google')->user();
            // Log::info($user);
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect()->route('login');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email' => $user->contactno,
                    'password' => encrypt('123456dummy'),
                    'google_id'=> $user->id
                ]);
    
                Auth::login($newUser);
     
                return redirect()->route('login');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        // $user->token;
    }
}
