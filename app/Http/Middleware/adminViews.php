<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\support\Facades\auth;

class adminViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (auth::guest()) {
            return redirect('login');
        }
        $user = auth::user()->role;

    if ($user =='user'){
        return redirect('home');
    }elseif($user == 'dir'){
        return redirect('home-administration/post');
    }elseif($user == 'admin'){
        return redirect('home-profesor/post');
    }
}
}