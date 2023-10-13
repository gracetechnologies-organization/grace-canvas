<?php

use App\Http\Livewire\FrontPages\HomePage;
use App\Http\Livewire\FrontPages\ResumeTemplates;

// Route::get('/', HomePage::class)->name('home');

Route::get('/', function () {
    return "Grace Canvas has been moved to onlineresumaker";
});

Route::prefix('templates')->group(function () {
    Route::get('/resume', ResumeTemplates::class)->name('templates.resume');
});
