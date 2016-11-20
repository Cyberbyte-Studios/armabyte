<?php

namespace App\Modules\ArmaLife\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'armalife');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'armalife');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(\App\Modules\ArmaLife\Repositories\PlayerRepository::class,\App\Modules\ArmaLife\Repositories\Eloquent\PlayerRepository::class);
        $this->app->bind(\App\Modules\ArmaLife\Repositories\VehicleRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\VehicleRepository::class);
        $this->app->bind(\App\Modules\ArmaLife\Repositories\HouseRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\HouseRepository::class);
        $this->app->bind(\App\Modules\ArmaLife\Repositories\ContainerRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\ContainerRepository::class);
        $this->app->bind(\App\Modules\ArmaLife\Repositories\GangRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\GangRepository::class);
        $this->app->bind(\App\Modules\ArmaLife\Repositories\WantedRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\WantedRepository::class);
    }
}
