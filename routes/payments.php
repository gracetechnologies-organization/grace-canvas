<?php

use App\Http\Livewire\Payment\PaymentPlans;
use App\Http\Livewire\Payment\StripeCheckout;

Route::middleware('auth')->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('/plans', PaymentPlans::class)->name('payment.plans')->withoutMiddleware('auth');
        Route::get('/checkout/{Plan}', StripeCheckout::class)->name('plan.checkout');
        Route::post('subscription', [StripeCheckout::class, 'subscription'])->name("subscription.create");
    });
});
