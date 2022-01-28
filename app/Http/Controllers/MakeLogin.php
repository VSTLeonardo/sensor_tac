<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Sensor;
use App\User;

class MakeLogin extends Controller
{
    public function makeLogin(Request $request)
    {
        $user = User::where('email', $request->usuario)->first();
        
        if($user && $request->senha == $user->password)
        {
            Auth::login($user);
            $request->session()->put('Admin', $user->admin);
            $request->session()->put('fk_sub', $user->fk_sub);
            $request->session()->put('fk_id_user', $user->id);
            
            return redirect()->route('medicoes');
        }else
        {
            return redirect()->route('login')->with('msg', 'Impossivel logar com os dados fornecidos, tente novamente!');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return \redirect()->route('login');
    }
}
