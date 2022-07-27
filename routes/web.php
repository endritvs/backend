<?php

use Illuminate\Support\Facades\Route;
use App\Models\interviewee_types;
use App\Http\Controllers\IntervieweeTypesController;
use App\Http\Controllers\Interviewee_AttributesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/interviewee', function () {
    return view('intervieweeComponents/table');
});

Route::get('/interviewee-attributes', function () {
    return view('intervieweeAttributesComponents/table');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('interviewee')->group(function () {

    Route::get('/', [IntervieweeTypesController::class, 'index'])->name('interviewee.index');
    Route::get('/edit-interviewee/{id}', [IntervieweeTypesController::class, 'edit'])->name('interviewee.edit');
    Route::post('/update-interviewee/{id}', [IntervieweeTypesController::class, 'update'])->name('interviewee.update');
    Route::get('/destroy/{id}', [IntervieweeTypesController::class, 'destroy'])->name('interviewee.destroy');
    Route::get('/show', [IntervieweeTypesController::class, 'show'])->name('interviewee.show');
    Route::get('/create', [IntervieweeTypesController::class, 'create'])->name('interviewee.create');
    Route::post('/store-interviewee', [IntervieweeTypesController::class, 'store'])->name('interviewee.store');
});

Route::prefix('interviewee-attributes')->group(function () {
    Route::get('/', [Interviewee_AttributesController::class, 'index'])->name('interviewee-attributes.index');
});



require __DIR__ . '/auth.php';