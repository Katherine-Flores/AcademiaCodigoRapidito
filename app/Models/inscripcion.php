<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    use HasFactory;

    protected $table = "inscripcion";

    protected $primaryKey = 'Id_Inscripcion';

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'Codigo_Alumno');
    }

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class, 'Id_Asignacion');
    }
}
