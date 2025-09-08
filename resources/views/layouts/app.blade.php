<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/var.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('styles')

</head>

<body>
    <header class="header">
        <nav class="nav">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="{{ route('dashboard') }}" class="nav__link"><i class="fas fa-house"></i> Dashboard</a>
                </li>

                <li class="nav__item nav__item--has-submenu">
                    <a href="#" class="nav__link"><i class="fas fa-gear"></i> Gestión</a>
                    <ul class="nav__submenu">
                        <li class="nav__submenu-item">
                            <a href="{{ route('pacientes.index') }}" class="nav__submenu-link"><i class="fas fa-user-injured"></i> Pacientes</a>
                        </li>
                        <li class="nav__submenu-item">
                            <a href="{{ route('medicos.index') }}" class="nav__submenu-link"><i class="fas fa-user-doctor"></i> Médicos</a>
                        </li>
                        <li class="nav__submenu-item">
                            <a href="{{ route('citas.index') }}" class="nav__submenu-link"><i class="fas fa-calendar-check"></i> Citas</a>
                        </li>
                        <li class="nav__submenu-item">
                            <a href="{{ route('diagnosticos.index') }}" class="nav__submenu-link"><i class="fas fa-file-medical"></i> Diagnósticos</a>
                        </li>
                        <li class="nav__submenu-item">
                            <a href="{{ route('tratamientos.index') }}" class="nav__submenu-link"><i class="fas fa-pills"></i> Tratamientos</a>
                        </li>
                        <li class="nav__submenu-item">
                            <a href="{{ route('medicamentos.index') }}" class="nav__submenu-link"><i class="fas fa-capsules"></i> Medicamentos</a>
                        </li>
                    </ul>
                </li>

                <li class="nav__item">
                    <a href="{{ route('login') }}" class="nav__link"><i class="fas fa-right-from-bracket"></i> Cerrar sesión</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main">
        @yield('content')
    </main>


</body>

    @yield('scripts')
</html>