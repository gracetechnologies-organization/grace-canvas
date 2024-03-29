<?php

use App\Http\Controllers\BirthdayCakeController;
use App\Http\Controllers\BirthdayTemplatesController;
use App\Http\Controllers\BusinessCardController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClockWallpaperController;
use App\Http\Controllers\FontsController;
use App\Http\Controllers\LetterHeadController;
use App\Http\Controllers\ParentCategoryController;
use App\Http\Controllers\PhotoCollageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\WallpaperController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\TestModelController;
use App\Models\ParentCategory;
use App\Models\TestModel;
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

    Route::prefix('parent-category')->group(function () {
        Route::post('/create', [ParentCategoryController::class, 'create']);
        Route::post('/edit/{ID}', [ParentCategoryController::class, 'edit']);
        Route::post('/destroy/{ID}', [ParentCategoryController::class, 'destroy']);
        Route::post('/restore/{ID?}', [ParentCategoryController::class, 'restore']);
        Route::get('/show/{ID?}', [ParentCategoryController::class, 'show']);
    });

    Route::prefix('category')->group(function () {
        Route::post('/create', [CategoryController::class, 'create']);
        Route::post('/edit/{ID}', [CategoryController::class, 'edit']);
        Route::post('/destroy/{ID}', [CategoryController::class, 'destroy']);
        Route::get('/show/{ID?}/{ParentCatID?}', [CategoryController::class, 'show']);
    });

    Route::prefix('template')->group(function () {
        Route::prefix('upload')->group(function () {
            Route::post('/', [TemplatesController::class, 'store']);
            Route::post('/bulk/wallpapers', [TemplatesController::class, 'storeBulkWallpapers']);
        });
        Route::prefix('show')->group(function () {
            Route::get('/business-cards', [TemplatesController::class, 'showBusinessCards']);
            Route::get('/letter-heads', [TemplatesController::class, 'showLetterHeads']);
            Route::get('/resumes', [TemplatesController::class, 'showResumes']);
            Route::get('/birthday-templates/{ID?}', [TemplatesController::class, 'birthdayTemplates']);
            Route::get('/wallpapers/{CatID?}', [TemplatesController::class, 'showWallpapers']);
            Route::get('/category/wallpapers/{CatID?}', [TemplatesController::class, 'showCategoriesWallpapers']);
        });
    });

    Route::prefix('business-card')->group(function () {
        Route::post('/create/{CardSide}', [BusinessCardController::class, 'create']);
        Route::post('/edit/{CardID}', [BusinessCardController::class, 'edit']);
        Route::post('/destroy/{CardID}', [BusinessCardController::class, 'destroy']);
    });

    Route::prefix('letter-head')->group(function () {
        Route::post('/create', [LetterHeadController::class, 'create']);
        Route::post('/edit/{ID}', [LetterHeadController::class, 'edit']);
        Route::post('/destroy/{ID}', [LetterHeadController::class, 'desroy']);
    });

    Route::prefix('resume')->group(function () {
        Route::post('/create', [ResumeController::class, 'create']);
        Route::post('/edit/{ID}', [ResumeController::class, 'edit']);
        Route::post('/destroy', [ResumeController::class, 'destroy']);
        Route::get('/destroy/all', [ResumeController::class, 'destroy']);
        Route::post('/restore/{ID?}', [ResumeController::class, 'restore']);
    });

    Route::prefix('wallpaper')->group(function () {
        Route::post('/edit/{ID}', [WallpaperController::class, 'edit']);
        Route::post('/destroy/{ID}', [WallpaperController::class, 'destroy']);
        Route::post('/destroy/{CatID}/{Type}', [WallpaperController::class, 'destroy']);
        Route::post('/restore/{ID}', [WallpaperController::class, 'restore']);
        Route::post('/restore/{CatID}/{Type}', [WallpaperController::class, 'restore']);
    });

    Route::prefix('clock/wallpaper/v1')->group(function () {
        Route::post('/upload/bulk', [ClockWallpaperController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [ClockWallpaperController::class, 'edit']);
        Route::post('/destroy/{ID?}', [ClockWallpaperController::class, 'destroy']);
        Route::post('/destroy/{CatID?}', [ClockWallpaperController::class, 'destroy']);
        Route::post('/restore/{ID}', [ClockWallpaperController::class, 'restore']);
        Route::post('/restore/{CatID}/{Type}', [ClockWallpaperController::class, 'restore']);
        Route::get('/show/{CatID?}', [ClockWallpaperController::class, 'show']);
        // Route::get('/show/category/wallpapers/{CatID?}', [ClockWallpaperController::class, 'showCategoriesWallpapers']);
    });

    Route::prefix('birthday-template')->group(function () {
        Route::post('/upload', [BirthdayTemplatesController::class, 'upload']);
        Route::post('/upload/bulk', [BirthdayTemplatesController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [BirthdayTemplatesController::class, 'edit']);
        Route::post('/destroy/{ID?}', [BirthdayTemplatesController::class, 'destroy']);
        Route::post('/restore/{ID?}', [BirthdayTemplatesController::class, 'restore']);
    });

    Route::prefix('birthday-cake')->group(function () {
        Route::post('/upload', [BirthdayCakeController::class, 'upload']);
        Route::post('/upload/bulk', [BirthdayCakeController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [BirthdayCakeController::class, 'edit']);
        Route::post('/destroy/{ID?}', [BirthdayCakeController::class, 'destroy']);
        Route::post('/restore/{ID?}', [BirthdayCakeController::class, 'restore']);
        Route::get('/show/{ID?}', [BirthdayCakeController::class, 'show']);
    });
    
    Route::prefix('sticker')->group(function () {
        Route::post('/upload', [StickerController::class, 'upload']);
        Route::post('/upload/bulk', [StickerController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [StickerController::class, 'edit']);
        Route::post('/destroy/{ID?}', [StickerController::class, 'destroy']);
        Route::post('/restore/{ID?}', [StickerController::class, 'restore']);
        Route::get('/show/{ID?}', [StickerController::class, 'show']);
    });

    Route::prefix('font')->group(function () {
        Route::post('/upload', [FontsController::class, 'upload']);
        Route::post('/upload/bulk', [FontsController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [FontsController::class, 'edit']);
        Route::post('/destroy/{ID?}', [FontsController::class, 'destroy']);
        Route::post('/restore/{ID?}', [FontsController::class, 'restore']);
        Route::get('/show/{ID?}', [FontsController::class, 'show']);
    });

    Route::prefix('photo-collage')->group(function () {
        Route::post('/upload', [PhotoCollageController::class, 'upload']);
        Route::post('/upload/bulk', [PhotoCollageController::class, 'uploadBulk']);
        Route::post('/edit/{ID}', [PhotoCollageController::class, 'edit']);
        Route::delete('/destroy/{ID?}', [PhotoCollageController::class, 'destroy']);
        Route::post('/restore/{ID?}', [PhotoCollageController::class, 'restore']);
        Route::get('/show/{ID?}', [PhotoCollageController::class, 'show']);
    });

    Route::prefix('cache')->group(function () {
        Route::post('/destroy', [CacheController::class, 'destroy']);
    });

    Route::prefix('test')->group(function () {

        Route::get('/contracts', [TestModelController::class, 'show'])->withoutMiddleware('auth.api.reqs');
        Route::get('/contracts/birthday_templates', [TestModelController::class, 'showBirthdayTemplates'])->withoutMiddleware('auth.api.reqs');

    });

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
