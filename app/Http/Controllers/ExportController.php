<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\InscripcionesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        return view('layouts.Reportes.alumnosInscritos');
    }

    public function export()
    {
        return Excel::download(new InscripcionesExport, 'inscripciones.xlsx');
    }
}
