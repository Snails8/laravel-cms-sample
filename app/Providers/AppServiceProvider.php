<?php

namespace App\Providers;

use App\Services\CompanyService;
use App\Services\UtilityService;
use App\Services\Admin\UserService as AdminUserService;
use App\Services\Admin\NewsService as AdminNewsService;
use App\Services\Admin\CompanyService as AdminCompanyService;
use App\Services\Admin\NewsCategoryService as AdminNewsCategoryService;
use App\Services\Api\HrAdmin\UserService as HrAdminUserService;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('utility', UtilityService::class);
        $this->app->bind('company', CompanyService::class);
        // admin
        $this->app->bind('AdminUser', AdminUserService::class);
        $this->app->bind('AdminNews', AdminNewsService::class);
        $this->app->bind('AdminCompany', AdminCompanyService::class);
        $this->app->bind('AdminNewsCategory', AdminNewsCategoryService::class);
        // HrAdmin
        $this->app->bind('hrUser', HrAdminUserService::class);
    }

    /**
     *
     * Bootstrap any application services.
     *
     * @param UrlGenerator $url
     * @return void
     */
    public function boot(UrlGenerator $url): void
    {
        // Laravel8.xからデフォルトのページネーターのCSSが変わったのでBootStrapを指定しておく。
        Paginator::useBootstrap();

        // 本番環境でHerokuの通信プロトコルがhttpになってしまい、ファイルの読み込みやformに問題が発生するためhttpsに変更
        if (env('APP_SCHEME') === 'https') {
            $url->forceScheme('https');
            $this->app['request']->server->set('HTTPS', 'on');
        }
    }
}
