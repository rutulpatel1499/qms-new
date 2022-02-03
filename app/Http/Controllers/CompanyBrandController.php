<?php

namespace App\Http\Controllers;

use App\Models\Brands\Brand;
use Validator;
use Log;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyBrandController extends Controller
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
            // $users = brand::all();
            $brands = Brand::where('is_active',1)->get();
            
            if(is_null($brands))
            {
                return redirect()->back();
                
            }

            //  dd($brands);
            // Session::flash('success','brand data  found!');
            return view('company.brands.index',compact('brands'));
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
          return view('company.brands.brand');
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
            'name' =>  'required',
            
           ];
           $messages=[
           'name.required'=>' brandname is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companybrands/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
                {
                    $brand =new Brand;
                    $brand->brandname = $request->name;
                    $brand->is_active = 1;
                    $exequteQuery = $brand->save();
                    if(! $exequteQuery)
                    {
                        Session::flash('danger','brand are not save');
                        return redirect()->back();
                    }
                    Session::flash('success','brand save success!');
                    return redirect()->route('companybrands.create');
                    
                  }
        }
        catch (\Exception $e) {

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
        $Brand=Brand::find($id);
        // Session::flash('success','brand data  view!');
        
        return view('company.brands.show',compact('Brand'));
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
        try{
        $Brand=brand::find($id);
        // if(Gate::denies('isAdmin',$Brand)){ //url can not access this page
        //     return 'hello';
        // }
        // else 
        // {
        //     return 'false';
        // }

        // Session::flash('success','brand data  edit!');
        return view('company.brands.edit',compact('Brand'));
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
            
            $brand  = Brand::where('id', $id)->first();
            if(is_null($brand))
            {
                return "user not found";
            }
            $brand->brandname = $request->name;
           
          
           // $data->password=$request->password;
            $exequteQuery = $brand->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                Session::flash('danger','Internal server error');
                return redirect()->back();
            }
            
            return redirect()->route('companybrands.index');
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
        $Brand = Brand::where('id',$id)->where('is_active',1)->first();
        if(is_null($Brand))
        {
            return redirect()->back();
            
        }
        $Brand->is_active =0;
        $exequteQuery = $Brand->update();
        Session::flash('danger','brand data deleted!');
        return redirect()->route('companybrands.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
    public function newbrand(Request $request)
    {
        Log::info($request->all());
        if ($request->has('name')) { //request->has('key name'))
            if (empty($request->name)) {
                return 'true';
            } 
            else {
                try {
                    $get_brand = Brand::where('brandname', $request->name)->first();
                    if (is_null($get_brand)) { 
                        return 'true';
                    } else { 
                        return 'false';
                    }
                }
                catch (\Illuminate\Database\QueryException $e) {
                    Log::info("There was an error processing the query for user-id: ". Auth::id() .". See the log below -");
                    Log::info("Query: ".$e->getSql());
                    Log::info("Query bindings:");
                    Log::info($e->getBindings());
                    Log::info("Error Code: ".$e->getCode());
                    Log::info("Error Message: ".$e->getMessage());

                    return 'false';
                }
                catch (\Exception $e) {
                    Log::info("There was an error for user-id: ". Auth::id() .". See the log below -");
                    Log::info("Error Code: ".$e->getCode());
                    Log::info("Error Message: ".$e->getMessage());
        
                    return 'false';
                }
            }
        }
        else {
            return 'false';
        }

    }
}
        
