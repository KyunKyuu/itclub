<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessUser
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
        if (uriSegment() === 200) {
            return $next($request);
        } else if (uriSegment() === 300) {
            return redirect('error/exception/300');
        } else if (uriSegment() === 403) {
            return redirect('error/exception/403');
        } else if (uriSegment() === 502) {
            return redirect('error/exception/502');
        } else {
            return redirect('error/exception/404');
        }

        return $next($request);
    }
}
