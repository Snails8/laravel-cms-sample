<?php

namespace App\Providers;

use App\Repositories\Admin\User\UserRepository;
use App\Repositories\Admin\User\UserRepositoryInterface;
use App\Repositories\Admin\News\NewsRepository;
use App\Repositories\Admin\News\NewsRepositoryInterface;
use App\Repositories\Admin\NewsCategory\NewsCategoryRepository;
use App\Repositories\Admin\NewsCategory\NewsCategoryRepositoryInterface;
use App\Repositories\Admin\Company\CompanyRepository;
use App\Repositories\Admin\Company\CompanyRepositoryInterface;
use Illuminate\Support\ServiceProvider;


/**
 * リポジトリを登録する
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Admin
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(NewsCategoryRepositoryInterface::class, NewsCategoryRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
