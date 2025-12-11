<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienMovimiento extends Model
{
    use HasFactory;
    // ***IMPORTANTE: Define el nombre exacto de la tabla ***
    protected $table = 'bienes_movimiento'; 
    
    // Este movimiento pertenece a un Bien
    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }

    // Este movimiento fue realizado por un Trabajador
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }
}
