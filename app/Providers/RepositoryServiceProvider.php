<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\AddressRepository;
use App\Repositories\ContactRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryEloquent;
use App\Repositories\AddressRepositoryEloquent;
use App\Repositories\ContactRepositoryEloquent;

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
            ContactRepository::class,
            ContactRepositoryEloquent::class
        );
        $this->app->bind(
            AddressRepository::class,
            AddressRepositoryEloquent::class
        );

        $this->app->bind(
            UserRepository::class,
            UserRepositoryEloquent::class
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
