<?php

namespace App\Http\Controllers;
use App\Models\Quatations\Quatation;
use App;
use App\Models\Quatation_items\Quatation_item;
use Validator;
use Log;
use App\Models\Clients\Client;
use Illuminate\Http\Request;
use Auth;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Session;
use implode;


class CompanyQuatationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   dd(auth()->user());
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

            $quatations = Quatation::where('is_active',1)->get();
            $quatations_items = Quatation_item::where('is_active',1)->get();
            if(is_null($quatations))
            {
               
                return redirect()->back();
                
            }
            // Session::flash('success','quatation data  found!');
            return view('company.quatations.index',compact('quatations','quatations_items'));
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
            $clients = Client::get();
            $products =Product ::get();
            // dd(  $products);
            // Session::flash('success','quatations data created');
            return view('company.quatations.createqutation',compact('clients','products'));
        }
        catch (\Exception $e)
        {

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
        // dd($request->all());
        try
        {   
            $rules=[
            'client_id' =>  'required',
            'quatation_no' =>  'required',
            'name' =>  'required',
            'discount' =>  'required',
            
           ];
           $messages=[
           
           'client_id.required'=>'client_id is required',
           'quatation_no.required'=>'qutation_no is required',
           'name.required'=>'name is required',
           'discount.required'=>'discount is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companyquatation/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
        //
                    {
                       
                        $quatation = new Quatation;
                        $quatation->client_id = $request->client_id;
                        $quatation->quatation_no = $request->quatation_no;
                        $quatation->name = $request->name;
                        $quatation->discount = $request->discount;
                        $quatation->product_id=$request->product_id;
                        $quatation->is_active = 1;
                        $exequteQuery = $quatation->save();
                        if(!$exequteQuery)
                        {
                            Session::flash('danger','quatation are not save! ');
                           
                            return redirect()->back();
                        }
                        else
                        {                            
                            $product = Product::where('is_active',1)->where('id',$quatation->product_id)->first();
                            
                            // dd($product);
                            for( $i=0; $i<count($request->product_name_table); $i++ )
                            {
                                                
                                $quatation_item = new Quatation_item;
                                $quatation_item->quatation_id = $quatation->id;
                                $quatation_item->product_id = $request->product_name_table[$i];
                                $quatation_item->qty = $request->product_quantity_table[$i];
                                $quatation_item->rate = $request->product_rate_table[$i];
                                $quatation_item->total = $request->product_total_table[$i];
                                $quatation_item->is_active = 1;
                                $exequteQuery = $quatation_item->save();
                                if(! $exequteQuery)
                                {
                                    Session::flash('danger','quatation_item not save !');
                                    return redirect()->back();
                                }
                            }
                            // dd($request->product_total_table);

                        }
                        Session::flash('success','quatation data  created!');
                        return redirect()->route('companyquatation.create');
                      
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
        
        try
        {

            $quatation=Quatation::find($id);

            $quatations_items = Quatation_item::where('is_active',1)->where('quatation_id',$quatation['id'])->get();
    
            $total_amount = 0;
            foreach($quatations_items as $quatations)
            {
                $total_amount += ($quatations->total)- ($quatations->total * $quatations->quatations->discount/100);
            }
            // Session::flash('success','Quatation data  view!');
            return view('company.quatations.show',compact('quatation','quatations_items','total_amount'));
            
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
        $quatation=Quatation::find($id);
        $products = Product::all();
        $clients = Client::all();
        // dd($brands);
        // Session::flash('success','Quatation data  edit!');
        return view('company.quatations.edit',compact('quatation', "clients",'products'));
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
            
            $quatation  = Quatation::where('id', $id)->first();
            if(is_null($quatation))
            {
                return "user not found";
            }
            $quatation->client_id=$request->client_id;
            // dd($data);
            $quatation->quatation_no=$request->quatation_no;
            $quatation->name = $request->name;
            $quatation->discount = $request->discount;
            $quatation->product_id=$request->product_id;
            $exequteQuery = $quatation->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                Session::flash('danger','Internal server error');
                return redirect()->back();
            }
           
            return redirect()->route('companyquatation.index');
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
            $quatation = Quatation::where('id',$id)->where('is_active',1)->first();
            if(is_null($quatation))
            {
                return redirect()->back();
                
            }
            $quatation->is_active =0;
            $exequteQuery = $quatation->update();
            Session::flash('danger','quatation data deleted!');
            return redirect()->route('companyquatation.index');
        }
        catch (\Exception $e) 
        {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect()->back();
        }
    }

    public function getAllProducts($id)
    {
        
        try
        {
            // dd($products);
            $products = Product::where('id',$id)->first();
            
            if(is_null($products))
            {
                return response()->json(['success' => 'false', 'message' =>  'Bad Request.'],400);
            }
            Log::info($products);
            $html = view('company.products.product_get',compact('products'))->render();

            return response()->json(['success' => 'true', 'data' => $html],200);

            
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());
    
            return response()->json(['success' => 'true', 'message' =>  'internal server errors.please try again.'],500);
        }

    }
    
    public function checkqty(Request $request )
    {
        // Log::info('are');
        Log::info($request->all());
        Log::info($request->qty);
        if ($request->has('qty')) //request->has('key name'))
        { 
                try 
                {
                    $products = Product::where('id',$request->id)->first();
                    if($products->quantity < $request->qty)
                    {
                        Log::info('big');
                        return response()->json(['message' => 'Please enter small quantity.'],200);
                    }
                    else
                    {
                        Log::info('small');
                        return response()->json(['message' => 'this quantity value is valid.'],200);
                    }
                    
                }
                catch (\Exception $e) 
                {

                    Log::info('message:'.$e->getMessage());
                    Log::info('code:'.$e->getCode());
        
                    Session::flash('danger','Internal server error');
                    return redirect()->back();
                }
            
        }
        else 
        {
            return 'false';
        }
    }
}
