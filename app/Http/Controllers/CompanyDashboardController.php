<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    //
    public function companydashboard()
    {
        
        return view('company.commons.companydashboard');

    }   
}
