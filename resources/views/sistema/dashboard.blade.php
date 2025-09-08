<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    <main class="dashboard">

        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                timer: 1800, // Duración en milisegundos
                showConfirmButton: false, // Oculta el botón de confirmar
                position: 'center', // Centrado
                timerProgressBar: true, // Barra de progreso opcional
            });
        </script>
        @endif

        <h1 class="dashboard__title">
            Bienvenido a tu <span>Dashboard</span>
        </h1>
        <p class="dashboard__description">
            Selecciona una de las áreas para comenzar a gestionar la clínica.
        </p>

        <div class="dashboard__grid">
            <a href="{{ route('pacientes.index') }}" class="dashboard__card">
                <i class="fas fa-user-injured dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Pacientes</h3>
            </a>
            <a href="{{ route('medicos.index') }}" class="dashboard__card">
                <i class="fas fa-user-md dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Médicos</h3>
            </a>
            <a href="{{ route('citas.index') }}" class="dashboard__card">
                <i class="fas fa-calendar-check dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Citas</h3>
            </a>
            <a href="{{ route('diagnosticos.index') }}" class="dashboard__card">
                <i class="fas fa-stethoscope dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Diagnósticos</h3>
            </a>
            <a href="{{ route('tratamientos.index') }}" class="dashboard__card">
                <i class="fas fa-band-aid dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Tratamientos</h3>
            </a>
            <a href="{{ route('medicamentos.index') }}" class="dashboard__card">
                <i class="fas fa-pills dashboard__icon"></i>
                <h3 class="dashboard__subtitle">Medicamentos</h3>
            </a>
        </div>

        <a href="{{ route('login') }}" class="logout-button">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>

    </main>

</body>

</html>