<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use App\Models\Cashier\User;
use Laravel\Cashier\Cashier;

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

        Cashier::useCustomerModel(User::class);
    }
}
