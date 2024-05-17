<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = "grado";

    protected $primaryKey = 'Id_Grado';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'Id_Grado');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'Id_Grado');
    }
}
