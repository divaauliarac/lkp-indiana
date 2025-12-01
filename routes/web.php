<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\inctructorsController;
use App\Http\Controllers\instructorController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\SubjectController;
use App\Models\siswa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('web');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    //Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/dashboard', dashboardController::class);

    Route::resource('siswa', siswaController::class);

    Route::resource('instructor', instructorController::class);

    Route::resource('subject', SubjectController::class);

    Route::get('siswa-export', [siswaController::class, 'export'])->name('siswa-export');

    Route::get('instructor-export', [instructorController::class, 'export'])->name('instructor-export');
});
