<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login as _login;
use Exception;

class login extends Controller
{
   
    public function Login(Request $request){
        return (new _login())->login($request);
    }
}
