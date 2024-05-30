<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Catedratico;
use App\Models\Curso;
use App\Models\Grado;
use App\Models\inscripcion;
use App\Models\Notas;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $data = [
            'alumnosCount' => Alumno::count(),
            'catedraticosCount' => Catedratico::count(),
            'sucursalesCount' => Sucursal::count(),
            'gradosCount' => Grado::count(),
            'cursosCount' => Curso::count(),
            'inscripcionCount' => inscripcion::count(),
        ];

        // Calcular alumnos inscritos
        $data['alumnosInscritosCount'] = Alumno::has('inscripciones')->count();

        return view('adminindex.index', compact('data'));
    }
}
