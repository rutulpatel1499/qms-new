<?php

namespace App\Http\Controllers;
use App\Models\Products\Product;
use Validator;
use Log;
use App\Models\Categories\Category;
use App\Models\Brands\Brand;
use Auth;
use Illuminate\Support\Facades\Session ;


use Illuminate\Http\Request;

class CompanyProductController extends Controller
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

            // $products = Product::all();
            $products = Product::where('is_active',1)->get();
            dd($products);
            if(is_null($products))
            {
                return redirect()->back();
                
            }
            // Session::flash('success','product data  found!');
            return view('company.products.index',compact('products'));
        }
        catch (\Exception $e) {

            Log::info('message:'.$e->getMessage());
            Log::info('code:'.$e->getCode());

            Session::flash('danger','Internal server error');
            return redirect('companyproducts');
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
            $categories = Category::get();
        
            $brands =Brand ::get();
            return view('company.products.product',compact('categories','brands'));
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
        try
        {   
            $rules=[
            'category' =>  'required',
            'brand' =>  'required',
            'productname' =>  'required',
            'rate' =>  'required|gt:0',
            'quantity' =>  'required',
            
           ];
           $messages=[
           'category.required'=>'category id is required',
           'brand.required'=>'brand id is required',
           'productname.required'=>'productname is required',
           'rate.required'=>'rate is required',
           'rate.required'=>'The rate must be greater than 0.',
           'quantity.required'=>'quantity is required',
         
           ];   
           $validator = Validator::make($request->all() , $rules, $messages);
                if($validator->fails())
                {
                    Log::info($validator->errors());
                    Log::info("errors");
                    //dd($validator->errors());
                    return redirect('companyproducts/create')
                    ->withErrors($validator)
                    ->withInput();
                }
                else
        
                    
                    {
                        $product =new Product;
                        $product->category_id=$request->category;
                        $product->brand_id=$request->brand;
                        $product->name = $request->productname;
                        $product->rate = $request->rate;
                        $product->quantity = $request->quantity;
                        $product->is_active = 1;    
                        $exequteQuery = $product->save();
                    //    dd($product->rate );

                        if(! $exequteQuery)
                        {
                         Session::flash('danger','product are not save! ');
                           return redirect()->back();
                        }
                        Session::flash('success','product save success!');
                        return redirect()->route('companyproducts.create');
                        
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
        try{
            $product=Product::find($id);
            
            // Session::flash('success','Product data  view!');
            return view('company.products.show',compact('product'));
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
            $product=Product::find($id);
            $categories = Category::all();
            $brands = Brand::all();
            // dd($brands);
            // Session::flash('success','Product data  edit!');
            return view('company.products.edit',compact('product', "categories", 'brands'));
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
            
            $product  = Product::where('id', $id)->first();
            if(is_null($product))
            {
                return "user not found";
            }
            $product->category_id=$request->category;
            $product->brand_id=$request->brand;
            $product->name = $request->productname;
            $product->rate = $request->rate;
            $product->quantity = $request->quantity;
            // dd($data);
            
          
           
            $exequteQuery = $product->update();
            if(! $exequteQuery)
            {
                Log::info('message:'.$e->getMessage());
                Log::info('code:'.$e->getCode());
                return 'internal server errors.please try again.';
            }
            
            return redirect()->route('companyproducts.index');
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
            $product = Product::where('id',$id)->where('is_active',1)->first();
            if(is_null($product))
            {
                return redirect()->back();
                
            }
            $product->is_active =0;
            $exequteQuery = $product->update();
            Session::flash('danger','product data deleted!');
            return redirect()->route('companyproducts.index');
        }
        catch (\Exception $e) {

        Log::info('message:'.$e->getMessage());
        Log::info('code:'.$e->getCode());

        Session::flash('danger','Internal server error');
        return redirect()->back();
        }
    }
}
