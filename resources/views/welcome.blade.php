<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - CRUD Uma Musume</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="text-center space-y-6">
        <h1 class="text-4xl font-extrabold text-purple-400 drop-shadow-lg">
            Bienvenido al CRUD Uma Musume
        </h1>
        <p class="text-lg text-gray-300">Selecciona una opción para continuar</p>

        <a href="{{ route('umas.index') }}"
           class="inline-block bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-3 rounded-2xl shadow-lg transition">
            Ir al CRUD de Umas
        </a>
    </div>
</body>
</html>
