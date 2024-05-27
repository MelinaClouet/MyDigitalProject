<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        //Verifie si l'utilisateur est connecté
        $me = session('me');
        if($me == null){
            return redirect('/login');
        }
        //Verifie si l'utilisateur est un admin
        if($me->isAdmin() == false){
            return redirect('/');
        }

        return $next($request);
    }
}
