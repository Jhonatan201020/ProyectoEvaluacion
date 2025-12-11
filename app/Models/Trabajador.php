<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'trabajadores';
    protected $primaryKey = 'id_trabajador';
    public $incrementing = true;
    protected $keyType = 'int';
    
    /**
     * Los atributos que se pueden asignar en masa.
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'puesto',
        'id_sede',
    ];

    public function sede()
    {
        // 'id_sede' es la columna en tu tabla 'trabajadores'
        // 'id_sede' es la columna primaria en tu tabla 'sedes'
        return $this->belongsTo(Sede::class, 'id_sede', 'id_sede');
    }

}
