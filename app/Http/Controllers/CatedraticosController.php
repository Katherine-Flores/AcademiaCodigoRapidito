<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatedratico;
use App\Models\Catedratico;
use Illuminate\Http\Request;

class CatedraticosController extends Controller
{
    public function __invoke()
    {
        $catedraticos = Catedratico::paginate(5);
        return view('layouts.CRUD.catedraticos', compact('catedraticos'));
    }

    public function index(Request $request)
    {
        $query = Catedratico::query();

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function ($q) use ($search) {
                $q->where('Codigo_Catedratico', 'like', "%{$search}%")
                    ->orWhere('Nombre', 'like', "%{$search}%");
            });
        }

        $catedraticos = $query->paginate(5);
        return view('layouts.CRUD.catedraticos', compact('catedraticos'));
    }

    public function create(CreateCatedratico $request)
    {
        $Catedratico = new Catedratico();

        $Catedratico->Codigo_Catedratico = $request->Codigo_Catedratico;
        $Catedratico->Nombre = $request->Nombre;
        $Catedratico->Correo = $request->Correo;
        $Catedratico->Telefono = $request->Telefono;

        $Catedratico->save();

        if ( $Catedratico->save() == true) {
            return back()->with("correcto", "Catedrático registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar catedrático");
        }
    }

    public function update(Request $request, $id)
    {
        $Catedratico = Catedratico::findOrFail($id);
        $Catedratico->Codigo_Catedratico = $request->Codigo_Catedratico;
        $Catedratico->Nombre = $request->Nombre;
        $Catedratico->Correo = $request->Correo;
        $Catedratico->Telefono = $request->Telefono;

        $Catedratico->save();

        return $Catedratico->save()
            ? back()->with("correcto", "Catedrático modificado correctamente")
            : back()->with("incorrecto", "Error al modificar catedrático");
    }

    public function delete($id)
    {
        $Catedratico = Catedratico::findOrFail($id);
        $Catedratico->delete();

        return $Catedratico->delete()
            ? back()->with("incorrecto", "Error al eliminar catedrático")
            : back()->with("correcto", "Catedrático eliminado correctamente");
    }
}
