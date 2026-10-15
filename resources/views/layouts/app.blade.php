<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agua Móvil Municipal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">
    @yield('content')
</body>

<div class="text-right leading-tight">
    <!-- Se agregó id="reloj-hora" -->
    <p id="reloj-hora" class="font-bold text-sm md:text-lg">{{ now()->format('h:i a') }}</p>
    <!-- Se agregó id="reloj-fecha" -->
    <p id="reloj-fecha" class="text-[0.65rem] md:text-sm text-pink-100 capitalize">{{ now()->locale('es')->translatedFormat('l, d \d\e F') }}</p>
</div>

</html>