<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    // Route::get('/', 'index');
    Route::get('/dashboard','dashboard')->middleware('auth');
});
Route::middleware('auth')->group(function () {
    Route::resources([
        'articles' => ArticleController::class,
        'lessons' => LessonController::class,
        'enrollmets'=>EnrollmentController::class
    ]);
});