<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


/**
 * 管理画面の認証設定(Standard)
 * Class AdminAuthStandardMiddleware
 * @package App\Http\Middleware
 */
class AdminAuthStandardMiddleware
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
        if(Auth::guard('admin')->user()->role === 'Master' || Auth::guard('admin')->user()->role === 'Standard') {

            return $next($request);

        } else {
            abort(403,'Access is not allowed.');
        }
    }
}
