<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    //

    public function Login(Request $request){
        //Autenticar email e senha
        $credenciais = $request->all(['email', 'password']);
       
        //Retornar token com JWT
        $token = auth('api')->attempt($credenciais);

        //usuario autenticado
        if($token){
            return response()->json(['token'=>$token]);
        }else{
            return response()->json(['erro'=>'Erro ao gerar token de autenticação'], 403);
        }
    }


    public function Refresh(){
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }


    public function Logout(){
        auth('api')->logout();
        return response()->json(['msg'=>'Usuario deslogado com sucesso']);
    }


    public function me(){
        return response()->json(auth()->user());
    }
}
