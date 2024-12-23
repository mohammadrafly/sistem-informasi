<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', function () {
            return view('pages.auth.login', ['title' => 'Login']);
        })->name('page.login');
        Route::get('/register', function () {
            return view('pages.auth.register', ['title' => 'Register']);
        })->name('page.register');
        Route::get('/forgot-password', function () {
            return view('pages.auth.forgot-password', ['title' => 'Forgot Password']);
        })->name('page.forgot-password');
        Route::get('/reset-password', function () {
            return view('pages.auth.reset-password', ['title' => 'Reset Password']);
        })->name('page.reset-password');

        Route::post('/', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
        Route::post('/forgot-password', 'forgotPassword')->name('password.request');
        Route::post('/reset-password/{token}', 'resetPassword')->name('password.reset');
    });
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home');
    })->middleware(['auth'])->name('verification.verify');
});

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard', ['title' => 'Dashboard']);
    })->name('dashboard.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
