<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class adminchecker
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
        if(Auth::check()){
            if(Auth::user()->Hasrole('admin')){
                return redirect()->route('admin');
            }else{
                return $next($request);

            }
        }else{
         return $next($request);

        }
    }
}
