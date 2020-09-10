<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        //$this->registerPolicies();

        Gate::define('isAdmin', function($user) {

            return $user->type === 'admin';
        });

        Gate::define('isAuthor', function($user) {

            return $user->type === 'author';
        });

        Gate::define('isUser', function($user) {

            return $user->type === 'user';
        });

        Passport::routes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
