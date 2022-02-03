<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class company
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::check()){
        //     $userRole = auth()->user()->roles->name;
        //     // dd(  $userRole );
        //         {
        //             if ($userRole !== 'admin') {
        //                echo "yes";
        //             } else {
        //             echo "no";
        //             }
        //             // elseif ($userRole === 'user'){
        //             //     
        //             // }
        //         }
        // }
    }
}