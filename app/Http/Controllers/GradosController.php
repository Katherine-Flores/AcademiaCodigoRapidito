<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;

class GradosController extends Controller
{
    public function __invoke()
    {
        $grados = Grado::all();
        return view('layouts.grados', compact('grados'));
    }
}
