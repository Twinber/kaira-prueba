<?php

namespace App\Providers;

use App\Services\TokenValidator\CustomTokenValidator;
use App\Services\TokenValidator\TokenValidatorInterface;
use App\Services\UrlShortener\TinyUrlShortenerService;
use App\Services\UrlShortener\UrlShortenerInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UrlShortenerInterface::class, TinyUrlShortenerService::class);
        $this->app->bind(TokenValidatorInterface::class, CustomTokenValidator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
