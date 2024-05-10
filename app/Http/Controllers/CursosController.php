<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursosController extends Controller
{
    public function __invoke()
    {
        $cursos = Curso::all();
        return view('layouts.cursos', compact('cursos'));
    }
}
