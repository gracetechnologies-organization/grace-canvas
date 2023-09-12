<?php

use App\Http\Livewire\EditingForms\CreateResumeForm;
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

// Route::get('/', function () {

//     dd('hello');
// })->name('home2');

Route::prefix('edit')->group(function () {
    Route::get('resume/{ID}', CreateResumeForm::class)->name('edit.resume.form');
});



require_once __DIR__ . '/front-pages.php';
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/user.php';
require_once __DIR__ . '/dashboard.php';
require_once __DIR__ . '/terms-of-services.php';
require_once __DIR__ . '/payments.php';
