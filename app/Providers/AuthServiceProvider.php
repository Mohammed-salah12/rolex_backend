<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
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

        Gate::define('viewAny-permission', [PermissionPolicy::class, 'viewAny']);
        Gate::define('create-permission', [PermissionPolicy::class, 'create']);
        Gate::define('update-permission', [PermissionPolicy::class, 'update']);
        Gate::define('delete-permission', [PermissionPolicy::class, 'delete']);

        Gate::define('viewAny-role', [RolePolicy::class, 'viewAny']);
        Gate::define('create-role', [RolePolicy::class, 'create']);
        Gate::define('update-role', [RolePolicy::class, 'update']);
        Gate::define('delete-role', [RolePolicy::class, 'delete']);

    }
}
