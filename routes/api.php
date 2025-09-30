<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonClassController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\RepoController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::get('/','index' )->middleware('auth:sanctum');;
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
    Route::delete('/delete/{id}', 'destroy');
});
Route::controller(ArticleController::class)->prefix('/articles')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});
Route::controller(AttendanceController::class)->middleware('auth:sanctum')->prefix('/attendance')->group(function () {
    Route::get('/', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});
Route::get('/repository', [RepoController::class,'repo']);
Route::controller(RepoController::class)->prefix('/repo')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});
Route::controller(LessonClassController::class)->middleware('auth:sanctum')->prefix('/classlessons')->group(function () {
    Route::get('/', 'index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});
Route::controller(ChurchController::class)->prefix('/churches')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store')->middleware('auth:sanctum');
    Route::put('/update/{id}', 'update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', 'delete')->middleware('auth:sanctum');
    Route::get('/show/{id}', 'show');
});