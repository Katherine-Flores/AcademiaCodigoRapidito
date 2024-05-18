<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlumno;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    public function __invoke()
    {
        $alumnos = Alumno::all();
        return view('layouts.CRUD.alumnos', compact('alumnos'));
    }

    public function index(Request $request)
    {
        $query = Alumno::query();

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function ($q) use ($search) {
                $q->where('Codigo_Alumno', 'like', "%{$search}%")
                    ->orWhere('Nombre', 'like', "%{$search}%");
            });
        }

        $alumnos = $query->paginate(20);
        return view('layouts.CRUD.alumnos', compact('alumnos'));
    }

    public function create(CreateAlumno $request)
    {
        $alumno = new Alumno();

        $alumno->Codigo_Alumno = $request->Codigo_Alumno;
        $alumno->Nombre = $request->Nombre;
        $alumno->Correo = $request->Correo;
        $alumno->Telefono = $request->Telefono;
        $alumno->Fecha_Nacimiento = $request->Fecha_Nacimiento;

        $alumno->save();

        if ($alumno->save() == true) {
            return back()->with("correcto", "Alumno registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar alumno");
        }
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->Codigo_Alumno = $request->Codigo_Alumno;
        $alumno->Nombre = $request->Nombre;
        $alumno->Correo = $request->Correo;
        $alumno->Telefono = $request->Telefono;
        $alumno->Fecha_Nacimiento = $request->Fecha_Nacimiento;
        $alumno->save();

        return $alumno->save()
            ? back()->with("correcto", "Alumno modificado correctamente")
            : back()->with("incorrecto", "Error al modificar alumno");
    }

    public function delete($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return $alumno->delete()
            ? back()->with("incorrecto", "Error al eliminar alumno")
            : back()->with("correcto", "Alumno eliminado correctamente");
    }
}
