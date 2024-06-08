<?php

namespace App\Exports;

use App\Models\inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InscripcionesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('layouts.Exportaciones.exportInscripciones', [
           'inscripciones' => inscripcion::all()
        ]);
    }

}
