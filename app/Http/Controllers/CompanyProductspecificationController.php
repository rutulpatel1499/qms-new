<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products_specifications\Product_specification;
use Validator;
use Log;
use Auth;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Session ;


class CompanyProductspecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $Product_specification = Product_specification::where('is_active',1)->get();
            if(is_null($Product_specification))
            {
                return redirect()->back();
                
            }
            // dd($products);
            // Session::flash('success','Product_specification data  found!');
            return view('company.productspecification.index',compact('Product_specification'));
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
            $products =Product ::get();
            return view('company.productspecification.createproductspecification',compact('products'));
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
            'product_id' =>  'required',
            'key' =>  'required',
            'value' =>  'required',
            
           ];
           $messages=[
           'product_id.required'=>'product id is required',
           'key.required'=>'key is required',
           'value.required'=>'value is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('productspecification/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
        //
                    {
                        $product_specification =new Product_specification;
                        $product_specification->product_id=$request->product_id;
                        // dd($data);
                        $product_specification->key = $request->key;
                        $product_specification->value = $request->value;
                        $product_specification->is_active = 1;
                        $exequteQuery = $product_specification->save();
                        if(! $exequteQuery)
                        {
                            Session::flash('danger','product_specification are not save!');
                            return redirect()->back();
                        }
                        Session::flash('success','product_specification save success! ');
                        return redirect()->route('productspecification.create');
                        
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
            $Product_specification=Product_specification::find($id);
            
            // Session::flash('success','product_specification data view! ');
            return view('company.productspecification.show',compact('Product_specification'));
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
            $productspecification=Product_specification::find($id);
            $products = Product::all();
            // dd($product);
            // Session::flash('success','product_specification data edit! ');
            return view('company.productspecification.edit',compact( 'products', 'productspecification'));
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
            
            $product_specification  = Product_specification::where('id', $id)->first();
            if(is_null($product_specification))
            {
                return "user not found";
            }
            $product_specification->product_id=$request->product_id;
            $product_specification->key = $request->key;
            $product_specification->value = $request->value;
            // dd($data);
            
          
           
            $exequteQuery = $product_specification->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                return 'internal server errors.please try again.';
            }
            
            return redirect()->route('productspecification.index');
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
            $Product_specification = Product_specification::where('id',$id)->where('is_active',1)->first();
            if(is_null($Product_specification))
            {
                return redirect()->back();
                
            }
            $Product_specification->is_active =0;
            $exequteQuery = $Product_specification->update();
            Session::flash('danger','product_specification data deleted! ');
            return redirect()->route('productspecification.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
}
