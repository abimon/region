<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\ClassMemberController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Assessor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;

Route::get('/', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::post('/contact', 'contact');
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
        'users'=>UserController::class,
        'churches'=>ChurchController::class,
    ]);
    Route::middleware(Assessor::class)->group(function(){
        Route::resources([
            'exams'=>ExamController::class,
        ]);
    });
    Route::controller(ClassMemberController::class)->prefix('/members')->group(function () {
        Route::get('/{id}', 'index');
        Route::get('/{id}/show', 'show');
        Route::get('/{id}/create', 'create');
        Route::post('/{id}/store', 'store');
        Route::get('/{id}/edit/{classMember}', 'edit');
    });
    Route::get('/sendUserEmail/{id}',[ExamController::class,'sendUserEmail']);
});

Route::get('/download-app',function(){
    return Redirect::to('https://play.google.com/store/apps/details?id=com.masterguide');
});
Route::get('/certs', function () {
    return view('certificate');
});