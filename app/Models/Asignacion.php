<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;

    protected $table = "asignacion";

    protected $primaryKey = 'Id_Asignacion';

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'Id_Sucursal');
    }

    public function catedratico()
    {
        return $this->belongsTo(Catedratico::class, 'Codigo_Catedratico');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class, 'Id_Grado');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'Id_Curso');
    }
}
