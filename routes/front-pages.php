<?php

use App\Http\Livewire\Pages\HomePage;
use App\Http\Livewire\Pages\ResumeTemplates;

Route::get('/', HomePage::class)->name('home');
Route::prefix('templates')->group(function () {
    Route::get('resume', ResumeTemplates::class)->name('templates.resume');
});


Route::get('/create-birthday-template', function () {
    return view('create-birthday-template');
});
