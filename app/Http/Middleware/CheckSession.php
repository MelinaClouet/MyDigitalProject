<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        // Vérifier si une session existe
        if (session()->has('me')) {
            // Si une session existe, continuer la requête
            return $next($request);
        }

        // Rediriger vers une page de connexion ou renvoyer une réponse appropriée
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
    }
}
