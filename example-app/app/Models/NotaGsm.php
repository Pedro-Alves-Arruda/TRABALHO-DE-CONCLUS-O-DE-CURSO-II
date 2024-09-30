<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;
use app\Models\NotaGsm as _notaGsm;
use Carbon\Carbon;

class NotaGsm extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "gsm_nota";
    protected $fillable = [
        'tiquete_balanca',
        'comissao_motorista',
        'peso',
        'valor_frete',
        'id_terminal'
    ];

    public function listar($is_sucesso = null, $is_erro = null){

        DB::enableQueryLog();

        $notas = DB::table('gsm_nota')
        ->join('Terminais', 'Terminais.id_terminal', '=', 'gsm_nota.id_terminal')
        ->select('gsm_nota.*','Terminais.nome_terminal')
        ->get();
       


        $d = json_decode(DataTables::of($notas)->make(true)->content());

        return view('NotaGsm', ['NotasGsm' => $d->data, 'is_sucesso'=>$is_sucesso, '$is_erro'=> $is_erro]);
    }

    public function listarJson(){

        DB::enableQueryLog();

        $notas = DB::table('gsm_nota')
        ->join('Terminais', 'Terminais.id_terminal', '=', 'gsm_nota.id_terminal')
        ->select('gsm_nota.*','Terminais.nome_terminal')
        ->get();

        $d = json_decode(DataTables::of($notas)->make(true)->content());


        return $d;
    }

 
    public function Cadastrar(Request $request){
        
        DB::enableQueryLog();
        
        $request->validate(
        [
            "tiquete_balanca" => "required",
            "peso"=>"required|Numeric",
            "valor_frete"=>"required|Numeric",
            "comissao_motorista"=>"required|string",
            "terminal_destino"=>"required|Numeric"
        ],
        [
            'tiquete_balanca.required' => 'O campo Tiquete Balança é obrigatorio',
            'peso.required' => 'O campo peso é obrigatorio',
            'valor_frete.required' => 'O campo Valor do Frete é obrigatorio',
            'comissao_motorista.required' => 'O campo Comissão do Motorista é obrigatorio',
            'terminal_destino.required' => 'O campo Terminal de Destino é obrigatorio',
        ]
        );
        
        $sucesso = self::insert([
            "tiquete_balanca"=> $request->input('tiquete_balanca'),
            "peso"=> $request->input('peso'),
            "valor_frete"=> $request->input('valor_frete'),
            "comissao_motorista"=> $request->input('comissao_motorista'),
            "id_terminal"=>$request->input('terminal_destino'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

    
        if($sucesso){
            //Session::put('is_sucesso','Nota inserida com sucesso GSM');
            return redirect()->route('listar')->with("message", ["titulo" => "Sucesso", "text" => "Nota inserida com sucesso!", "type" => "sucess"]);
        }else{
            //Session::put('is_erro','Erro ao inserir nota GSM');
            return redirect()->route('listar')->withErrors('is_erro', strval(Session::get('is_erro')));
        }
    }
}
