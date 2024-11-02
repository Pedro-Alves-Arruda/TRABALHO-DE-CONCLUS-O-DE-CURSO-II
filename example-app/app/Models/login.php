<?php

namespace App\Models;

use App\Http\Controllers\Usuario;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class login extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "usuarios";

     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    function login(Request $request){

        $usuario = User::where('email', $request->email)->first();  

        if(!$usuario)
        {
            return redirect()->route('loginGet');
        }else if (auth()->attempt(['email' => $request->email, 'password' => $request->senha])) {

            session_start();

            $_SESSION['email'] = $request->email;   
            $_SESSION['name'] = $request->name;
             
            return redirect()->intended($this->redirectTo);
        }
    }
}
