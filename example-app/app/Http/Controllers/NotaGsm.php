<?php

namespace App\Http\Controllers;

use App\Models\NotaGsm as _notaGsm;
use App\Models\Terminais;
use Illuminate\Http\Request;

class NotaGsm extends Controller
{

    public function listar(){
        return (new _notaGsm())->listar();
    }

    public function listarJson(){
        return (new _notaGsm())->listarJson();
    }

    public function Cadastrar(Request $request){
        return (new _notaGsm())->Cadastrar($request);
    }

    public static function ExibirTelaCadastro(){
        $terminais = (new Terminais())->ListarTerminais();
        $nomesInputs = array("tiquete_balanca","peso","valor_frete","comissao_motorista");
        return view('CadastrarNotaGsm', ['terminais_destino'=>$terminais, 'NomesInputs'=>$nomesInputs]);
    }
}
