$('#url').html(function () {
    var string = $(this).text();
    string = string.replace('_', ' ').replace('_', ' ').replace('_', ' ');
    $(this).text(string)
    $('#url').css('textTransform', 'capitalize');
});




$(function () {
    renderHeader()
    getAllForSub()
    gettemp()
    recharge()
    selected()
    setInterval(function () { //Quando o documento estiver pronto, dê um setinvertal em qualquerCoisa()
        window.location.reload(1);
        getAllForSub() //Enviamos os valores contidos na variável ATT como parâmetro na execução do ajax
    }, 60000);
});


let state1 = false;
let state2 = false;
let state3 = false;
let state4 = false;
let state5 = false;

let zona = "";

function renderHeader() {
    var path = headerInitial()
    if (path == '/medicoes') {

        //$('#header_interno').append(`<div class="cont_interno_header"><h3>Bem Vindo a central de medições do TAC.</h3></div>`).fadeTo(2000)
        $('#body_cont_int').append(`<div class="card_body_interno">
        <div class="header_card">
            <h4>Informações essenciais.</h4>
        </div>
        <div class="body_card">
            <div class="first_text">
                
                <div class="text__">
                    <h6>Nesta Dashboard contem as sequintes informações:</h6><br>
                    <label for="">
                       <strong>1 - </strong> Umidade do Ar: Medida pelo sensor acoplado no Arduino.
                    </label>
                    <label for="">
                       <strong>2 - </strong> Temperatura do Ambiente: Medida pelo sensor acoplado no Arduino.
                    </label>
                    <label for="">
                       <strong>3 - </strong> Dia atual do ciclo do ar-condicionado.
                    </label>
                    <label for="">
                       <strong>4 - </strong> Qual ar-condicionado está ligado no momento.
                    </label>
                    <label for="">
                       <strong>5 - </strong> Cada Subprefeitura terá acesso individualizado aos dados de sua unidade.
                    </label>
                    <label for="">
                       <strong>6 - </strong> Os equipamentos de ar-condicionado irão alternar a cada 15 dias de funcionamento a cada 24h, 1 dia será
                       adicionado ao contador.
                    </label>
                   

                </div>
            </div>
        </div>
    </div>
    <div class="card_body_interno">
        <div class="header_card">
            <h4>Em caso de algum erro.</h4>
        </div>
        <div class="body_card">
            <div class="first_text">
                
                <div class="text__">
                    <h6>Casos de erro que por ventura podem acontecer:</h6><br>
                    <label for="">
                       <strong>1 - </strong> Sempre que presenciar algum erro em seu login ou nos dados de medição, entrar em contato com o nosso suporte.
                    </label>
    
                    <label for="">
                       <strong>2 - </strong> Em caso de algum bug ou erro na plataforma, entrar em contato com o nosso suporte.
                    </label>
                    <label for="">
                       <strong>3 - </strong> Para solicitar suporte ligue em  (11) 2127-8008.
                    </label>
                    <label for="">
                       <strong>4 - </strong> Emails para contato:<br>
                        - suporte@vstelecom.com.br
                    </label>
                </div>
            </div>
        </div>
    </div>`)

    }
}

function selected() {
    var path = window.location.pathname;
    var url = path.replace("/medicoes/", "");

    var lis = $('li').length;

    for (var i = 0; i < lis; i++) {
        var val = $('li > a > h6').text()
        var nn = val.indexOf(url)
    }
}

function headerInitial() {
    var getUrl = window.location;
    var baseurl = getUrl.pathname;
    return baseurl;
}


//GAUGE

const gaugeElement = document.querySelector('.gauge');

function setGaugeValue(gauge, value) {
    if (value < 0 || value > 1) {
        return;
    }

    gauge.querySelector(".gauge__fill").style.transform = `rotate(${value / 2}turn)`;
    gauge.querySelector(".gauge__cover").textContent = `${Math.round(value * 100)}°C`;
}
const gaugeElement2 = document.querySelector('.gauge2');

function setGaugeValue2(gauge, value) {
    if (value < 0 || value > 1) {
        return;
    }

    gauge.querySelector(".gauge__fill2").style.transform = `rotate(${value / 2}turn)`;
    gauge.querySelector(".gauge__cover2").textContent = `${Math.round(value * 100)}%`;
}

function dataLabel(t) {
    let data = [];
    t.forEach((value, index) => {
        data[index] = value.hora_medicao
    });
    return data.slice().reverse();
}

function horarioLabel(t) {
    let horarios = [];
    t.forEach((value, index) => {
        horarios[index] = value.hora_medicao
    })
    return horarios.slice().reverse();
}

function medicaotLabel(t) {
    let medicao = [];
    t.forEach((value, index) => {
        medicao[index] = value.temperature
    })
    return medicao.slice().reverse();
}

function medicaouLabel(t) {
    let medicao = [];
    t.forEach((value, index) => {
        medicao[index] = value.humidity
    })
    return medicao.slice().reverse();
}


//GRAPHICS

function gaugeLine(t) {
    var diaS = diaSemana();
    var ctx = document.getElementById('myChart');
    let listd = dataLabel(t);
    let listh = horarioLabel(t);
    let listt = medicaotLabel(t);
    let listu = medicaouLabel(t);
    console.log(listd)
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {

            labels: listh,
            datasets: [{
                    label: 'Temperatura',
                    data: listt,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',

                    ],
                    borderWidth: 2
                }, {
                    label: 'Umidade',
                    data: listu,
                    backgroundColor: [

                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [

                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 2
                }

            ]
        },
        options: {
            responsive: false,
            scales: {
                x: {
                    beginAtZero: false
                }
            }
        }
    });
}

function gaugeLine2(t) {
    var diaS = diaSemana();
    var ctx = document.getElementById('myChart1');
    let listd = dataLabel(t);
    let listt = medicaotLabel(t);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: listd,
            datasets: [{
                label: 'Temperatura',
                data: listt,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: false,
            scales: {
                x: {
                    beginAtZero: true
                }
            },

        }
    });
}

function gaugeLine3(t) {
    var diaS = diaSemana();
    var ctx = document.getElementById('myChart2');
    let listd = dataLabel(t);
    let listu = medicaouLabel(t);
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: listd,
            datasets: [{
                label: 'Umidade',
                data: listu,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)'

                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'

                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: false,
            scales: {
                x: {
                    beginAtZero: true
                }
            },

        }
    });
}


function getAllForSub() {
    var sub = selected1();
    console.log(sub)
    var iteration
    $.ajax({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/v1/getAllRegisters',
        data: {
            "sub": sub
        },
        async: true,
        success: function (data) {
            var response = JSON.parse(data);
            for (var i = 0; i < response.length; i++) {
                if (i == 0) {
                    var humidity = response[i].humidity
                    var humidade = Math.round(humidity)
                    var temperature = response[i].temperature
                    var temperatura = Math.round(temperature)
                    setGaugeValue(gaugeElement, 0 + "." + temperatura);
                    setGaugeValue2(gaugeElement2, 0 + "." + humidade);
                    controlStatus()
                    $('#hatual').text(`Umidade Atual:
		    ${humidity}%`)
                    $('#t_atual').text(`Temperatura Atual:
		    ${temperature}°C`)
                    $('#up1').text(`Dias UP: ${response[i].up_days_ar1}`)
                    $('#up2').text(`Dias UP: ${response[i].up_days_ar2}`)
                    if (response[1]) {
                        $('#hanterior').text(`Umidade Anterior:
			${response[1].humidity}%`)
                        $('#t_anterior').text(`Temperatura Anterior:
			${response[1].temperature}°C`)
                    } else {
                        $('#hanterior').text(`Humidade Anterior:<br> 0%`)
                        $('#t_anterior').text(`Humidade Anterior:<br> 0°C`)
                    }
                }
            }

        }
    })
}

function selected1() {
    var path = window.location.pathname;
    var url = path.replace("/medicoes/", "");
    return url;
}

function rec(varr) {
    var nova = varr

    return nova
}

function controlStatus() {
    var sub = selected1();
    var iteration
    $.ajax({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/v1/getAllRegisters',
        data: {
            "sub": sub
        },
        async: true,
        success: function (data) 
        {
            var response = JSON.parse(data);
            console.log(response[0])
            var ar_1_status = response[0].on_off1;
            var ar_2_status = response[0].on_off2;
            var days_up_ar1 = response[0].up_days_ar1;
            var days_up_ar2 = response[0].up_days_ar2;


            if(response[0].hasOwnProperty("on_off2"))
            {
                $("#container_status").append(`
                    <div class="status_ar_container" id="ar_container">
                        <div class="status_ar">
                            <div class="status_ar_head">
                                <h6 class="font-weight-light text-light mb-1">Ar-condicionado 1: </h6>
                            </div>
                            <div class="status_ar_body">
                                <div id="off1">
                                    <h6 class="font-weight-light text-light mb-0">OFF</h6>
                                </div>
                                <div id="on1">
                                    <h6 class="font-weight-light text-light mb-0">ON</h6>
                                </div>
                                <div id="aux1">
                                    <h6 class="font-weight-light text-light mb-1">Auxiliar</h6>  
                                </div>
                                <div id="diasUp1">
                                    <h6 id="up1" class="font-weight-light text-light ">Dias UP:${days_up_ar1}</h6>  
                                </div>
                            </div>
                        </div>
                        <div class="status_ar ml-2">
                            <div class="status_ar_head">
                                <h6 class="font-weight-light text-light mb-1">Ar-condicionado 2: </h6>
                            </div>
                            <div class="status_ar_body">
                                <div id="off2">
                                    <h6 class="font-weight-light text-light mb-0">OFF</h6>
                                </div>
                                <div id="on2">
                                    <h6 class="font-weight-light text-light mb-0">ON</h6>  
                                </div>
                                <div id="aux2">
                                    <h6 class="font-weight-light text-light mb-1">Auxiliar</h6>  
                                </div>

                                <div id="diasUp2">
                                    <h6 id="up2" class="font-weight-light text-light ">Dias UP:${days_up_ar2}</h6>  
                                </div>
                                
                            </div>
                        </div>

                    </div>
                `)
            }else
            {
                $("#container_status").append(`
                    <div class="status_ar_container" id="ar_container">
                        <div class="status_ar">
                            <div class="status_ar_head">
                                <h6 class="font-weight-light text-light mb-1">Ar-condicionado 1: </h6>
                            </div>
                            <div class="status_ar_body">
                                <div id="off1">
                                    <h6 class="font-weight-light text-light mb-0">OFF</h6>
                                </div>
                                <div id="on1">
                                    <h6 class="font-weight-light text-light mb-0">ON</h6>
                                </div>
                                <div id="aux1">
                                    <h6 class="font-weight-light text-light mb-1">Auxiliar</h6>  
                                </div>
                                <div id="diasUp1">
                                    <h6 id="up1" class="font-weight-light text-light ">Dias UP:${days_up_ar1}</h6>  
                                </div>
                            </div>
                        </div>

                    </div>
                `)
                $('#on1').addClass('pills_on')
                $('#off1').addClass('pills_desactivate')
                $('#aux1').addClass('pills_auxiliar_desactivate')
                $('#diasUp1').addClass('pills_dias_up')
            }

            if (ar_1_status == 1 && ar_2_status == 0) {

                if (response[0].temperature >= 25 && ar_1_status == 1 && ar_2_status == 0) {
                    $('#aux1').addClass('pills_auxiliar_desactivate')
                    $('#aux2').addClass('pills_auxiliar')
                } else if (response[0].temperature >= 25 && ar_2_status == 1 && ar_1_status == 0) {
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                    $('#aux1').addClass('pills_auxiliar')
                } else {
                    $('#aux1').addClass('pills_auxiliar_desactivate')
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                }
                $('#off1').addClass('pills_desactivate')
                $('#on1').addClass('pills_on')
                $('#diasUp1').addClass('pills_dias_up')

                $('#off2').addClass('pills_off')
                $('#on2').addClass('pills_desactivate')
                $('#diasUp2').addClass('pills_dias_up_d')
            } else if (ar_2_status == 1 && ar_1_status == 0) {


                if (response[0].temperature >= 25 && ar_1_status == 0 && ar_2_status == 1) {
                    $('#aux1').addClass('pills_auxiliar_desactivate')
                    $('#aux2').addClass('pills_auxiliar')
                } else if (response[0].temperature >= 25 && ar_2_status == 0 && ar_1_status == 1) {
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                    $('#aux1').addClass('pills_auxiliar')
                } else {
                    $('#aux1').addClass('pills_auxiliar_desactivate')
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                }
                $('#off1').addClass('pills_off')
                $('#on1').addClass('pills_desactivate')
                $('#diasUp1').addClass('pills_dias_up_d')

                $('#off2').addClass('pills_desactivate')
                $('#on2').addClass('pills_on')
                $('#diasUp2').addClass('pills_dias_up')
            } else if (ar_1_status == 1 && ar_2_status == 1) {
                if (days_up_ar1 < 15) 
                {
                    $('#off1').addClass('pills_desactivate')
                    $('#on1').addClass('pills_on')
                    $('#diasUp1').addClass('pills_dias_up')
                    $('#aux1').addClass('pills_auxiliar_desactivate')

                    $('#off2').addClass('pills_desactivate')
                    $('#on2').addClass('pills_on')
                    $('#diasUp2').addClass('pills_dias_up_d')
                    $('#aux2').addClass('pills_auxiliar')

                } else if (days_up_ar1 == 15) {
                    $('#off1').addClass('pills_desactivate')
                    $('#on1').addClass('pills_on')
                    $('#diasUp1').addClass('pills_dias_up_d')
                    $('#aux1').addClass('pills_auxiliar')

                    $('#off2').addClass('pills_desactivate')
                    $('#on2').addClass('pills_on')
                    $('#diasUp2').addClass('pills_dias_up')
                    $('#aux2').addClass('pills_auxiliar_desactivate')

                } else if (days_up_ar1 == 0 && days_up_ar2 == 0) {
                    $('#off1').addClass('pills_desactivate')
                    $('#on1').addClass('pills_on')
                    $('#diasUp1').addClass('pills_dias_up')
                    $('#aux1').addClass('pills_auxiliar_desactivate')

                    $('#off2').addClass('pills_desactivate')
                    $('#on2').addClass('pills_on')
                    $('#diasUp2').addClass('pills_dias_up_d')
                    $('#aux2').addClass('pills_auxiliar')
                }
            }
            console.log(sub)
            if(sub == "santana" || sub == "itaquera" || sub == "aricanduva")
            {
                if(response[0].temperature < 26 && ar_1_status == 1 && ar_2_status == 0)
                {
                    $('#aux1').addClass('pills_auxiliar_desactivate')
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                }else if(response[0].temperature < 26 && ar_2_status == 1 && ar_1_status == 0)
                {
                    $('#aux2').addClass('pills_auxiliar_desactivate')
                    $('#aux1').addClass('pills_auxiliar')
                }
            }
        }
    })
}

function gettemp() {
    var sub = selected1();
    var iteration
    var response;
    var resp = $.ajax({
        method: 'POST',
        url: 'http://127.0.0.1:8000/api/v1/getAllRegisters',
        data: {
            "sub": sub
        },
        async: true,
        success: function (data) {
            response = JSON.parse(data);
            console.log(response)
            gaugeLine(response)
            gaugeLine2(response)
            gaugeLine3(response)
        }
    })
}

function diaSemana() {
    var semana = ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"];

    var d = new Date();

    var diaS = semana[d.getDay()]

    return diaS
}


$("#lis1").on("click", (e) => 
{
    e.preventDefault;
    
    if(!state1)
    {
        let listas = document.getElementById("testando");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state1 = true
        zona = "norte"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("testando");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        state1 = false
        zona = ""
        sessionStorage.setItem("item", zona);
    }

    
})

$("#lis2").on("click", (e) => 
{
    e.preventDefault;

    if(!state2)
    {
        let listas = document.getElementById("Box_2");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state2 = true
        zona = "leste"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_2");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        state2 = false
        
    }
})
$("#lis3").on("click", (e) => 
{
    e.preventDefault;

    if(!state3)
    {
        let listas = document.getElementById("Box_3");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state3 = true
        zona = "sul"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_3");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        state3 = false
        
    }
})
$("#lis4").on("click", (e) => 
{
    e.preventDefault;

    if(!state4)
    {
        let listas = document.getElementById("Box_4");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state4 = true
        zona = "oeste"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_4");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        state4 = false
        
    }
})
$("#lis5").on("click", (e) => 
{
    e.preventDefault;
    

    if(!state5)
    {
        let listas = document.getElementById("Box_5");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state5 = true
        zona = "centro"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_5");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        state5 = false
        
    }
})


function recharge()
{
    let zone = sessionStorage.getItem("item");
    console.log(zone)
    if(zone == "norte")
    {
        let listas = document.getElementById("testando");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state1 = true
        zona = "norte"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("testando");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
    }

    if(zone == "leste")
    {
        let listas = document.getElementById("Box_2");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state2 = true
        zona = "leste"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_2");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        
    }

    if(zone == "sul")
    {
        let listas = document.getElementById("Box_3");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        zona = "sul"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_3");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        
    }
    if(zone == "oeste")
    {
        let listas = document.getElementById("Box_4");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state4 = true
        zona = "oeste"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_4");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
        
    }
    if(zone == "centro")
    {
        let listas = document.getElementById("Box_5");
        listas.style.display = "flex";
        listas.style.flexDirection = "column";
        state5 = true
        zona = "centro"
        sessionStorage.setItem("item", zona);
    }else
    {
        let listas = document.getElementById("Box_5");
        listas.style.display = "none";
        listas.style.flexDirection = "column";
    }
}