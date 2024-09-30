<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Usuario;
use Closure;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autenticacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //verifica se o usuario tem permissão
        try{

            session_start();

            $usuario = Session::get('usuario');

            if($usuario && isset($usuario)){
                $resposta = $next($request);
                return $resposta;
            }else{
                return redirect()->route('loginGet');    
            }
           
        }catch(Exception){
            return redirect()->route('loginGet');
        }
    }
}
