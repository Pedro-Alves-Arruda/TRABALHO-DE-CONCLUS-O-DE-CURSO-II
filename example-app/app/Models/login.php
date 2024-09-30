<?php

namespace App\Models;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "usuarios";


    function login(Request $request){
        
        $usuario = DB::table('usuarios')
        ->where('usuarios.email', "=", $request->input('email'))
        ->where('usuarios.senha', "=", $request->input('senha'))
        ->select('usuarios.*')
        ->first();

        if(isset($usuario->Email) && isset($usuario->Email) != ''){
        
            session_start();

            $_SESSION['usuario'] =  $usuario->Email;
            $_SESSION['senha'] = $usuario->Senha;
            $_SESSION['nome'] = $usuario->nome;

            return view('welcome', ['user'=> $_SESSION['nome']]);

        }else{
            return redirect()->route('loginGet');
        }

    }
}
