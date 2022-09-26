<?php

namespace App\Providers;

use App\Faker\FakerImageProvider;
use App\Repositories\Interfaces\PhotoRepositoryInterface;
use App\Repositories\PhotoRepository;
use App\Repositories\TagRepository;
use App\Repositories\Interfaces\TagRepositoryInterface;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use Mmo\Faker\LoremSpaceProvider;

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

        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
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
