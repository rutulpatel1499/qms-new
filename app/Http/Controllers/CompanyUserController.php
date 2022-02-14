<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Session;
use App\Event\UserCreated;
use App\User;
use App\Jobs\SendEmailJob;
use App\Mail\SendMailable;
use Carbon;
use Mail;
class CompanyUserController extends Controller
{
    public function __construct() {
       
    }
    public function companyusersidebar()
    {
        if (Auth::check())
        
        {
            // $userRole = auth()->user()->roles->name;
            
            //     if ($userRole == 'admin') {
            //         return redirect()->route('admin');
            //     }
            //     else{

            //         // abort(403);
            //     }
            
            $client=DB::table('clients')->count();
            $brand=DB::table('brands')->count();
            $categories=DB::table('categories')->count();
            $product=DB::table('products')->count();
            // dd($user);
            return view('company.commons.companydashboard',compact('client','brand','categories','product'));
        }
        return view('common.login');

    }  
    public function index()
    {
        // event(new UserCreated('email has been sent your gmail  address'));
        $email = User::inRandomOrder()->first();
        event(new UserCreated($email));
        echo $email->email;
    }   


    public function sendmail()
    {

        $data = ['message' => 'This is a test mail!'];

        $mail = Mail::to('ghanshyampatel6550@gmail.com')->send(new SendMailable($data));
        
        return "email has been sent";


        $emailjob=(new SendEmailJob())->delay(Carbon\Carbon::now()->addSeconds(5));
            
    }
    public function dummyapi(Request $req)
    {
        return response()->json(['message' => 'success', 'data' => $req->json()->all()],200);
        return $req->all();
        return ['name'=>'rutul'];
    }
}
