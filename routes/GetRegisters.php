<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetRegisters extends Controller
{
    public function getAllRegisters(Request $request)
    {   
        
        $data = DB::select("SELECT id, humidity, temperature, on_off1, on_off2, up_days_ar1, up_days_ar2,DATE_FORMAT(data_m, '%Y-%m-%d') AS data_medicao, CAST(data_m AS TIME)  AS hora_medicao FROM ".$request->sub." ORDER BY id DESC LIMIT 60");
        // dd($data);
        // exit;
        return json_encode($data);
    }

    public function getAllRegisters1(Request $request)
    {   
        
        $data = DB::select("SELECT id, humidity, temperature, on_off1, on_off2, up_days_ar1, up_days_ar2,DATE_FORMAT(data_m, '%Y-%m-%d') AS data_medicao, CAST(data_m AS TIME)  AS hora_medicao FROM ".$request->sub." ORDER BY id ASC LIMIT 60");
        // dd($data);
        // exit;
        return json_encode($data);
    }
}
