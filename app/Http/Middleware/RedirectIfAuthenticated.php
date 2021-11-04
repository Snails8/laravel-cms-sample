<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * login 状態の場合、どこに飛ばすか
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $redirectTo = '/';
        $prefix = $request->segment(1);

        switch ($prefix) {
            case 'admin':
                $guard = 'admin';
                $redirectTo = '/admin/home';
                break;
            default:
                $guard = 'member';
                $redirectTo = '/';
                break;
        }

        if (Auth::guard($guard)->check()) {
            return redirect($redirectTo);
        }
        return $next($request);
    }

    // マルチ認証でないときは元である以下の処理を使用する
//    public function handle(Request $request, Closure $next, ...$guards)
//    {
//        $guards = empty($guards) ? [null] : $guards;
//
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME_ADMIN);
//            }
//        }
//        return $next($request);
//    }
}
