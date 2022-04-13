<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

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
        $this->register();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
