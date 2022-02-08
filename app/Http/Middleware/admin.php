<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\auth;

class admin
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
        if (auth::user()->role == 'dir' or auth::user()->role == 'admin') {
            return $next($request);
        } else{
            return redirect('home');
        }

        return redirect('home');
    }
}
