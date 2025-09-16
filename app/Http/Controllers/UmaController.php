<?php

namespace App\Http\Controllers;
use App\Models\Uma;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $umas = Uma::all();
        return view('umas.index', compact('umas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'velocidad' => 'required|integer|min:0',
            'stamina' => 'required|integer|min:0',
            'fuerza' => 'required|integer|min:0',
            'gutz' => 'required|integer|min:0',
            'inteligencia' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        // Guardar imagen si se subió
        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('umas', 'public');
        }

         // Crear la Uma
        Uma::create([
            'nombre' => $request->nombre,
            'velocidad' => $request->velocidad,
            'stamina' => $request->stamina,
            'fuerza' => $request->fuerza,
            'gutz' => $request->gutz,
            'inteligencia' => $request->inteligencia,
            'imagen' => $rutaImagen,
        ]);

        // Redirigimos con mensaje de éxito
        return redirect()->route('umas.index')->with('success', 'Uma registrada correctamente 🎉');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uma $uma)
    {
         return view('umas.edit', compact('uma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uma $uma)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'velocidad' => 'required|integer|min:0',
            'stamina' => 'required|integer|min:0',
            'fuerza' => 'required|integer|min:0',
            'gutz' => 'required|integer|min:0',
            'inteligencia' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

         // Si hay nueva imagen, borramos la anterior y guardamos la nueva
        if ($request->hasFile('imagen')) {
            if ($uma->imagen && Storage::disk('public')->exists($uma->imagen)) {
                Storage::disk('public')->delete($uma->imagen);
            }
            $uma->imagen = $request->file('imagen')->store('umas', 'public');
        }

        // Actualizamos el resto de atributos
        $uma->update([
            'nombre' => $request->nombre,
            'velocidad' => $request->velocidad,
            'stamina' => $request->stamina,
            'fuerza' => $request->fuerza,
            'gutz' => $request->gutz,
            'inteligencia' => $request->inteligencia,
            'imagen' => $uma->imagen,
        ]);

        return redirect()->route('umas.index')->with('success', 'Uma actualizada correctamente ✅');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uma $uma)
    {
        if ($uma->imagen && Storage::disk('public')->exists($uma->imagen)) {
         Storage::disk('public')->delete($uma->imagen);
        }
        
        $uma->delete();

        // Redirigimos al listado con un mensaje
        return redirect()->route('umas.index')->with('success', 'Uma eliminada correctamente 🗑️');
    }
}
