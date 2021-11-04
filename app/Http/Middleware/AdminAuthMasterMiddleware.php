<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * 管理画面の認証設定(Master)
 * Class AdminAuthMasterMiddleware
 * @package App\Http\Middleware
 */
class AdminAuthMasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed|void
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')->user()->role === 'Master') {

            return $next($request);

        } else {
            abort(403,'Access is not allowed.');
        }
    }
}