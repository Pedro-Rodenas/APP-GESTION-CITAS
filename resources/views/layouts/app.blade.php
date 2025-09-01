<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Jerarquia Css -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/var.css')}}">
</head>

<style>
    /* Contenedor principal */
.layout {
    display: grid;
    grid-template-columns: 250px 1fr;   /* aside a la izquierda, contenido al resto */
    grid-template-rows: 60px 1fr;      /* header arriba, contenido abajo */
    min-height: 100vh;                 /* ocupar toda la pantalla */
    background-color: var(--bg-neutral, #f9f9f9);
    color: var(--text-neutral, #333);
}

/* Aside lateral */
.layout aside {
    grid-row: 1 / span 2;              /* ocupa tanto header como main */
    background-color: var(--aside-bg, #e6e6e6);
    border-right: 1px solid var(--border-neutral, #ccc);
    padding: 1rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

/* Header superior */
.layout header {
    grid-column: 2;                    /* solo en la segunda columna */
    background-color: var(--header-bg, #f0f0f0);
    border-bottom: 1px solid var(--border-neutral, #ccc);
    padding: 0.75rem 1rem;
    display: flex;
    justify-content: flex-end;         /* nombre de usuario a la derecha */
    align-items: center;
    font-weight: 500;
}

/* Main de contenido */
.layout main {
    grid-column: 2;                    /* solo en la segunda columna */
    padding: 1.5rem;
}

/* Ejemplo enlaces aside */
.layout aside a {
    text-decoration: none;
    color: var(--link-neutral, #444);
    font-size: 0.95rem;
    transition: color 0.2s ease;
}

.layout aside a:hover {
    color: var(--link-hover, #000);
}

</style>

<body class="layout">
    <aside>
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Usuarios</a>
            <a href="#">Reportes</a>
        </nav>
    </aside>

    <header>
        <span>Usuario: Juan Pérez</span>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>