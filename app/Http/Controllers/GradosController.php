<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGrado;
use Illuminate\Http\Request;
use App\Models\Grado;

class GradosController extends Controller
{
    public function __invoke()
    {
        $grados = Grado::all();
        return view('layouts.grados', compact('grados'));
    }

    public function index(Request $request)
    {
        $query = Grado::query();

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function($q) use ($search) {
                $q->where('Id_Grado', 'like', "%{$search}%")
                    ->orWhere('Nombre', 'like', "%{$search}%");
            });
        }

        $grados = $query->paginate(10);
        return view('layouts.CRUD.grados', compact('grados'));
    }

    public function create(CreateGrado $request)
    {
        $grado = new Grado();

        $grado->Nombre = $request->Nombre;

        $grado->save();

        if ($grado->save() == true) {
            return back()->with("correcto", "Grado registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar el grado");
        }
    }

    public function update(Request $request, $id)
    {
        $grado = Grado::findOrFail($id);
        $grado->Nombre = $request->Nombre;
        $grado->save();

        return $grado->save()
            ? back()->with("correcto", "Grado modificado correctamente")
            : back()->with("incorrecto", "Error al modificar el grado");
    }

    public function delete($id)
    {
        $grado = Grado::findOrFail($id);
        $grado->delete();

        return $grado->delete()
            ? back()->with("incorrecto", "Error al eliminar el grado")
            : back()->with("correcto", "Grado eliminado correctamente");
    }
}
