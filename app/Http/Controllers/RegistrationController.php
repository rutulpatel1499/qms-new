<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Role;
use Log;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    //
    public function create()
    {
    //     if (Auth::check())
    //     {
            
    //         // dd(auth()->user()->roles);
    //         $userRole = auth()->user()->roles->name;
    //         if ($userRole == 'user') {

    //         return redirect()->route('CompanySidebar');
    //         }
    //         else{

    //             // abort(403);
    //         }
    //     }
    //     $roles =role ::get();
    //     return view('admin.users.registration',compact('roles'));
    }
    public function store(Request $request)
    {
        
        // dd($request->role_id);
        // try
        // {   
        //     $rules=[
        //     'role_id'=>'required',
        //     'name' =>  'required',
        //     'email'=> 'required|email',
        //     'contactno'=> 'required|numeric',
        //     'password'=>'required|min:8'
        //    ];
        //    $messages=[
        //    'role_id.required'=>'role_id is required',
        //    'name.required'=>'name is required',
        //    'email.required'=>'email is required',
        //    'contactno.required'=>'contactno is required',
        //    'contactno'=> ' The contact no may not be greater than 10 characters.',
        //    'password.required'=> 'password is required',
        //    'password'=> 'The password must be at least 8 characters.'
    
        //    ];   
        //    $validator = Validator::make($request->all() , $rules, $messages);
        //         if($validator->fails())
        //         {
        //             //dd($validator->errors());
        //             Log::info($validator->errors());
        //             Log::info("errors");
        //             return redirect('registers')
        //             ->withErrors($validator)
        //             ->withInput();
        //         }
        //         else
        //         {
        //           $data =new User;
        //           $data->role_id=$request->role_id;
        //         //   dd($data);
        //           $data->name = $request->name;
        //           $data->email=$request->email;
        //           $data->contactno=$request->contactno;
        //           $data->password= Hash::make($request->password);
        //         //   $exequteQuery = $data->save();
        //         //   if(! $exequteQuery)
        //         //     {
        //         //         Session::flash('danger','new user is not created!');
        //         //         return redirect()->back();
        //         //     }
        //         //  //   return redirect()->route('createdata');
        //         //   Session::flash('success','brand save success!');
        //         //  return redirect()->route('createdata');
                  
        //         }
        // }
        // catch (\Exception $e) {

        //     Log::info('message:'.$e->getMessage());
        //     Log::info('code:'.$e->getCode());

        //     Session::flash('danger','Internal server error');
        //     return redirect()->back();
        // }
    }
   
}
