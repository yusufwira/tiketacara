<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
           return $user->hak_akses == 'admin';
        });

        Gate::define('isAdminAcara', function($user) {
           return $user->hak_akses == 'admin_acara';
        });

        Gate::define('isMember', function($user) {
           return $user->hak_akses == 'member';
        });


        //
    }
}
