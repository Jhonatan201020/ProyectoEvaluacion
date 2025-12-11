<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    // Un Inventario pertenece a un Bien
    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
