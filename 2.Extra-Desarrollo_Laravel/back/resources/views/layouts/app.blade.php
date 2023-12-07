<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick y Morty</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="{{ route('mostrar-personajes') }}">Mostrar Personajes Guardados</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
