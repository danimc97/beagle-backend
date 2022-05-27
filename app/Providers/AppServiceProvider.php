<?php

namespace App\Providers;

use Beagle\Domain\Interfaces\FileStorage;
use Beagle\Domain\Interfaces\SuperHeroRepository;
use Beagle\Infrastructure\Persistence\Eloquent\Repository\EloquentSuperHeroRepository;
use Beagle\Infrastructure\Storage\Local\LocalFileStorage;
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
        $this->app->bind(SuperHeroRepository::class, EloquentSuperHeroRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
