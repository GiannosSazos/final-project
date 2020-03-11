<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessHasRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->restaurant_name !=null){
            return $next($request);
        }
        return redirect('home');
    }
}
