<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\UsageCaseController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\HrCompanyController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    // サービス利用会社管理
    Route::resource('hr_companies', HrCompanyController::class)->names('admin.hr_company');

    // お知らせ管理
    Route::resource('news', NewsController::class)->except([
        'show',
    ])->names('admin.news');

    // お知らせカテゴリ管理
    Route::resource('news_categories', NewsCategoryController::class)->except([
        'show',
    ])->names('admin.news_category');

    // 導入事例 (スタイルなし/ 使用するときに組んでください)
    Route::resource('usage_cases', UsageCaseController::class )->except([
        'show'
    ])->names('admin.usage_case');

    // 自社情報管理
    Route::resource('companies', CompanyController::class)->only([
        'edit', 'update'
    ])->names('admin.company');

    // 事務所管理
    Route::resource('offices', OfficeController::class)->except([
        'show'
    ])->names('admin.office');

    // ユーザー管理(スタッフ)
    Route::resource('users', UserController::class)->except([
        'show'
    ])->names('admin.user');

    // お問い合わせ管理
    Route::resource('contacts', ContactController::class)->only([
        'index', 'show', 'edit'
    ])->names('admin.contact');

    // Standard 認証
    Route::middleware('admin.standard')->group(function() {

    });

    // Master 認証
    Route::middleware('admin.master')->group(function() {

    });
});

