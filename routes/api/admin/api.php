<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\Auth\LoginController;
use App\Http\Controllers\Api\HrAdmin\UserController;

// 認証処理
Route::prefix('auth')->group(function () {
   Route::post('/login', [LoginController::class, 'login']);
   Route::get('logout', [LoginController::class, 'logout']);
});

Route::middleware('auth:api_admin')->group(function () {
   // 認証判定
   Route::get('/user', function () {
       return Auth::user();
   });
});