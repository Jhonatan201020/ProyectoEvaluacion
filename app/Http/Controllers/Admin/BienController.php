<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bien;

class BienController extends Controller
{
    public function index()
    {
        $bienes = Bien::all();
        return view('listabienes', compact('bienes'));
    }

    /*Guarda un nuevo bien (de cualquier tipo) en la base de datos.*/
    public function store(Request $request)
    {
        // 1. Validar los datos (todos los campos son opcionales
        //  excepto los que definas como 'required' en tu modal)
        $data = $request->validate([
            'nombre_bien' => 'required|string',
            'orden_compra' => 'required|string',
            'tipo' => 'required|string', // 'informatico', 'mobiliario'...
            'estado' => 'required|string',
            'codigo_patrimonial' => 'string|unique:bienes',
            
            // Campos opcionales (pueden ser NULL)
            'fecha_adquisicion' => 'nullable|date',

            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'numero_serie' => 'nullable|string|unique:bienes',
            'procesador' => 'nullable|string',

            'color' => 'nullable|string',
            'dimensiones' => 'nullable|string',

            'placa' => 'nullable|string|unique:bienes',
            'numero_motor' => 'nullable|string|unique:bienes',
            'chasis' => 'nullable|string|unique:bienes',
            'año_fabricacion' => 'nullable|integer',
        ]);

        // 2. Crear el Bien
        Bien::create($data);

        // 3. Redirigir
        return redirect()->back()->with('success', 'Bien registrado exitosamente');
    }

    public function update(Request $request, Bien $bien)
    {
        // 1. Validar los datos
        // Usamos $bien->id_bien para ignorar las reglas 'unique' en ESTE registro
        $data = $request->validate([
            'nombre_bien' => 'required|string',
            'orden_compra' => 'required|string',
            'estado' => 'required|string',
            
            // Campos opcionales (pueden ser NULL)
            'codigo_patrimonial' => 'nullable|string|unique:bienes,codigo_patrimonial,' . $bien->id_bien . ',id_bien',
            'fecha_adquisicion' => 'nullable|date',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'numero_serie' => 'nullable|string|unique:bienes,numero_serie,' . $bien->id_bien . ',id_bien',
            'procesador' => 'nullable|string',
            'color' => 'nullable|string',
            'dimensiones' => 'nullable|string',
            'placa' => 'nullable|string|unique:bienes,placa,' . $bien->id_bien . ',id_bien',
            'numero_motor' => 'nullable|string|unique:bienes,numero_motor,' . $bien->id_bien . ',id_bien',
            'chasis' => 'nullable|string|unique:bienes,chasis,' . $bien->id_bien . ',id_bien',
            'año_fabricacion' => 'nullable|integer',
        ]);
        
        // 2. Actualizar el Bien
        $bien->update($data);

        // 3. Redirigir
        return redirect()->back()->with('success', 'Bien actualizado exitosamente');
    }
}
