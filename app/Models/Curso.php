<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = "curso";

    protected $primaryKey = 'Id_Curso';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'Id_Curso');
    }
}
