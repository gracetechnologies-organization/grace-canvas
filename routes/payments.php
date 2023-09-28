<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Livewire\Payment\SubscriptionForm;
use App\Http\Livewire\Payment\SubscriptionPlan;
// use App\Http\Livewire\Payment\SubscriptionPost;
// use App\Http\Livewire\Payment\PaymentPlans;
// use App\Http\Livewire\Payment\StripeCheckout;

Route::middleware('auth')->group(function () {
    Route::prefix('payment')->group(function () {
        // Route::get('/plans', PaymentPlans::class)->name('payment.plans')->withoutMiddleware('auth');
        // Route::get('/checkout/{Price}', StripeCheckout::class)->name('plan.checkout');
        // Route::post('/submit-card', [StripeCheckout::class, 'stripePayment'])->name('stripe.card.submit');
        Route::get('/subscription',SubscriptionPlan::class)->name('subscription')->withoutMiddleware('auth');
        Route::get('/subscription/{ID?}',SubscriptionForm::class)->name('subscription.form');
        Route::post('/subscription-create',[SubscriptionController::class, 'create'])->name('subscription.create');
    });
});
