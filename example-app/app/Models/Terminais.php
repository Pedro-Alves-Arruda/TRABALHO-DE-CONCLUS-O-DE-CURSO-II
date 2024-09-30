<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminais extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table = "Terminais";

    public function ListarTerminais(){

        
        $Terminais = self::select([
            "id_terminal",
            "nome_terminal",
        ])
        ->get();

        return $Terminais;
    }

}
