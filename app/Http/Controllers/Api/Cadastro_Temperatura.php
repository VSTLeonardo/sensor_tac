<?php

namespace App\Http\Controllers\Api;
date_default_timezone_set("America/Sao_Paulo");
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cadastro_Temperatura extends Controller
{
    /**
     * Função cadastro_Banco() cadastra um novo registro na tabela dependendo da sub que vier por parametro na url
     */
    public function cadastro_Banco(Request $request)
    {
        $res = $request->all();

        $date_atual = date("Y-m-d H:i:s");
    
        $test = DB::insert("INSERT INTO ".$res['sub']."(`humidity`, `temperature`, `data_m`, `on_off1`, `on_off2`, `up_days_ar1`, `up_days_ar2`) VALUES (?, ?, ?, ?, ?, ?, ?)",
        [
            $res['humidity'],
            $res['temperature'],
            $date_atual,
            $res['on_off1'],
            $res['on_off2'],
            $res['up_days_ar1'],
            $res['up_days_ar2']
        ]);

        
    }
}
