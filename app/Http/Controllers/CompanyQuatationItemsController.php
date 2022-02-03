<?php

namespace App\Http\Controllers;
use App\Models\Quatation_items\Quatation_item;
use Validator;
use Log;
use App\Models\Quatations\Quatation;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session ;
class CompanyQuatationItemsController extends Controller
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

            $quatations_items = Quatation_item::where('is_active',1)->get();
            if(is_null($quatations_items))
            {
                return redirect()->back();
                
            }
            // Session::flash('success','quatations_items data  found!');
            return view('company.quatations_items.index',compact('quatations_items'));
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
            $quatation = Quatation::get();
        
            $products =Product ::get();
            Session::flash('success','quatations_items data  created!');
            return view('company.quatations_items.createquatationitem',compact('quatation','products'));
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
            'quatation_id' =>  'required',
            'product_id' =>  'required',
            'qty' =>  'required',
            'rate' =>  'required',
            'total' =>  'required',
            
           ];
           $messages=[
           'quatation_id.required'=>'quatation_id  is required',
           'product_id.required'=>'product_id is required',
           'qty.required'=>'qty is required',
           'rate.required'=>'rate is required',
           'total.required'=>'total is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companyquatationitem/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
             //
                    {
                        $quatation_item =new Quatation_item;
                        $quatation_item->quatation_id=$request->quatation_id;
                        $quatation_item->product_id=$request->product_id;
                        $quatation_item->qty = $request->qty;
                        $quatation_item->rate = $request->rate;
                        $quatation_item->total = $request->total;
                        $quatation_item->is_active = 1;
                        $exequteQuery = $quatation_item->save();
                        if(! $exequteQuery)
                        {
                            return redirect()->back();
                        }
                        return redirect()->route('companyquatationitem.index');
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
            $quatationitem=Quatation_item::find($id);
            
            // Session::flash('success','quatations_items data  show!');
            return view('company.quatations_items.show',compact('quatationitem'));
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
            $Quatation_item=Quatation_item::find($id);
            $quatation = Quatation::all();
            $products = Product::all();
            // dd($brands);
            // Session::flash('success','quatations_items data  edited!');
            return view('company.quatations_items.edit',compact('Quatation_item', "quatation", 'products'));
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
            
            $quatation_item  = Quatation_item::where('id', $id)->first();
            if(is_null($quatation_item))
            {
                return "user not found";
            }
            $quatation_item->quatation_id=$request->quatation_id;
            $quatation_item->product_id=$request->product_id;
            $quatation_item->qty = $request->qty;
            $quatation_item->rate = $request->rate;
            $quatation_item->total = $request->total;
            // dd($data);
            
          
           
            $exequteQuery = $quatation_item->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                return 'internal server errors.please try again.';
            }
            Session::flash('success','quatations_items data  updated!');
            return redirect()->route('companyquatationitem.index');
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
            $quatationitem = Quatation_item::where('id',$id)->where('is_active',1)->first();
            if(is_null($quatationitem))
            {
                return redirect()->back();
                
            }
            $quatationitem->is_active =0;
            $exequteQuery = $quatationitem->update();
            Session::flash('danger','quatations_items are deleted!');
            return redirect()->route('companyquatationitem.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
    
}
  