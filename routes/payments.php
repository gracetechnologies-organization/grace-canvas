<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Livewire\Payment\PaymentPlans;
use App\Http\Livewire\Payment\StripeCheckout;
use App\Http\Livewire\Payment\SubscriptionPlan;
use App\Http\Livewire\Payment\SubscriptionPost;

Route::middleware('auth')->group(function () {
    Route::prefix('payment')->group(function () {
        Route::get('/plans', PaymentPlans::class)->name('payment.plans')->withoutMiddleware('auth');
        Route::get('/checkout/{Price}', StripeCheckout::class)->name('plan.checkout');
        Route::post('/submit-card', [StripeCheckout::class, 'stripePayment'])->name('stripe.card.submit');
        Route::get('/subscription',SubscriptionPlan::class)->name('subscription')->withoutMiddleware('auth');
        Route::get('/subscription/{ID?}',SubscriptionPost::class)->name('subscription.post');
        // Route::post('/stripePayment', [StripeCheckout::class, 'stripePayment'])->name("stripe.Payment")
        Route::post('/subscription-create',[SubscriptionController::class, 'create'])->name('subscription.form');
    });
});
