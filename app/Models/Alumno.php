<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Alumno extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';
    protected $table = "alumno";

    protected $primaryKey = 'Codigo_Alumno';

    public function inscripciones()
    {
        return $this->hasMany(inscripcion::class, 'Codigo_Alumno');
    }
}
