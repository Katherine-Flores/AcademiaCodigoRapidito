<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = "sucursal";

    protected $primaryKey = 'Id_Sucursal';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'Id_Sucursal');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'Id_Sucursal');
    }
}
