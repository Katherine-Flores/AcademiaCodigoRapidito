<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcerdaController extends Controller
{
    public function index()
    {
        return view('layouts.acerca');
    }
}
