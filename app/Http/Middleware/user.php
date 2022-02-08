<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\auth;

use function PHPUnit\Framework\isNull;

class user
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
        if (auth::guest()) {
            return redirect('login');
        }
        if (auth::user()->role == 'user') {
            return $next($request);
        }

        return redirect('home-profesor/post');
    }
}
