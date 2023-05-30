<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('macroJson', function ($data = [], $success = null, $message = '', $http_code = 500) {
            return Response::make([
                'data' => $data,
                'success' => $success,
                'message' => $message
            ], $http_code);
        });
    }
}
