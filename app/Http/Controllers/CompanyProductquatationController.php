<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products\Product;

class CompanyProductquatationController extends Controller
{
    //
 
    public function productquatationsave ()
    {
        $products =Product ::get();
        return view('company.quatations.ajaxproductquatation',compact('products'));
    }
}



      
        
            
