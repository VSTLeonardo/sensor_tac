<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/login/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('assets/img/VSlogo.png')}}" type="image/x-icon">
    <title>Sensores - Login</title>
</head>
<body>
    <div class="container_geral">
        <div class="container_interno">
            <img src="{{asset('assets/img/VSlogo.png')}}" alt="">
            <div class="container_form">
                <form method="POST" action="{{route('api.login')}}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Usuario:</label>
                      <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">Entre com o usuario fornecido pela VSTelecom</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Senha</label>
                      <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="container_form_controller">
                        
                        <div class="container_button">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </div>
                  </form>
            </div>
            
        </div>
        @if (session('msg'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            {{session('msg')}}
          </div>
        @endif
    </div>
</body>
</html>