<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    public const HOME_ADMIN = '/admin/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::prefix('admin')
                ->middleware(['web', 'admin'])
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            Route::prefix('ajax')
                ->middleware(['web', 'ajax'])
                ->namespace($this->namespace)
                ->group(base_path('routes/ajax.php'));

            // next-spa(管理画面
            Route::prefix('api/hr_admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/hr_admin/api.php'));

            // nuxt-spa
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/admin/api.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
