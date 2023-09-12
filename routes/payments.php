<?php

use App\Http\Livewire\Payment\PaymentPlans;

Route::middleware('auth')->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('/plans', PaymentPlans::class)->name('payment.plans')->withoutMiddleware('auth');
    });
});
