<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bien extends Model
{
    use HasFactory, SoftDeletes;
    
    // Define la tabla maestra (Laravel adivinaría 'biens', es mejor ser explícito)
    protected $table = 'bienes'; 
    protected $primaryKey = 'id_bien';

    // Define los campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre_bien',
        'codigo_patrimonial',
        'fecha_adquisicion',
        'orden_compra',
        'tipo',
        'estado',
        // Informáticos
        'marca',
        'modelo',
        'numero_serie',
        'procesador',
        // Mobiliarios
        'color',
        'dimensiones',
        // Movilidades
        'placa',
        'numero_motor',
        'chasis',
        'año_fabricacion',
    ];

    protected $casts = [
        'fecha_adquisicion' => 'date',
        'año_fabricacion' => 'integer',
    ];

}