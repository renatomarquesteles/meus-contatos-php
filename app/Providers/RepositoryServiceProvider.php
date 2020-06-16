<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\ContactRepository::class,
            \App\Repositories\ContactRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\AddressRepository::class,
            \App\Repositories\AddressRepositoryEloquent::class
        );

        $this->app->bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\UserRepositoryEloquent::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //:end-bindings:
    }
}
