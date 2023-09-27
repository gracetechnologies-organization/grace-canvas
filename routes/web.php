<?php

use App\Http\Controllers\languageController;
use App\Http\Livewire\EditingForms\CreateResumeForm;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

Route::get('/', function () {
    //return \Inertia\:render('ExamplePage');
    return Inertia::render('ExamplePage');
    });


Route::get('/blade-template/countries', function(){
    return view('components.countries');
}); 


Route::get('/config/experiences_limit', function(){
    return config('messages.EXPERIENCES_LIMIT_REACHED');
});

// Route::prefix('edit')->group(function () {
//     Route::get('resume/{ID}', CreateResumeForm::class)->name('edit.resume.form');
// });

// Route::get('/change', [languageController::class,'change'])->name('changeLang');

// require_once __DIR__ . '/front-pages.php';
// require_once __DIR__ . '/auth.php';
// require_once __DIR__ . '/user.php';
// require_once __DIR__ . '/dashboard.php';
// require_once __DIR__ . '/terms-of-services.php';
// require_once __DIR__ . '/payments.php';





