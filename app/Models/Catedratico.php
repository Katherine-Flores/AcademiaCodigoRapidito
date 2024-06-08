<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Catedratico extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';
    protected $table = "catedratico";

    protected $primaryKey = 'Codigo_Catedratico';

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'Codigo_Catedratico');
    }
}
