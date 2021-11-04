<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HrAdmin\Auth\LoginController;
use App\Http\Controllers\Api\HrAdmin\UserController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::get('/users', [UserController::class, 'getHrUsers']);

Route::middleware('auth:api_hr_admin')->group(function () {
    // 認証判定
    Route::get('/user', function () {
        return Auth::user();
    });

    Route::post('/users/create', [UserController::class, 'create'])->name('hr_admin.user.store');
});