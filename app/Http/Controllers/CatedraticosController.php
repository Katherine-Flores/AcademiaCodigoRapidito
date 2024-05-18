<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatedratico;
use App\Models\Catedratico;
use Illuminate\Http\Request;

class CatedraticosController extends Controller
{
    public function __invoke()
    {
        $catedraticos = Catedratico::all();
        return view('layouts.catedraticos', compact('catedraticos'));
    }

    public function create(CreateCatedratico $request)
    {
        $Catedratico = new Catedratico();


        $Catedratico->Codigo_Catedratico = $request->Codigo_Catedratico;
        $Catedratico->Nombre = $request->Nombre;
        $Catedratico->Correo = $request->Correo;
        $Catedratico->Telefono = $request->Telefono;

        $Catedratico->save();

        //return redirect()->route('asignaciones');
        if ( $Catedratico->save() == true) {
            return back()->with("correcto", "Catedratico registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar catedratico");
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
            ? back()->with("correcto", "Catedratico modificado correctamente")
            : back()->with("incorrecto", "Error al modificar catedratico");
    }

    public function delete($id)
    {
        $Catedratico = Catedratico::findOrFail($id);
        $Catedratico->delete();

        return $Catedratico->delete()
            ? back()->with("incorrecto", "Error al eliminar catedratico")
            : back()->with("correcto", "Catedratico eliminado correctamente");
    }
}
