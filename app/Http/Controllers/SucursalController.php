<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
  public function __invoke()
{


    $sucursal =  Sucursal::all();

    return view('layouts.sucursal', compact('sucursal'));
}

    //
}
