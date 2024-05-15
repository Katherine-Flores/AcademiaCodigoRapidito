<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catedratico extends Model
{
    use HasFactory;

    protected $table = "catedratico";

    protected $primaryKey = 'Codigo_Catedratico';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'Codigo_Catedratico');
    }
}
