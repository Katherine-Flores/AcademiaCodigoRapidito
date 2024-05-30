<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInscripcion;
use App\Models\Alumno;
use App\Models\Asignacion;
use App\Models\inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function __invoke()
    {
        $inscripciones = inscripcion::paginate(5);
        return view('layouts.CRUD.inscripciones', compact('inscripciones'));
    }

    public function index(Request $request)
    {
        $alumnos = Alumno::all();
        $asignaciones =Asignacion::all();
        $query = inscripcion::with(['alumno', 'asignacion']);

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function ($q) use ($search) {
                $q->where('Id_Inscripcion', 'like', "%{$search}%")
                    ->orWhereHas('alumno', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    })
                    ->orWhere('Codigo_Alumno', 'like', "%{$search}%");
            });
        }

        $inscripciones = $query->paginate(5);
        return view('layouts.CRUD.inscripciones', compact('inscripciones','alumnos', 'asignaciones'));
    }

    public function create(CreateInscripcion $request)
    {
        $asignacion = Asignacion::findOrFail($request->Id_Asignacion);
        $monto = ($asignacion->Id_Grado == 1) ? 350 : 450;

        $inscripcion = new inscripcion();

        // Verificar si el alumno ya está inscrito en el curso
        $inscripcionExistente = Inscripcion::where('Codigo_Alumno', $request->Codigo_Alumno)
            ->where('Id_Asignacion', $request->Id_Asignacion)
            ->first();

        if ($inscripcionExistente) {
            // Si ya existe una inscripción, redirigir con un mensaje de error
            return back()->with("incorrecto", 'El alumno ya está inscrito en este curso.');
        } else {
            // Si no existe una inscripción, crear una nueva

            $inscripcion->Fecha_Inscripcion = now();
            $inscripcion->Id_Asignacion = $request->Id_Asignacion;
            $inscripcion->Codigo_Alumno = $request->Codigo_Alumno;
            $inscripcion->Monto = $monto;

            $inscripcion->save();

            if ($inscripcion->save() == true) {
                return back()->with("correcto", "Inscripción registrada correctamente");
            } else {
                return back()->with("incorrecto", "Error al registrar inscripción");
            }
        }
    }

    public function update(Request $request, $id)
    {
        $inscripcion = inscripcion::findOrFail($id);
        $asignacion = Asignacion::findOrFail($request->Id_Asignacion);
        $monto = ($asignacion->Id_Grado == 1) ? 350 : 450;

        $inscripcion->Id_Asignacion = $request->Id_Asignacion;
        $inscripcion->Codigo_Alumno = $request->Codigo_Alumno;
        $inscripcion->Monto = $monto;

        $inscripcion->save();

        return $inscripcion->save()
            ? back()->with("correcto", "Inscripción modificada correctamente")
            : back()->with("incorrecto", "Error al modificar inscripción");
    }

    public function delete($id)
    {
        $inscripcion = inscripcion::findOrFail($id);
        $inscripcion->delete();

        return $inscripcion->delete()
            ? back()->with("incorrecto", "Error al eliminar inscripción")
            : back()->with("correcto", "Inscripción eliminada correctamente");
    }
}
