<?php
use App\Http\Controllers\FrontEndController;
use App\Http\Livewire\EditingForms\CreateResumeForm;
use App\Http\Livewire\Pages\HomePage;
use App\Http\Controllers\ProfileController;
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

Route::get('smart-resume-maker/terms-of-services', function () {
    return view('terms_of_services.smart-resume-maker-terms-of-use');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
