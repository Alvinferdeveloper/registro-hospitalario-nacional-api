<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,  ...$roles): Response
    {
        $user = $request->user();
        if (method_exists($user, 'roles')) {
            $user->load('roles');
            if ($user->roles()->exists() && $user->roles()->whereIn('name', $roles)->exists()) {
                return $next($request);
            } 
        } else {
            if($user && in_array($user->role, $roles)){
                return $next($request);
            }

        }
            return response()->json(['message' => 'Acceso denegado'], 403);
      
    }
}
