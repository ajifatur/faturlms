<?php

namespace Ajifatur\FaturLMS;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class FaturLMSServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any package services.
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
		// Add package's view
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'faturcms');

        // Add package's migration
        // $this->loadMigrationsFrom(__DIR__.'/../migrations');
	}
}