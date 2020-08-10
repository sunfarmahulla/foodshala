<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class customarOnly
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
        if (Auth::user() &&  Auth::user()->user_type=='basic'){
            return $next($request);
        }
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return redirect('/login')->with('error','you are not authorized to access this page');
    }
}
