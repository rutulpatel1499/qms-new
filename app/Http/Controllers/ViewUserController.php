<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Auth;
use Log;
use DB;
use Validator;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        if (Auth::check())
        {
            
            // dd(auth()->user()->roles);
            $userRole = auth()->user()->roles->name;
            if ($userRole == 'user') {
            return redirect()->route('CompanySidebar');
            }
            else{

                // abort(403);
            }
        }
        //only patel name user show 
        // $users = User::where('name', 'LIKE', '%patel%')->get();
        //only admin show 
        // $users = User::whereHas('roles', function($q)
        // {
        //     $q->where('name', 'user');
        // // })->get();
        //desendin order
        try
        {
            $users = User:: orderBy('name','desc')->get();
            // $users = User::with('users')->where('role_id', 'admin')->get();
        
            // dd($users);
            return view('admin.users.index',compact('users'));
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check())
        {
            
            // dd(auth()->user()->roles);
            $userRole = auth()->user()->roles->name;
            if ($userRole == 'user') {
            return redirect()->route('CompanySidebar');
            }
            else{

                // abort(403);
            }
        }
        try
        {

            $roles =role ::get();
            
            return view('admin.users.registration',compact('roles'));
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try
        {   
            $rules=[
            'role_id'=>'required',
            'name' =>  'required',
            'email'=> 'required|email',
            'contactno'=> 'required|numeric',
            'password'=>'required|min:8'
           ];
           $messages=[
           'role_id.required'=>'role_id is required',
           'name.required'=>'name is required',
           'email.required'=>'email is required',
           'contactno.required'=>'contactno is required',
           'contactno'=> ' The contact no may not be greater than 10 characters.',
           'password.required'=> 'password is required',
           'password'=> 'The password must be at least 8 characters.'
    
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    //dd($validator->errors());
                    Log::info($validator->errors());
                    Log::info("errors");
                    return redirect('registers')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
                {
                  $user =new User;
                  $user->role_id=$request->role_id;
                //  dd($user);
                  $user->name = $request->name;
                  $user->email=$request->email;
                  $user->contactno=$request->contactno;
                  $user->password= Hash::make($request->password);
                  $exequteQuery = $user->save();
                  if(! $exequteQuery)
                    {
                        Session::flash('danger','new user is not created!');
                        return redirect()->back();
                    }
                 //   return redirect()->route('createdata');
                  Session::flash('success','new user create successfully!');
                 return redirect()->route('createdata');
                }
                  
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try
        {
            $user=User::find($id);
            // dd($user);
            return view('admin.users.show',compact('user'));
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());
            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //    dd($id);
        try
        {
           $user=User::find($id);
           $roles =role ::get();
           return view('admin.users.edit',compact('user','roles'));
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try
        {
            
            $user  = User::where('id', $id)->first();
            if(is_null($user))
            {
                return "user not found";
            }
            $user->role_id=$request->role_id;
            $user->name = $request->name;
            $user->email=$request->email;
            $user->contactno=$request->contactno;
          
           // $data->password=$request->password;
            $exequteQuery = $user->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                Session::flash('danger','Internal server error');
                return redirect()->back();
            }
            
            return redirect()->route('users.index');
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
