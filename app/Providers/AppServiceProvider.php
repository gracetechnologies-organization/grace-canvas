<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;

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
        
        // The following function is used to translate the whole app according to the given language
        $this->app->bind('googleTranslator', function ($App, $Parameters) {
            // If the langugae == English then we don't need to translate
            if ($Parameters['lang'] === 'en') return $Parameters['string'];
            // Otherwise we will run the Google translator
            return GoogleTranslate::trans($Parameters['string'], $Parameters['lang']);
        });
    }
}
