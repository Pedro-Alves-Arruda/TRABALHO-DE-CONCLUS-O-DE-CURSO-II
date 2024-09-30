<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usuario extends Controller
{
    
    public function listar(){
        echo 
            "[{
                'id':'231',
                'Nome':'Pedro Arruda'
            },
            {
                'id':'512',
                'Nome':'João da Silva'
            }],
            ";
    }


    public function cadastrar(){
        echo 10;
    }

    public function salvar(Request $request){
        dd($request->all());
    }


}
