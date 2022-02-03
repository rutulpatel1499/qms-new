<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SidebarController extends Controller
{
    //
    public function sidebar()
    {
        \Log::info('called');
        return view('user');

    }                           
}
