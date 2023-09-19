<?php

use App\Http\Livewire\EditingForms\CreateResumeForm;
use App\Http\Livewire\SavedTemplates\SavedResumes;

Route::prefix('edit')->group(function () {
    Route::get('/resume/{ID}', CreateResumeForm::class)->name('edit.resume.form');
    Route::get('/saved/resume/{ID}', SavedResumes::class)->name('edit.saved.resume');
});
