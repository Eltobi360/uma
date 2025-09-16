{{-- resources/views/umas/index.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Uma Musume</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col items-center p-6">

    <h1 class="text-3xl font-bold text-purple-400 mb-6">CRUD Uma Musume</h1>

    {{-- Formulario para crear una Uma --}}
    <div class="w-full max-w-lg bg-gray-800 rounded-2xl shadow-lg p-6 mb-10">
        <h2 class="text-xl font-semibold text-teal-400 mb-4">Registrar Uma</h2>
        <form action="{{ route('umas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm mb-1">Nombre</label>
                <input type="text" name="nombre" class="w-full rounded-lg p-2 text-black" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm mb-1">Velocidad</label>
                    <input type="number" name="velocidad" class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Stamina</label>
                    <input type="number" name="stamina" class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Fuerza</label>
                    <input type="number" name="fuerza" class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Gutz</label>
                    <input type="number" name="gutz" class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Inteligencia</label>
                    <input type="number" name="inteligencia" class="w-full rounded-lg p-2 text-black" required>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Imagen</label>
                <input type="file" name="imagen" class="w-full text-sm">
            </div>

            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
                Guardar Uma
            </button>
        </form>
    </div>

    {{-- Listado de Umas --}}
    <div class="w-full max-w-4xl bg-gray-800 rounded-2xl shadow-lg p-6 mb-7">
        <h2 class="text-xl font-semibold text-teal-400 mb-4">Lista de Umas</h2>
        <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3">
            @foreach($umas as $uma)
                <div class="bg-gray-700 rounded-xl shadow-lg p-4">
                    @if($uma->imagen)
                        <img src="{{ asset('storage/' . $uma->imagen) }}" 
                             alt="{{ $uma->nombre }}" 
                             class="w-full h-40 object-cover rounded-lg mb-3">
                    @endif
                    <h3 class="text-lg font-bold text-purple-300">{{ $uma->nombre }}</h3>
                    <ul class="text-sm text-gray-300 mt-2">
                        <li><strong>Velocidad:</strong> {{ $uma->velocidad }}</li>
                        <li><strong>Stamina:</strong> {{ $uma->stamina }}</li>
                        <li><strong>Fuerza:</strong> {{ $uma->fuerza }}</li>
                        <li><strong>Gutz:</strong> {{ $uma->gutz }}</li>
                        <li><strong>Inteligencia:</strong> {{ $uma->inteligencia }}</li>
                    </ul>

                    {{-- Botones de acción --}}
                    <div class="mt-3 flex gap-2">
                        <a href="{{ route('umas.edit', $uma) }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-sm">Editar</a>

                        <form action="{{ route('umas.destroy', $uma) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta Uma?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
