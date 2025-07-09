<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->prefix('/user')->group(function () {
    Route::post('/register', 'store');
    Route::post('/login', 'create');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
    Route::put('/update-password/{id}', 'updatePassword');
});