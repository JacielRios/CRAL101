<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class administration
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
        if (auth::user()->role == 'dir') {
            return $next($request);
        } elseif(auth::user()->role == 'user'){
            return redirect('home');
        }else{
            return redirect('home-profesor/post');
        }
    }
}
