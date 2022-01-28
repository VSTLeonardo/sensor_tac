<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/principal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/conteudos.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/VSlogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/dashboard/mobile_360x_640x.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/resolucao_1966x.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sensores - TAC</title>
</head>

<body>
    <input type="checkbox" id="check">
    <div class="conteudos">
        <div class="navegacao">
            <div class="nav_cont1">
                <div class="nav_cont1_text">
                    <h6><i class="fa fa-chart-pie"></i>Sensores TAC</h6>
                </div>
                <div class="nav_cont1_icon">
                    <div class="toggle-bars">
                        <label for="check">
                            <i class="fa fa-bars"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="nav_cont2">

            </div>
        </div>
        <div class="navegacao_side" overflow-y: scroll>
            <ul>
                @if ($url == "")
                 <li id="inicio" class="Selected"><a target="_parent" href="{{route('medicoes')}}"><i class="fa fa-home"></i><h6>Inicio</h6></a></li>  
                @else
                <li id="inicio"><a target="_parent" href="{{route('medicoes')}}"><i class="fa fa-home"></i><h6>Inicio</h6></a></li>    
                @endif
                <?php
                    $newArr = array();
                    $leste = array();
                    $oeste = array();
                    $norte = array();
                    $sul = array();
                    $centro = array();
                    foreach($lista as $key => $value)
                    {
                        if($key == 'leste')
                        {
                            foreach($value as $key2 => $value2)
                            {
                                $leste[$key2] = $value2;
                            }
                        }
                        if($key == 'oeste')
                        {
                            foreach($value as $key2 => $value2)
                            {
                                $oeste[$key2] = $value2;
                            }
                        }
                        if($key == 'norte')
                        {
                            foreach($value as $key2 => $value2)
                            {
                                $norte[$key2] = $value2;
                            }
                        }
                        if($key == 'sul')
                        {
                            foreach($value as $key2 => $value2)
                            {
                                $sul[$key2] = $value2;
                            }
                        }
                        if($key == 'centro')
                        {
                            foreach($value as $key2 => $value2)
                            {
                                $centro[$key2] = $value2;
                            }
                        }
                    }

                    $sessao = session()->all();
                   
                ?>
                
                @if ($sessao['Admin'] == 0)
                    @foreach ($lista as $key)
                    @if ($url == $key->nome_sub)
                        <li focused id="lis" class="Selected"><a id="links" target="_parent" href="{{route('getviewmedicoes', [$key->nome_sub])}}" onclick="selected()"><i class="fa fa-dashboard"></i><h6 id="nome">{{$key->nome_sub}}</h6></a></li>
                    @else
                        <li id="lis"><a id="links" target="_parent" href="{{route('getviewmedicoes', [$key->nome_sub])}}" onclick="selected()"><i class="fa fa-dashboard"></i><h6 id="nome">{{$key->nome_sub}}</h6></a></li>
                    @endif
                    @endforeach
                @else
                    <li id="lis1"><a id="links" target="_parent" onclick="selected()"><i class="fa fa-dashboard"></i><h6> Zona Norte</h6></a></li>
                    <div class="teste" id="testando">
                        
                        @foreach ($norte as $key => $value)
                            @if ($url == $value['nome_sub'])
                                <li id="listas" class="estado_li Selected" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>
                            @else
                                <li id="listas" class="estado_li" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>    
                            @endif
                        @endforeach
                        
                    </div>
                    <li id="lis2"><a id="links" target="_parent" onclick="selected()"><i class="fa fa-dashboard"></i><h6> Zona Leste</h6></a></li>
                    <div class="box_2" id="Box_2">
                        @foreach ($leste as $key => $value)
                            @if ($url == $value['nome_sub'])
                                <li id="listas" class="Selected estado_li" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>
                            @else
                                <li id="listas" class="estado_li " ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>    
                            @endif
                        @endforeach
                    </div>
                    <li id="lis3"><a id="links" target="_parent" onclick="selected()"><i class="fa fa-dashboard"></i><h6> Zona Sul</h6></a></li>
                    <div class="box_3" id="Box_3">
                        @foreach ($sul as $key => $value)
                            @if ($url == $value['nome_sub'])
                                <li id="listas" class="estado_li Selected" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>
                            @else
                                <li id="listas" class="estado_li" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>    
                            @endif
                        @endforeach
                    </div>
                    <li id="lis4"><a id="links" target="_parent" onclick="selected()"><i class="fa fa-dashboard"></i><h6> Zona Oeste</h6></a></li>
                    <div class="box_4" id="Box_4">
                        @foreach ($oeste as $key => $value)
                            @if ($url == $value['nome_sub'])
                                <li id="listas" class="estado_li Selected" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>
                            @else
                                <li id="listas" class="estado_li" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>    
                            @endif
                        @endforeach
                    </div>
                    <li id="lis5"><a id="links" target="_parent" onclick="selected()"><i class="fa fa-dashboard"></i><h6>Centro</h6></a></li>
                    <div class="box_5" id="Box_5">
                        @foreach ($centro as $key => $value)
                            @if ($url == $value['nome_sub'])
                                <li id="listas" class="estado_li Selected" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>
                            @else
                                <li id="listas" class="estado_li" ><a id="links" target="_parent" onclick="selected()"  href="{{route('getviewmedicoes', [$value['nome_sub']])}}"><i class="fa fa-dashboard"></i><h6><?php echo $value['nome_sub']?></h6></a></li>    
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class="button_de_sair"> 
                    <a href="#" class="btn_sair"data-toggle="modal" data-target="#modal3"><i class="fa fa-power-off"></i></a>
                </div>
            </ul>
        </div>
        <div class="conteudos_interno">
            <div class="conteudo_medicoes" id="conts">
                @if ($url == '')
                    <div class="header_cont_interno" id="header_interno">
                        <div class="cont_interno_header">
                            <h3>Bem Vindo a central de medições do TAC.</h3>
                        </div>
                    </div>
                @else

                @endif
                <div class="body_cont_interno" id="body_cont_int">
                    @yield('conteudos')
                </div>
                <div class="button_de_sair">
                    <a href="#" class="btn_sair" data-toggle="modal" data-target="#modal3"><i
                            class="fa fa-power-off"></i></a>
                </div>
            </div>
        </div>
        <div class="rodape">
            <label for="">Copyright &copy; <a href="http://www.vstelecom.com.br/">VSTelecom</a></label>
        </div>
    </div>
    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-success ">
                    <h5 class="modal-title text-light font-weight-light" id="exampleModalLabel">Deslogar</h5>
                    <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="font-weight-light">Deseja realmente sair ?</h4>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('logout') }}"><button type="button" class="btn btn-success">Sim</button></a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>


</body>

</html>
