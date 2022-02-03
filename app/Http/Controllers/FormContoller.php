<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Form;
use Validator;
// use App\User;

class FormContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users =Form::get();
        // dd($users);
        return view('index',compact('users'));
        // 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form');
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
        // dd($request->all());
        $rules=[
            'firstname' =>  'required',
            'lastname' =>  'required',
            'email' =>  'required',
            'contactnumber' =>  'required',
            'address' =>  'required',
            'dateofbirth' =>  'required',
            
           ];
           $messages=[
           'firstname.required'=>' firstname is required',
           'lastname.required'=>' lastname is required',
           'email.required'=>' email is required',
           'contactnumber.required'=>' contactnumber is required',
           'address.required'=>' address is required',
           'dateofbirth.required'=>' dateofbirth is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('form/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
                {
                    $TestForm = new Form;
                    $TestForm->firstname = $request->firstname;
                    $TestForm->lastname = $request->lastname;
                    $TestForm->email = $request->email;
                    $TestForm->contactnumber = $request->contactnumber;
                    $TestForm->address = $request->address;
                    $TestForm->dateofbirth = $request->dateofbirth;
                    // dd($TestForm);
                    $TestForm->save();
                
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
        $user= Form::find($id);
        return view('show',compact('user'));

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
        $user= Form::find($id);
        return view('edit',compact('user'));

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
        $TestForm = Form::where('id', $id)->first();
        $TestForm->firstname = $request->firstname;
        $TestForm->lastname = $request->lastname;
        $TestForm->email = $request->email;
        $TestForm->contactnumber = $request->contactnumber;
        $TestForm->address = $request->address;
        $TestForm->dateofbirth = $request->dateofbirth;
        // // dd($TestForm);
        $TestForm->update();
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
        $user = Form::where('id',$id)->first();
        $user->delete();
        return "success";
    }
    public function user(Request $req)
    {
        return response()->json(['message' => 'success', 'data' => $req->json()->all()],200);
        return $req->all();
        // return ['name'=>'rutul'];
    }
}
