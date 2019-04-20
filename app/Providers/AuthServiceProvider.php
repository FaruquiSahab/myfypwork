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
            return $user->hasAccess(['create']);
        });

        Gate::define('read',function($user){
            return $user->hasAccess(['read']);
        });

        Gate::define('update',function($user){
            return $user->hasAccess(['update']);
        });

        Gate::define('delete',function($user){
            return $user->hasAccess(['delete']);
        });
    }
}
