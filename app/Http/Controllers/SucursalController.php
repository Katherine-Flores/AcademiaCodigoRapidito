<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    public function __invoke()
    {
        $sucursal = Sucursal::all();
        return view('layouts.sucursal', compact('sucursal'));
    }


    public function index(Request $request)
    {
        $query = Sucursal::query();

        if ($request->filled('busqueda')) {
            $search = $request->busqueda;
            $query->where(function($q) use ($search) {
                $q->where('Id_Sucursal', 'like', "%{$search}%")
                    ->orWhere('Nombre', 'like', "%{$search}%");
            });
        }

        $sucursal = $query->paginate(10);
        return view('layouts.CRUD.sucursal', compact('sucursal'));
    }



    public function create(CreateSucursal $request)
    {
        $Sucursal = new Sucursal();


        $Sucursal ->Nombre = $request->Nombre;
        $Sucursal ->Direccion = $request->Direccion;
        $Sucursal ->Telefono = $request->Telefono;

        $Sucursal ->save();

        //return redirect()->route('asignaciones');
        if ( $Sucursal ->save() == true) {
            return back()->with("correcto", "Catedratico registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar catedratico");
        }
    }

    public function update(Request $request, $id)
    {
        $Sucursal = Sucursal::findOrFail($id);
        $Sucursal->Nombre = $request->Nombre;
        $Sucursal->Direccion = $request->Direccion;
        $Sucursal->Telefono = $request->Telefono;

        $Sucursal->save();

        return $Sucursal->save()
            ? back()->with("correcto", "Sucursal modificada correctamente")
            : back()->with("incorrecto", "Error al modificar la Sucursal");
    }

    public function delete($id)
    {
        $Sucursal = Sucursal::findOrFail($id);
        $Sucursal->delete();

        return $Sucursal->delete()
            ? back()->with("incorrecto", "Error al eliminar Sucursal")
            : back()->with("correcto", "Sucursal eliminada correctamente");
    }
}
