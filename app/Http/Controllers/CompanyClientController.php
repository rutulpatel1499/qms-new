<?php

namespace App\Http\Controllers;
use App\Models\Clients\Client;
use Illuminate\Support\Facades\Gate;
use Validator;
use Log;
use Auth;
use Illuminate\Support\Facades\Session ;
use Illuminate\Http\Request;

class CompanyClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          // dd(auth()->user());
          if (Auth::check())
        
          {
              $userRole = auth()->user()->roles->name;
          
              if ($userRole == 'admin') {
              return redirect()->route('user');
              }
              else
              {
                  // abort(403);
              }
          }
        try
        {

            $clients = Client::where('is_active',1)->get();
            //  dd($users);
            if(is_null($clients))
            {
                return redirect()->back();
                
            }
            // Session::flash('success','clients data  found!');
            return view('company.clients.index',compact('clients'));
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
        try
        {
            return view('company.clients.client');
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
         //
          // dd("yes");
          try
        {   
            $rules=[
            'name' =>  'required',
            'email' =>  'required',
            'address' =>  'required',
            'contactno' =>  'required',
            
           ];
           $messages=[
           'name.required'=>'name is required',
           'email.required'=>'email is required',
           'address.required'=>'address is required',
           'contactno.required'=>'contactno is required',
        //    'contactno.numeric'=> ' The contact no may not be greater than 10 characters.',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companyclients/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
                {
                    $client =new Client;
                    $client->name = $request->name;
                    $client->email = $request->email;
                    $client->address= $request->address;
                    $client->contact_no = $request->contactno;
                    $client->is_active = 1;
                    $exequteQuery = $client->save();
                    if(! $exequteQuery)
                    {
                        Session::flash('danger','client are not save!');
                        return redirect()->back();
                    }
                    Session::flash('success','client save success!');
                    return redirect()->route('companyclients.create');
            
                }
        
        }
         catch (\Exception $e)
        {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
         // dd("yes");
      
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
        $client=Client::find($id);
        // if(Gate::denies('isAdmin',$client)){
        //     abort(403);
        // }
        // Session::flash('success','Client data view!');
        return view('company.clients.show',compact('client'));
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
        try
        {
            $client=Client::find($id);
            // Session::flash('success','Client data  edit!');
            return view('company.clients.edit',compact('client'));
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
            
            $client  = Client::where('id', $id)->first();
            if(is_null($client))
            {
                return "user not found";
            }
            $client->name = $request->name;
            $client->email = $request->email;
            $client->address= $request->address;
            $client->contact_no = $request->contactno;
           
          
           // $data->password=$request->password;
            $exequteQuery = $client->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                return 'internal server errors.please try again.';
            }
            
            return redirect()->route('companyclients.index');
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
        try
        {

            $client = Client::where('id',$id)->where('is_active',1)->first();
            if(is_null($client))
            {
                return redirect()->back();
                
            }
            $client->is_active =0;
            $exequteQuery = $client->update();
            Session::flash('danger','client data deleted!');
            return redirect()->route('companyclients.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
}
