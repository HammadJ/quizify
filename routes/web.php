<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;

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

    Route::get('create-quiz', [QuizController::class, 'create']);
    Route::post('store-quiz', [QuizController::class, 'store']);
    Route::get('index-quiz', [QuizController::class, 'index']);
    Route::get('show-quiz/{quiz}', [QuizController::class, 'show']);
    Route::get('edit-quiz/{quiz}', [QuizController::class, 'edit']);
    Route::get('update-quiz/{quiz}', [QuizController::class, 'update']);
    Route::get('delete-quiz/{quiz}', [QuizController::class, 'destroy']);

    Route::get('userIndex-quiz', [QuizController::class, 'userIndex']); // show all quiz to user
    Route::get('userShow-quiz/{quiz}', [QuizController::class, 'userShow']); // start quiz of user
    
    Route::get('showHistory/{quiz}', [ScoreController::class, 'history']);

    // Route::post('view-question', [QuestionController::class, 'index']);
    Route::get('create-question/{quiz}', [QuestionController::class, 'create']);
    Route::post('store-question', [QuestionController::class, 'store']);
    Route::get('edit-question/{question}', [QuestionController::class, 'edit']);
    Route::get('delete-question/{question}', [QuestionController::class, 'destroy']);
    Route::get('update-question/{question}', [QuestionController::class, 'update']);

    Route::get('index-score', [ScoreController::class, 'index']);
    Route::get('cal-score', [ScoreController::class, 'calScore']);
    Route::get('store-score/{data}', [ScoreController::class, 'store']);
    Route::get('leaderboard', [ScoreController::class, 'leaderboard']);

});

require __DIR__ . '/auth.php';
