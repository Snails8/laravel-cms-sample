<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\NewsController;
use App\Http\Controllers\Ajax\CompanyController;


Route::prefix('news')->group(function () {
    Route::put('/{news}/is_public', [NewsController::class, 'updatePublicStatus']);
});

Route::prefix('companies')->group(function () {
    Route::put('/{company}/is_contract', [CompanyController::class, 'updateContractStatus']);
});