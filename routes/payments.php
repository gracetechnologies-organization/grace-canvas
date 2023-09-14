<?php

use App\Http\Livewire\Payment\PaymentPlans;
use App\Http\Livewire\Payment\StripeCheckout;

Route::middleware('auth')->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('/plans', PaymentPlans::class)->name('payment.plans')->withoutMiddleware('auth');
        Route::get('/checkout/{Price}', StripeCheckout::class)->name('plan.checkout');
        Route::post('/submit-card', [StripeCheckout::class, 'stripePayment'])->name('stripe.card.submit');
        // Route::post('stripePayment', [StripeCheckout::class, 'stripePayment'])->name("stripe.Payment");
    });
});
