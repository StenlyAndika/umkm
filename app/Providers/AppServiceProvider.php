<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('guest-only', function ($user = null) {
            return $user === null;
        });

        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });

        Gate::define('super', function(User $user) {
            return $user->is_super;
        });

        Gate::define('verified', function(User $user) {
            return $user->is_verified;
        });

    }
}
