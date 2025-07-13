<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::post('/register', 'store');
    Route::post('/login', 'create');
    Route::post('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
    Route::put('/update-password/{id}', 'updatePassword');
});
Route::controller(LessonController::class)->prefix('/lessons')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
    Route::get('/show/{id}', 'show');
});
Route::controller(EnrollmentController::class)->prefix('/enrollments')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    ROute::get('show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});
Route::controller(ArticleController::class)->prefix('/articles')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});