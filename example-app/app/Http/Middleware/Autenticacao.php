<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Usuario;
use Closure;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Autenticacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {

    //     //verifica se o usuario tem permissão
    //     try{

    //         $user = auth()->user();

    //         session_start();

    //         $usuario = $_SESSION['usuario']; 
           
    //         if($usuario && isset($usuario)){
    //             $resposta = $next($request);
    //             return $resposta;
    //         }else{
    //             return redirect()->route('loginGet');    
    //         }
           
    //     }catch(Exception){
    //         return redirect()->route('loginGet');
    //     }
    // }

      /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) : Response
    {
        
        try {
                
            // Check if the user is authenticated
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['message' => 'Token expired'], 401);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Token invalid'], 401);
        }

        return $next($request);
    }
}
