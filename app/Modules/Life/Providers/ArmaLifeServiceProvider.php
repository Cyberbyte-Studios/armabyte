<?php

namespace App\Modules\ArmaLife\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class ArmaLifeServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap the application events.
     *
     * @return void
     */
	public function boot()
	{
		// You may register any additional middleware provided with your
		// module with the following addMiddleware() method. You may
		// pass in either an array or a string.
		// $this->addMiddleware('');
	}

	/**
	 * Register the life module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\ArmaLife\Providers\RouteServiceProvider');
		
		$this->app->bind(\App\Modules\ArmaLife\Repositories\PlayerRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\PlayerRepository::class);
		$this->app->bind(\App\Modules\ArmaLife\Repositories\VehicleRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\VehicleRepository::class);
		$this->app->bind(\App\Modules\ArmaLife\Repositories\HouseRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\HouseRepository::class);
		$this->app->bind(\App\Modules\ArmaLife\Repositories\ContainerRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\ContainerRepository::class);
		$this->app->bind(\App\Modules\ArmaLife\Repositories\GangRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\GangRepository::class);
		$this->app->bind(\App\Modules\ArmaLife\Repositories\WantedRepository::class, \App\Modules\ArmaLife\Repositories\Eloquent\WantedRepository::class);

		$this->registerNamespaces();
	}

	/**
	 * Register the life module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('life', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('life', base_path('resources/views/vendor/armalife'));
		View::addNamespace('life', realpath(__DIR__.'/../Resources/Views'));
	}

	/**
     * Register any additional module middleware.
     *
     * @param  array|string  $middleware
	 * @return void
     */
	protected function addMiddleware($middleware)
	{
		$kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

		if (is_array($middleware)) {
			foreach ($middleware as $ware) {
				$kernel->pushMiddleware($ware);
			}
		} else {
			$kernel->pushMiddleware($middleware);
		}
	}
}
