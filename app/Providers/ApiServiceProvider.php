<?php

namespace App\Providers;

use App\Apis\FootballApi;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('api_resource', function ($app) {
			$base_path = config('services.football_api.base_path');

			return new FootballApi($base_path);
        });
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
