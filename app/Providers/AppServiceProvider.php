<?php

namespace App\Providers;

use App\Repositories\Interfaces\PhotoRepositoryInterface;
use App\Repositories\PhotoRepository;
use App\Repositories\TagRepository;
use App\Repositories\Interfaces\TagRepositoryInterface;
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
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.header', function($view) {
            $view->with('tagsCloud', app(TagRepositoryInterface::class)->tagsCloud());
        });
    }
}
