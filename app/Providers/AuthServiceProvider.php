<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
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
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Implicitly grant "Super-Admin" role all permission checks using can()
        Gate::before(function (User $user, $ability) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });

        Gate::define('show-admin-panel', function (User $user) {
            return $user->hasRole(['super-admin', 'admin', 'storekeeper', 'writer']);
        });
    }
}
