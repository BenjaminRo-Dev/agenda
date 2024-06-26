<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && ($request->user()->isAdministrador() || $request->user()->isProfesor())) {
            return $next($request);
        }
        
        return redirect()->route('no-autorizado');
    }
}