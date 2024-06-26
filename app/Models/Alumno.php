<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = "alumno";

    protected $primaryKey = 'Codigo_Alumno';

    public function inscripciones()
    {
        return $this->hasMany(inscripcion::class, 'Codigo_Alumno');
    }
}
