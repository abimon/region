<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
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
Route::resources([
    'articles'=> ArticleController::class,
    'lessons'=>LessonController::class,
]);