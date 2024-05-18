<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurso;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    public function __invoke()
    {
        $cursos = Curso::all();
        $grados = Grado::all();
        return view('layouts.cursos', compact('cursos','grados'));
    }

    public function index(Request $request)
    {
        $grados = Grado::all();

        $query = Curso::with(['grado']);

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function ($q) use ($search) {
                $q->where('Id_Curso', 'like', "%{$search}%")
                    ->orWhere('Nombre', 'like', "%{$search}%")
                    ->orWhereHas('grado', function ($q) use ($search) {
                        $q->where('Nombre', 'like', "%{$search}%");
                    });
            });
        }

        $cursos = $query->paginate(10);
        return view('layouts.CRUD.cursos', compact('cursos', 'grados'));
    }

    public function create(CreateCurso $request)
    {
        $curso = new Curso();

        $curso->Nombre = $request->Nombre;
        $curso->Duracion = $request->Duracion;
        $curso->Id_Grado = $request->Id_Grado;

        $curso->save();

        if ($curso->save() == true) {
            return back()->with("correcto", "Curso registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar el curso");
        }
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->Nombre = $request->Nombre;
        $curso->Duracion = $request->Duracion;
        $curso->Id_Grado = $request->Id_Grado;
        $curso->save();

        return $curso->save()
            ? back()->with("correcto", "Curso modificado correctamente")
            : back()->with("incorrecto", "Error al modificar el curso");
    }

    public function delete($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return $curso->delete()
            ? back()->with("incorrecto", "Error al eliminar el curso")
            : back()->with("correcto", "Curso eliminado correctamente");
    }
}
