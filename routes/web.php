<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResepController;

Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return view('landing');
    });

    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('register', [UserController::class, 'register_action'])->name('register.action');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'login_action'])->name('login.action');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');

    Route::get('forgotpassword', [UserController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('forgotpassword', [UserController::class, 'forgotpassword_action'])->name('forgotpassword.action');
    Route::get('resetpassword/{token}', [UserController::class, 'resetpassword'])->name('resetpassword');
    Route::post('resetpassword', [UserController::class, 'resetpassword_action'])->name('resetpassword.action');

    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/edit', [UserController::class, 'editProfile_action'])->name('profile.edit.action');

    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('detailmenu', [HomeController::class, 'detailmenu'])->name('detailmenu');

    Route::resource('reseps', ResepController::class);
});

