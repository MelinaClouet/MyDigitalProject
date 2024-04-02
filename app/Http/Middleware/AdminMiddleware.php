<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $me = session('me');
        if($me == null){
            return redirect('/login');
        }
        if($me->isAdmin() == false){
            return redirect('/');
        }
        

        return $next($request);
    }
}
