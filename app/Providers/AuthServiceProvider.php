<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerUserPolicies();

        //
    }

    public function registerUserPolicies()
    {
        Gate::define('create',function($user){
            if($user->hasAccess(['create'])) {
                return $user->hasAccess(['create']);
            }
            else{
                return new Response(view('unauthorized'));
            }
        });

        Gate::define('read',function($user){
            if($user->hasAccess(['read'])) {
                return $user->hasAccess(['read']);
            }
            else{
                return new Response(view('unauthorized'));
            }
        });

        Gate::define('update',function($user){
            if($user->hasAccess(['update'])) {
                return $user->hasAccess(['update']);
            }
            else{
                return new Response(view('unauthorized'));
            }
        });

        Gate::define('delete',function($user){
            if($user->hasAccess(['delete'])) {
                return $user->hasAccess(['delete']);
            }
            else{
                return new Response(view('unauthorized'));
            }
        });
    }
}
