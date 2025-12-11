<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\Sede;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajadores = Trabajador::all();
        $sedes = Sede::all();
        $trabajadores = Trabajador::with('sede')->get();
        return view('listadotrabajadores', compact('trabajadores','sedes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:350',
            'dni' => 'required|string|max:8|unique:trabajadores',
            'puesto' => 'required|string|max:255',
            'id_sede' => 'required|string|max:300',
        ]);

        // 2. Crear la sede
        Trabajador::create($data);

        // 3. Redirigir de vuelta a la lista con un mensaje de éxito
        return redirect()->back()->with('success', '¡Trabajador creado exitosamente!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        // 1. Validar los datos que llegan del formulario
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:350',
            'dni' => 'required|string|max:8',
            'puesto' => 'required|string|max:255',
            'id_sede' => 'required|string|max:300',
        ]);

        // 2. Preparar los datos
        $updateData = [
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'puesto' => $data['puesto'],
            'id_sede' => $data['id_sede'],
        ];

        // 3. Actualizar la sede en la base de datos
        $trabajador->update($updateData);

        // 4. Redirigir de vuelta a la página anterior con un mensaje de éxito
       return redirect()->back()->with('success', '¡Trabajador actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajador $trabajador)
    {
        // 1. Gracias al Trait SoftDeletes en el modelo Usuario,
        //    esto no lo borra, solo llena la columna 'deleted_at'.
        $trabajadores->delete();

        // 3. Redirige de vuelta a la lista con un mensaje
        return redirect()->back()->with('success', '¡Trabajador eliminado exitosamente!');
    }
}
