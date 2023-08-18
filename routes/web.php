<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Livewire\EditingForms\CreateResumeForm;
use App\Http\Livewire\Pages\HomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class)->name('home');

Route::prefix('edit')->group(function () {
    Route::get('resume/{ID}', CreateResumeForm::class)->name('edit.resume.form');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require_once __DIR__ . '/terms-of-services.php';

// Route::middleware('admin.guard')->prefix('admin')->group(function () {
//     Route::get('/dashboard', Dashboard::class)->name('admin.index');
//     Route::get('/employees', ManageEmployees::class)->name('admin.employees');
// });