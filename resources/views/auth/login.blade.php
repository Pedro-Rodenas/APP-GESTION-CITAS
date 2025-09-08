<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/var.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <section class="container-login">
        <section class="login-img">
            <img src="{{asset('img/login/login.png')}}" alt="App gestion citas Imagen">
        </section>
        <section class="login-auth">
       
        <!-- @if(session('error'))
            <div style="color:red; padding:10px; background-color:#fff6f6; border:1px solid #f5c2c7;" class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif -->

            @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#1a73e8'
                });
            </script>
            @endif

            <h1>Iniciar Sesión</h1>
            <p>Accede al panel de gestión de la clínica</p>

            <form class="login" action="{{route('verificar')}}" method="POST">
                @csrf
                <div class="group-control">
                    <label for="nombre">Nombre</label>
                    <input class="control" type="text" name="nombre" id="nombre" placeholder="Ingresar Nombre">
                    <!-- <i class="fas fa-user"></i> -->
                </div>
                <div class="group-control">
                    <label for="password">Contraseña</label>
                    <input class="control" type="password" name="password" id="password" placeholder="Ingresar Contraseña">
                    <!-- <i class="fas fa-lock"></i> -->
                </div>
                <button class="btn btn-access" type="submit">
                    <i class="fas fa-sign-in-alt"></i> Ingresar
                </button>
            </form>
        </section>
    </section>
</body>

</html>