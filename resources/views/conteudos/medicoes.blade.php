@extends('principal.dashboard')
@section('conteudos')
    <div class="conts_meds">
        <div class="container_headers">
            <div class="header_conteudos_med">
                <div class="header_contss">
                    <h5 id="url" name="url_s">Sensor {{$url}}</h5>
                </div>
            </div>
            <div class="cont_status" id="container_status">
                <div class="legendas">
                    <div class="status_ar_head">
                        <h6 class="font-weight-light text-light mb-1">legendas </h6>
                    </div>
                    <div class="texto_legenda">
                        <div class="pill_legenda_verde">ON</div>-> Ar-condicionado está ligado
                    </div>
                    <div class="texto_legenda">
                        <div class="pill_legenda_red">OFF</div>-> Ar-condicionado desligado
                    </div>
                    <div class="texto_legenda">
                        <div class="pill_legenda_secondary">S/N</div>-> Sem status
                    </div>
                    <div class="texto_legenda">
                        <div class="pill_legenda_warning">Aux</div>-> Maquina auxiliar está ligada temperatura > 25°C
                    </div>
                </div>
                
            </div>
        </div>
        <div class="body_conteudos_med">
            <div class="gauges_containers">
                <div class="gauge_card">
                    <div class="gauge_card_header">
                        <h6>Temperatura em °C</h6>
                    </div>
                    <div class="card_interno_gauge">
                        <div class="gauge">
                            <div class="gauge__body">
                                <div class="gauge__fill">
                                </div>
                                <div class="gauge__cover">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="infos_gauge">
                        <div class="header_infos_gauge">
                            <h6>Informações Detalhadas</h6>
                        </div>
                        <div class="body_infos_gauge">
                            <h6 id="t_atual">Teperatura Atual: 22.7°C</h6>
                            <h6 id="t_anterior">Temperatura Anterior: 24.2°C</h6>
                            <div class="cont_buttons">
                                <button data-toggle="modal" data-target="#modal" class="btn btn-secondary btn-sm">Grafico Temperatura</button>
                            </div>
                        </div>
                        <div class="footer_infos_gauge">

                        </div>
                    </div>
                </div>
                <div class="gauge_card">
                    <div class="gauge_card_header">
                        <h6>Umidade</h6>
                    </div>
                    <div class="card_interno_gauge">
                        <div class="gauge2">
                            <div class="gauge__body2">
                                <div class="gauge__fill2">
                                </div>
                                <div class="gauge__cover2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="infos_gauge">
                        <div class="header_infos_gauge">
                            <h6>Informações Detalhadas</h6>
                        </div>
                        <div class="body_infos_gauge">
                            <h6 id="hatual"></h6>
                            <h6 id="hanterior">Umidade Anterior: 66%</h6>
                            <div class="cont_buttons">
                                <button data-toggle="modal" data-target="#modal2" class="btn btn-secondary btn-sm">Grafico Umidade</button>
                            </div>
                        </div>
                        <div class="footer_infos_gauge">
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- GRAFICO  GERAL -->
            <div class="grafico_geral">
                <div class="grafico_geral_interno">
                    <div class="grafico_geral_header">
                        <h6>Grafico geral Temperatura / Umidade</h6>
                    </div>
                    <div class="grafico_geral_body">
                        <canvas id="myChart" class="canvass" height="335"></canvas>
                    </div>
                    <div class="grafico_bottom">
                        <a href="{{route('csv')}}"><button class="btn btn-secondary btn-sm ">HISTORICO DE MEDIÇÔES</button></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Modals -->

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success ">
              <h5 class="modal-title text-light font-weight-light"  id="exampleModalLabel">Temperatura em °C</h5>
              <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <canvas id="myChart1" style="width: 770px; height:250px;" class="canvass2"></canvas>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header bg-success ">
              <h5 class="modal-title text-light font-weight-light"  id="exampleModalLabel">Deslogar</h5>
              <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <h4 class="font-weight-light">Deseja realmente sair ?</h4>
            </div>
            <div class="modal-footer">
                <a href="{{route('logout')}}"><button type="button" class="btn btn-success" >Sim</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
          </div>
        </div>
    </div>


    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success ">
              <h5 class="modal-title text-light font-weight-light"  id="exampleModalLabel">Umidade</h5>
              <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <canvas id="myChart2" style="width: 770px; height:250px;" class="canvass2"></canvas>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
    </div>


@endsection