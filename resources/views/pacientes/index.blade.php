<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/var.css')}}">
    <link rel="stylesheet" href="{{asset('css/tables.css')}}">
    <title>Pacientes</title>
</head>

<body>
    <main>
        <section class="modulo">
            <div class="top">
                <form class="form-search" action="" method="POST">
                    <input class="control" type="search" name="buscar" id="" placeholder="Buscar...">
                </form>
                <div class="perfil">
                    <img src="{{asset('images/medico.PNG')}}" alt="Medico">
                </div>
            </div>
            <section class="content">
                <section class="content-bg">
                    <h1 class="content-title">Lista de Pacientes</h1>
                    <a class="btn btn-green" href="">Crear Paciente</a>
                    <table class="table">
                        <thead class="table-head">
                            <tr class="row-head">
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>especialidad</th>
                                <th>Teléfono</th>
                                <th >Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach ($pacientes as $paciente)
                            <tr class="row">
                                <td>{{$paciente['id']}}</td>
                                <td>{{$paciente['nombre']}}</td>
                                <td>{{$paciente['apellido']}}</td>
                                <td>{{$paciente['especialidad']}}</td>
                                <td>{{$paciente['telefono']}}</td>
                                <td class="row-acciones">
                                    <a class="acciones-icon" href="" class="btn btn-primary">
                                        <img src="{{asset('images/lapiz.png')}}" alt="">
                                    </a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <a class="acciones-icon" href="">
                                            <img src="{{asset('images/borrar.png')}}" alt="">
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </main>
</body>

</html>