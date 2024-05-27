<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est connecté
        if(!session()->has('me')){
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }

        // Vérifier si l'utilisateur est un admin
        $me=session()->get('me');
        if($me->isAdmin==1){
            return $next($request);
        }

        // Rediriger vers une page de connexion ou renvoyer une réponse appropriée
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');

    }
}
