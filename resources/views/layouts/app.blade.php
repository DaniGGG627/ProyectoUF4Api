<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Escuela FP de Informática')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Puedes agregar más archivos CSS aquí si es necesario -->
</head>
<body>
    <div class="container">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Escuela FP</a>
        </nav>

        <!-- Contenido dinámico de las vistas -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Archivos JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Puedes agregar más archivos JS aquí si es necesario -->
</body>
</html>
