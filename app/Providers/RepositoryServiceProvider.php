<?php

namespace App\Providers;

use App\Repositories\Interfaces\PhotoRepositoryInterface;
use App\Repositories\PhotoRepository;
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
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
