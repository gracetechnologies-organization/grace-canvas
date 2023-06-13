<?php

use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\LetterHeadController;
use App\Http\Controllers\TemplatesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $req) {
    return $req->user();
});

Route::middleware('auth.api.reqs')->group(function () {

    Route::prefix('template')->group(function () {
        Route::post('/upload', [TemplatesController::class, 'store']);
    });
           
    Route::prefix('business-card')->group(function () {
        // 
        Route::get('/templates', [BusinessCardController::class, 'show']);
        // 
        Route::post('/create/{CardSide}', [BusinessCardController::class, 'create']);
        Route::post('/edit/{CardID}', [BusinessCardController::class, 'edit']);
        Route::post('/destroy/{CardID}', [BusinessCardController::class, 'destroy']);
    });

    Route::prefix('letter-head')->group(function () {
        Route::post('/create', [LetterHeadController::class, 'create']);
    });

    Route::get('collections-testing', [LetterHeadController::class, 'collectionsTestCode']);

});


// fallback for 404 URL's
Route::fallback(function () {
    return response()->json(
        [
            'data' => [],
            'success' => 0,
            'message' => 'Invalid Route, No API found against this URL. In case if you have declared a new route but still it\'s NOT FOUND then please reset the route cache of your application.'
        ],
        404
    );
});
