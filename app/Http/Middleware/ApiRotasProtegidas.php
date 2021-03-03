<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class ApiRotasProtegidas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof TokenInvalidException){
                return response()->json(['status' => 'Token é inválido']);
            }else if ($e instanceof TokenExpiredException){
                return response()->json(['status' => 'O token está expirado']);
            }else{
                return response()->json(['status' => 'Token de autorização não encontrado']);
            }
        }
        return $next($request);
    }
}
