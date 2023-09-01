<?php
use App\Http\Livewire\Pages\HomePage;
use App\Http\Livewire\Pages\ResumeTemplates;
use App\Http\Livewire\UserDashboard\UserDashboard;
use App\Http\Livewire\UserDashboard\UserDashboardHome;

Route::prefix('user')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', UserDashboard::class)->name('user.dashboard');
    });
});
