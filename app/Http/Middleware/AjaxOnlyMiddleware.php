<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AjaxOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax() === true) {
            return $next($request);
        } else {
            abort(404, 'is not ajax!');
        }
    }
}
