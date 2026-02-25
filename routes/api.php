<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChurchClassController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MreqController;
use App\Http\Controllers\RepoController;
use App\Http\Controllers\UserController;
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
    Route::get('/getUser','getUser')->middleware('auth:sanctum');
    Route::put('/update-password/{id}', 'updatePassword');
    Route::get('/stats','stats');
});
Route::controller(HomeController::class)->middleware('auth:sanctum')->group(function () {
    Route::post('/dashboard/{role}','dashboard');
});
Route::controller(LessonController::class)->middleware('auth:sanctum')->prefix('/lessons')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
    Route::get('/show/{id}', 'show');
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
Route::controller(ChurchController::class)->prefix('/churches')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store')->middleware('auth:sanctum');
    Route::put('/update/{id}', 'update')->middleware('auth:sanctum');
    Route::delete('/delete/{id}', 'delete')->middleware('auth:sanctum');
    Route::get('/show/{id}', 'show');
});
Route::controller(MreqController::class)->prefix('/mrequests')->middleware('auth:sanctum')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(ChurchClassController::class)->prefix('/classes')->middleware('auth:sanctum')->group(function () {
    Route::get('/','index');
    Route::post('/store', 'store');
    Route::get('/show/{id}', 'show');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
    Route::get('/club-members/{id}', 'getMembers');
});