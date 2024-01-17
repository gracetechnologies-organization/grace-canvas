<?php

namespace App\Providers;

use app\Contracts\DefaultMethods;
use App\Models\TestModel;
use App\Models\TestModel2;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\User;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DefaultMethods::class, function ($app) {
            return new TestModel2();
        });

        $this->app->bind(DefaultMethods::class, function ($app) {
            return new TestModel();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('macroJson', function (array $Data = [], int $Success = null, string $Message = '', int $HttpCode = 500) {
            return Response::make([
                'data' => $Data,
                'success' => $Success,
                'message' => $Message
            ], $HttpCode);
        });

        Response::macro('macroJsonExtention', function (array $Data = [], string $ExtentionKey, array $ExtentionData, int $Success = null, string $Message = '', int $HttpCode = 500) {
            return Response::make([
                'data' => $Data,
                $ExtentionKey => $ExtentionData,
                'success' => $Success,
                'message' => $Message
            ], $HttpCode);
        });

        Response::macro('macroView', function (string $View, int $HttpCode = 500, array $ContentType) {
            return Response::make($View, $HttpCode, $ContentType);
        });
    }
}
