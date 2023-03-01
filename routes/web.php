<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function() {
   // Questions
   Route::get('/questions', [QuestionsController::class, 'index'])->name('questions.index');
   Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
   Route::get('/questions/{id}', [QuestionsController::class, 'show'])->name('questions.show');
   Route::post('/questions/store', [QuestionsController::class, 'store'])->name('questions.store');
   Route::get('/questions/{id}/edit', [QuestionsController::class, 'edit'])->name('questions.edit');
   Route::put('/questions/{id}/update', [QuestionsController::class, 'update'])->name('questions.update');

   // Answers
   Route::post('/answers/{questionId}/store', [AnswersController::class, 'store'])->name('answers.store');
   Route::post('/answers/{answerId}/update', [AnswersController::class, 'update'])->name('answers.update');
   Route::delete('/answers/{answerId}/delete', [AnswersController::class, 'destroy'])->name('answers.destroy');
});

require __DIR__.'/auth.php';
