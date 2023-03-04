<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user', function ($user) {
            return ($user->permission_id == 1);
        });

        Gate::define('storemanager', function ($user) {
            return ($user->permission_id >= 2);
        });

        Gate::define('administor', function ($user) {
            return ($user->permission_id == 3);
        });
    }
}
