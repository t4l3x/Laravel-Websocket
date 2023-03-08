<?php

namespace App\Providers;

use App\Services\Currency\MonobankApiService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MonobankApiService::class, function ($app) {
            $apiUrl = $app['config']['services.monobank.url']; // retrieve apiUrl from .env file
            $httpClient = new Client();
            return new MonobankApiService($apiUrl, $httpClient);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
