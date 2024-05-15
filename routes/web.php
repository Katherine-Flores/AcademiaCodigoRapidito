<?php

use App\Http\Controllers\CatedraticosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AcerdaController;
use App\Http\Controllers\AsignacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Ruta */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Ruta para visualizar los registros de la tabla catedratico */
Route::get('/catedraticos', [CatedraticosController::class, '__invoke'])->name('catedraticos.invoke');

/* Ruta para visualizar los registros de la tabla sucursal */
Route::get('/sucursal', [SucursalController::class, '__invoke'])->name('sucursal.invoke');

/* Ruta para visualizar los registros de la tabla grado */
Route::get('/grados', [GradosController::class, '__invoke'])->name('grados.invoke');

/* Ruta para visualizar los registros de la tabla curso */
Route::get('/cursos', [CursosController::class, '__invoke'])->name('cursos.invoke');

/* Ruta para visualizar la vista de misión y visión de la academia */
Route::get('/acerca-de', [AcerdaController::class, 'index'])->name('acerca-de');

/* Rutas de Asignación */
Route::get('/asignacion', [AsignacionController::class, 'index'])->name('asignacion'); //
Route::get('/asignaciones', [AsignacionController::class, '__invoke'])->name('asignacion.invoke'); // Vista de todos los registros de la tabla asignación
Route::post('/regitro', [AsignacionController::class, 'store'])->name('asignacion.store'); // Lógica para almacenar un nuevo registro
Route::put('/modificar/{id}', [AsignacionController::class, 'update'])->name('asignacion.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar/{id}', [AsignacionController::class, 'delete'])->name('asignacion.delete'); // Lógica para eliminar un registro existente
