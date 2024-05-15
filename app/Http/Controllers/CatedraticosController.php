<?php

namespace App\Http\Controllers;

use App\Models\Catedratico;
use Illuminate\Http\Request;

class CatedraticosController extends Controller
{
    public function __invoke()
    {
        $catedraticos = Catedratico::all();
        return view('layouts.catedraticos', compact('catedraticos'));
    }
}
