{{-- resources/views/umas/edit.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Uma</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col items-center p-6">

    <h1 class="text-3xl font-bold text-purple-400 mb-6">Editar Uma Musume</h1>

    <div class="w-full max-w-lg bg-gray-800 rounded-2xl shadow-lg p-6">
        <form action="{{ route('umas.update', $uma) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm mb-1">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $uma->nombre) }}" 
                       class="w-full rounded-lg p-2 text-black" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm mb-1">Velocidad</label>
                    <input type="number" name="velocidad" value="{{ old('velocidad', $uma->velocidad) }}" 
                           class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Stamina</label>
                    <input type="number" name="stamina" value="{{ old('stamina', $uma->stamina) }}" 
                           class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Fuerza</label>
                    <input type="number" name="fuerza" value="{{ old('fuerza', $uma->fuerza) }}" 
                           class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Gutz</label>
                    <input type="number" name="gutz" value="{{ old('gutz', $uma->gutz) }}" 
                           class="w-full rounded-lg p-2 text-black" required>
                </div>
                <div>
                    <label class="block text-sm mb-1">Inteligencia</label>
                    <input type="number" name="inteligencia" value="{{ old('inteligencia', $uma->inteligencia) }}" 
                           class="w-full rounded-lg p-2 text-black" required>
                </div>
            </div>

            <div>
                <label class="block text-sm mb-1">Imagen actual</label>
                @if($uma->imagen)
                    <img src="{{ asset('storage/' . $uma->imagen) }}" 
                         alt="{{ $uma->nombre }}" 
                         class="w-32 h-32 object-cover rounded-lg mb-2">
                @else
                    <p class="text-gray-400 text-sm">Sin imagen</p>
                @endif
                <input type="file" name="imagen" class="w-full text-sm">
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-4 py-2 rounded-lg shadow-md transition">
                    Actualizar Uma
                </button>
                <a href="{{ route('umas.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow-md transition">
                   Cancelar
                </a>
            </div>
        </form>
    </div>

</body>
</html>
