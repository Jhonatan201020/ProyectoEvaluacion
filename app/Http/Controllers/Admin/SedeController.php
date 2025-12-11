<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sede;

class SedeController extends Controller
{
    //
    public function index()
    {
        $sedes = Sede::all();
        return view('sedes', compact('sedes'));
    }

    public function store(Request $request)
    {
        // 1. Validar los datos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'oficina' => 'required|string|max:350|unique:sedes',
        ]);

        // 2. Crear la sede
        Sede::create($data);

        // 3. Redirigir de vuelta a la lista con un mensaje de éxito
        return redirect()->back()->with('success', '¡Sede creado exitosamente!');
    }

    public function update(Request $request, Sede $sede)
    {
        // 1. Validar los datos que llegan del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'oficina' => 'required|string|max:350',
        ]);

        // 2. Preparar los datos
        $updateData = [
            'nombre' => $data['nombre'],
            'oficina' => $data['oficina'],
        ];

        // 3. Actualizar la sede en la base de datos
        $sede->update($updateData);

        // 4. Redirigir de vuelta a la página anterior con un mensaje de éxito
       return redirect()->back()->with('success', '¡Sede actualizada exitosamente!');
    }

    public function destroy(Sede $sede)
    {
        // 1. Gracias al Trait SoftDeletes en el modelo Sede,
        //    esto no lo borra, solo llena la columna 'deleted_at'.
        $sede->delete();

        // 2. Redirige de vuelta a la lista con un mensaje
        return redirect()->back()->with('success', '¡Sede eliminada exitosamente!');
    }
}
