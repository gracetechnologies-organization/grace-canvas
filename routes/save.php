<?php

use App\Http\Controllers\SaveResumePageController;

Route::prefix('save')->group(function () {
    Route::post('/resume', [SaveResumePageController::class, 'save'])->name('save.resume');
});
