<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolutionController;
use App\Models\Solution;
use Illuminate\Support\Facades\Route;

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

/* ROTAS DAS SOLUTIONS */
Route::get('/solutions', [SolutionController::class, 'index'])
        ->middleware('auth');

Route::get('/solutions/{id}', [SolutionController::class, 'show'])
        ->name('solutions.show')
        ->middleware('auth');

Route::get('/solutions/create', [SolutionController::class, 'create'])
        ->middleware('auth');

Route::get('/solutions/edit/{id}', [SolutionController::class, 'edit'])
        ->name('solutions.edit')
        ->middleware('auth');

Route::post('/solutions', [SolutionController::class, 'store'])
        ->middleware('auth');

Route::post('/solutions', [SolutionController::class, 'update'])
    ->name('solutions.update')
    ->middleware('auth');

require __DIR__.'/auth.php';
