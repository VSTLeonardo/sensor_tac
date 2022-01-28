<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class MakeCsv extends Controller
{
    public function export(Request $request)
    {
        $sessao = json_encode( $request->session()->all());
        $obj = json_decode($sessao);
        $arq_excel = "";
        
        $dados = DB::select("SELECT
        id,
        humidity, 
        temperature, 
        on_off1, 
        on_off2, 
        up_days_ar1, 
        up_days_ar2, 
        DATE_FORMAT(data_m, '%Y-%m-%d') AS data_medicao,
        CAST(data_m AS TIME)  AS hora_medicao
        FROM ".$obj->sub_logada." 
        ORDER BY id DESC");
        
        $newData = array();

        foreach($dados as $key => $value)
        {
            $newData[$key] = $value;
        }

        
        $var;

        $arquivo = 'Medicoes_'.$obj->sub_logada.'.xls';

        $html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= "<td colspan='5'>Medições ".$obj->sub_logada."</tr>";
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Data(Medição)</b></td>';
		$html .= '<td><b>Hora(Medição)</b></td>';
		$html .= '<td><b>Temperatura</b></td>';
		$html .= '<td><b>Humidade</b></td>';
		$html .= '<td><b>Dias UP maquina 1</b></td>';
		$html .= '<td><b>Dias UP maquina 2</b></td>';
        $html .= '<td><b>Status Maquina 1</b></td>';
        $html .= '<td><b>Status Maquina 2</b></td>';
		$html .= '</tr>';

        foreach($dados as $key => $value)
        {
            $statusm1 = $value -> on_off1;
            $statusm2 = $value-> on_off2;

            if($statusm1 == '1')
            {
                $statusm1 = 'On';
            }else{
                $statusm1 = 'Off';
            }

            if($statusm2 == '1')
            {
                $statusm2 = 'On';
            }else{
                $statusm2 = 'Off';
            }

            $html .= "<tr>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->data_medicao."</td>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->hora_medicao."</td>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->temperature."</td>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->humidity."</td>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->up_days_ar1."</td>";
			$html .= "<td style='text-align: center; vertical-align: middle'>".$value->up_days_ar2."</td>";
            $html .= "<td style='text-align: center; vertical-align: middle'>".$statusm1."</td>";
            $html .= "<td style='text-align: center; vertical-align: middle'>".$statusm2."</td>";
			$html .= "</tr>";
			
        }
        
        // Configurações header para forçar o download
		header ("Expires: Mon, 30 Jul 2097 10:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/xls");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit;
    }
}
