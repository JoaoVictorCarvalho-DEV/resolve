<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SolutionController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('solutions', SolutionController::class);

Route::resource('comments', CommentController::class);

Route::resource('tags', TagController::class);

Route::resource('likes', LikeController::class);

