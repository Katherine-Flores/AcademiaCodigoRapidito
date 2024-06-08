<?php

use App\Models\Alumno;
use App\Models\Catedratico;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       $role1 = Role::create(['name' => 'administrador', 'guard_name' => 'web']);
       $role2 = Role::create(['name' => 'catedratico', 'guard_name' => 'web']);
       $role3 = Role::create(['name' => 'alumno', 'guard_name' => 'web']);
       $role4 = Role::create(['name' => 'visitante', 'guard_name' => 'web']);

       // Asignar rol admin al usuario con ID 1
       $adminUser = User::find(1);
       $adminUser->assignRole($role1);

       // Asignar rol catedratico a todos los registros en la tabla catedratico
       $catedraticos = Catedratico::all();
       foreach ($catedraticos as $catedratico) {
           $catedratico->assignRole($role2);
       }

       // Asignar rol alumno a todos los registros en la tabla alumno
       $alumnos = Alumno::all();
       foreach ($alumnos as $alumno) {
           $alumno->assignRole($role3);
       }

       // Asignar rol visitante a todos los usuarios excepto el usuario con ID 1
       $usuariosVisitantes = User::where('id', '!=', 1)->get();
       foreach ($usuariosVisitantes as $usuario) {
           // Verifica que el usuario no tenga ya asignado ninguno de los roles específicos
           if (!$usuario->hasAnyRole(['admin', 'catedratico', 'alumno'])) {
               $usuario->assignRole($role4);
           }
       }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
