<?php
use App\Http\Livewire\Pages\HomePage;
use App\Http\Livewire\Pages\ResumeTemplates;
use App\Http\Livewire\UserDashboard\UserDashboard;
use App\Http\Livewire\UserDashboard\UserDashboardHome;
use App\Http\Livewire\UserDashboard\UserDashboardSettings;
use App\Http\Livewire\UserDashboard\UserDashboardTemplates;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::middleware('auth')->prefix('dashboard')->group(function () {
        Route::get('/', UserDashboard::class)->name('user.dashboard');
        Route::get('/home', UserDashboardHome::class)->name('user.dashboard.home');
        Route::get('/settings', UserDashboardSettings::class)->name('user.dashboard.settings');
        Route::get('/templates',UserDashboardTemplates::class)->name('user.dashboard.templates');
    });
});
