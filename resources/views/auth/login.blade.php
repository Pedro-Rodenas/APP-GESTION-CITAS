<!DOCTYPE html>
<html lang="es-pe">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/var.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <section class="container-login">
        <section class="login-img">
            <img src="{{asset('img/login/login.png')}}" alt="App gestion citas Imagen">
        </section>
        <section class="login-auth">
            @if(session('error'))
                <div style="color:red; padding:5px 12px; background-color:white; text-align:center;" class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            <small></small>
            <form class="login" action="{{route('verificar')}}" method="POST">
                @csrf
                <div class="group-control">
                    <label for="nombre">Nombre</label>
                    <input class="control" type="text" name="nombre" id="nombre" value="" placeholder="Ingresar Nombre">
                </div>
                <div class="group-control">
                    <label for="">Contraseña</label>
                    <input class="control" name="password" type="password">
                </div>
                <button class="btn btn-access bg-white" type="submit">Ingresar</button>
            </form>
        </section>
    </section>
</body>
</html>