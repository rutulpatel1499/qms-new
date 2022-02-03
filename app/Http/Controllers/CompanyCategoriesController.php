<?php

namespace App\Http\Controllers;
use App\Models\Categories\Category;
use Validator;
use Log;
use Auth;
use Illuminate\Support\Facades\Session ;
use Illuminate\Http\Request;

class CompanyCategoriesController extends Controller
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
              
             $Category = Category::where('is_active',1)->get();
              //  dd($users);
              if(is_null($Category))
            {
                return redirect()->back();
                
            }
            // Session::flash('success','Category data  found!');
             return view('company.categories.index',compact('Category'));
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
            return view('company.categories.category');
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
        // dd("yes");
        try
        {   
            $rules=[
            'name' =>  'required',
            
           ];
           $messages=[
           'name.required'=>'categoryname is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companycategories/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
                {
                  $category =new Category;
                  $category->category = $request->name;
                  $category->is_active = 1;
                  $exequteQuery = $category->save();
                  if(! $exequteQuery)
                  {
                     Session::flash('danger','category are not save!');
                      return redirect()->back();
                  }
                  Session::flash('success','category save success!');
                  return redirect()->route('companycategories.create');
                  
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
            $Category=Category::find($id);
            // Session::flash('success','Category data  View!');
            return view('company.categories.show',compact('Category'));
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
            $Category=Category::find($id);
            // Session::flash('success','Category data  Edit!');
            return view('company.categories.edit',compact('Category'));
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
            
            $category  = Category::where('id', $id)->first();
            if(is_null($category))
            {
                return "user not found";
            }
            $category->category = $request->name;
           
          
           // $data->password=$request->password;
            $exequteQuery = $category->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                return 'internal server errors.please try again.';
            }
            
            return redirect()->route('companycategories.index');
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
            $Category = Category::where('id',$id)->where('is_active',1)->first();
            if(is_null($Category))
            {
                Session::flash('alert alert-danger','category data not deleted!');
                return redirect()->back();
                
            }
            $Category->is_active =0;
            $exequteQuery = $Category->update();
            Session::flash('danger','category data deleted!');
            return redirect()->route('companycategories.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
    public function category(request $request)
    {
        Log::info($request->all());
        if ($request->has('name')) { //request->has('key name'))
            if (empty($request->name)) {
                return 'true';
            } 
            else {
                try {
                    $get_category = Category::where('category', $request->name)->first();
                    if (is_null($get_category)) { 
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
                 
                 

              
                  
