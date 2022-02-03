<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Gates\adminGate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Brands\Brand' => 'App\Policies\BrandPolicy',
        // brand::class => BrandPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Gate::define('isAdmin',function($users){
        //         if($users->email == 'rutulpatel6550@gmail.com')
        //         {
        //             return true;
        //         }
        //         else{
        //          return false;
        //         }
            
        // });
            // Gate::define('isAdmin',[adminGate::class,'check_admin']);
    }
}
