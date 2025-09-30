<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Assessor;
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
    Route::get('/profile', function () {
        $user = Auth::user();
        return view('user.profile',compact('user'));
    });
    Route::resources([
        'articles' => ArticleController::class,
        'lessons' => LessonController::class,
        'enrollments'=>EnrollmentController::class,
        'users'=>UserController::class,
        'churches'=>ChurchController::class,

    ]);
    Route::middleware(Assessor::class)->group(function(){
        Route::resources([
            'exams'=>ExamController::class,
        ]);
    });
});
