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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'faturlms');

        // Add package's migration
        // $this->loadMigrationsFrom(__DIR__.'/../migrations');
	}

    /**
     * Register the application services.
     */
    public function register()
    {
        // Load helpers
        // $this->loadHelpers();
        
        // Load commands
        // $this->commands(Commands\MainCommand::class);
        // $this->commands(Commands\InstallCommand::class);
        // $this->commands(Commands\UpdateCommand::class);

        if($this->app->runningInConsole()){
            // Register publishable resources
            $this->registerPublishableResources();

            // Register view resources
            // $this->registerViewResources();
        }

        // Register schedule
        // $this->app->singleton('ajifatur.faturcms.console.kernel', function($app) {
        //     $dispatcher = $app->make(\Illuminate\Contracts\Events\Dispatcher::class);
        //     return new \Ajifatur\FaturCMS\Console\Kernel($app, $dispatcher);
        // });
        // $this->app->make('ajifatur.faturcms.console.kernel');
    }

    /**
     * Load helpers.
     * 
	 * @return void
     */
    protected function loadHelpers()
    {
        // Load helpers from FaturLMS
        foreach(glob(__DIR__.'/Helpers/*.php') as $filename){
            require_once $filename;
        }

        // Load helpers from FaturHelper
        if(File::exists(base_path('vendor/ajifatur/faturhelper/src'))){
            foreach(glob(base_path('vendor/ajifatur/faturhelper/src').'/Helpers/*.php') as $filename){
                require_once $filename;
            }
        }
    }

    /**
     * Register the publishable files.
     * 
	 * @return void
     */
    private function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__).'/publishable';

        $publishable = [
            // 'assets' => [
            //     "{$publishablePath}/assets" => public_path('assets'),
            // ],
            'templates' => [
                "{$publishablePath}/templates" => public_path('templates'),
            ],
            // 'seeds' => [
            //     "{$publishablePath}/seeds" => database_path('seeds'),
            // ],
            // 'config' => [
            //     "{$publishablePath}/config/faturcms.php" => config_path('faturcms.php'),
            // ],
            // 'exception' => [
            //     "{$publishablePath}/exceptions/Handler.php" => app_path('Exceptions/Handler.php'),
            // ],
            // 'userModel' => [
            //     "{$publishablePath}/models/User.php" => app_path('User.php'),
            // ],
        ];

        foreach($publishable as $group => $paths){
            $this->publishes($paths, $group);
        }
    }
}