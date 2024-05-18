<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignacion;
use App\Models\Asignacion;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionController extends Controller
{
    public function __invoke()
    {
        $asignaciones = Asignacion::all();
        $grados = Grado::all();
        $cursos = Curso::all();
        $sucursales = Sucursal::all();
        return view('layouts.CRUD.asignaciones', compact('asignaciones', 'grados', 'cursos', 'sucursales'));
    }

    public function index(Request $request)
    {
        $grados = Grado::all();
        $cursos = Curso::all();
        $sucursales = Sucursal::all();
        $query = Asignacion::with(['catedratico', 'sucursal', 'grado', 'curso']);

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function ($q) use ($search) {
                $q->where('Id_Asignacion', 'like', "%{$search}%")
                    ->orWhereHas('catedratico', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    })
                    ->orWhere('Codigo_Catedratico', 'like', "%{$search}%")
                    ->orWhereHas('sucursal', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    })
                    ->orWhereHas('grado', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    })
                    ->orWhereHas('curso', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    });
            });
        }

        $asignaciones = $query->paginate(10);
        return view('layouts.CRUD.asignaciones', compact('asignaciones', 'grados','cursos','sucursales'));
    }

    public function store(StoreAsignacion $request)
    {
        $asignacion = new Asignacion();

        $asignacion->Fecha_Asignacion = $request->Fecha_Asignacion;
        $asignacion->Id_Curso = $request->Id_Curso;
        $asignacion->Codigo_Catedratico = $request->Codigo_Catedratico;
        $asignacion->Id_Sucursal = $request->Id_Sucursal;
        $asignacion->Id_Grado = $request->Id_Grado;

        $asignacion->save();

        //return redirect()->route('asignaciones');
        if ($asignacion->save() == true) {
            return back()->with("correcto", "Asignación registrada correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar asignación");
        }
    }

    public function update(Request $request, $id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->Fecha_Asignacion = $request->Fecha_Asignacion;
        $asignacion->Id_Curso = $request->Id_Curso;
        $asignacion->Codigo_Catedratico = $request->Codigo_Catedratico;
        $asignacion->Id_Sucursal = $request->Id_Sucursal;
        $asignacion->Id_Grado = $request->Id_Grado;
        $asignacion->save();

        return $asignacion->save()
            ? back()->with("correcto", "Asignación modificada correctamente")
            : back()->with("incorrecto", "Error al modificar asignación");
    }

    public function delete($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->delete();

        return $asignacion->delete()
            ? back()->with("incorrecto", "Error al eliminar asignación")
            : back()->with("correcto", "Asignación eliminada correctamente");
    }
}
