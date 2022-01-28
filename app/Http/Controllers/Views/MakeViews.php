<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Sensor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class MakeViews extends Controller
{
    public function makeViewDadosSub(Request $request, $url)
    {
        $request->session()->put('sub_logada', $url);
        
        if(Auth::check())
        {
            $var = $this->med($request);
            $lista = $var['lista'];
            
            $session = json_encode($request->session()->all());
            $json = json_decode($session);
            $user = User::where('fk_sub', $json->fk_sub)->first();
           
            if($json->sub_logada == $url)
            {
                return view('conteudos.medicoes', 
                [
                    'lista' => $lista,
                    'url' => $url
                ]);
            }else if($var->tipo == "admin")
            {
                return view('conteudos.medicoes', 
                [
                    'lista' => $lista,
                    'url' => $url
                ]);
            }else
            {
                Auth::logout();
                Session::flush();
                return redirect()->route('login')->with('msg', "Logue novamente no sistema com a Sub desejada.");
            }
        }else
        {
            return redirect()->route('login')->with('msg', "Logue novamente no sistema com a Sub desejada.");
        }
    }

    public function viewLogin()
    {
        return view('login.login');
    }
    public function listagem()
    {
        return view('principal.lista');
    }
    public function med(Request $request)
    {
        $newArr = array();
        if(Auth::check())
        {
            $session = json_encode($request->session()->all());
            $json = json_decode($session);
            
            switch($json->Admin)
            {
                case 1: 
                    $allSubs = DB::select('SELECT * FROM sub');
                    foreach($allSubs as $key => $value)
                    {
                        
                        if($value->zona == "centro")
                        {
                           $newArr[$value->zona][] = [
                                "nome_sub" => $value->nome_sub,
                                "zona" => $value->zona,
                                "fk_usuario" => $value->fk_usuario
                           ]; 
                        }else if($value->zona == "norte")
                        {
                            $newArr[$value->zona][] = [
                                "nome_sub" => $value->nome_sub,
                                "zona" => $value->zona,
                                "fk_usuario" => $value->fk_usuario
                           ];
                        }else if($value->zona == "leste")
                        {
                            $newArr[$value->zona][] = [
                                "nome_sub" => $value->nome_sub,
                                "zona" => $value->zona,
                                "fk_usuario" => $value->fk_usuario
                           ];
                        }else if($value->zona == "oeste")
                        {
                            $newArr[$value->zona][] = [
                                "nome_sub" => $value->nome_sub,
                                "zona" => $value->zona,
                                "fk_usuario" => $value->fk_usuario
                           ];
                        }else if($value->zona == "sul")
                        {
                            $newArr[$value->zona][] = [
                                "nome_sub" => $value->nome_sub,
                                "zona" => $value->zona,
                                "fk_usuario" => $value->fk_usuario
                           ];
                        }

                    }
                    
                    return view('principal.dashboard', 
                    [
                        "lista" => $newArr,
                        "tipo" => "admin",
                        "url" => ''
                    ]);
                break;

                case 0:
                    $sub = DB::select('SELECT nome_sub FROM sub where fk_usuario = :usuario', [
                        "usuario" => $json->fk_id_user
                        ]);

                      
                    return view('principal.dashboard', [
                        "lista" => $sub,
                        "url" => ''
                    ]);
                break;

                default:
                break;
            }
            
        }else
        {
            return redirect()->route('login')->with('msg', "Logue no sistema.");
        }
            
    }
}

