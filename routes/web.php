<?php

use App\Http\Controllers\CatedraticosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\AcerdaController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\AlumnosController;
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
Route::get('/sucursales', [SucursalController::class, '__invoke'])->name('sucursal.invoke');

/* Ruta para visualizar los registros de la tabla grado */
Route::get('/grados', [GradosController::class, '__invoke'])->name('grados.invoke');

/* Ruta para visualizar los registros de la tabla curso */
Route::get('/cursos', [CursosController::class, '__invoke'])->name('cursos.invoke');

/* Ruta para visualizar la vista de misión y visión de la academia */
Route::get('/acerca-de', [AcerdaController::class, 'index'])->name('acerca-de');

/* Rutas de Asignación */
Route::get('/asignacion', [AsignacionController::class, 'index'])->name('asignacion'); // Vista del filtrado de asignaciones
Route::get('/asignaciones', [AsignacionController::class, '__invoke'])->name('asignacion.invoke'); // Vista de todos los registros de la tabla asignación
Route::post('/regitro', [AsignacionController::class, 'store'])->name('asignacion.store'); // Lógica para almacenar un nuevo registro
Route::put('/modificar/{id}', [AsignacionController::class, 'update'])->name('asignacion.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar/{id}', [AsignacionController::class, 'delete'])->name('asignacion.delete'); // Lógica para eliminar un registro existente

/* Rutas de Catedraticos */
Route::get('/catedratico', [CatedraticosController::class, 'index'])->name('catedratico'); // // Vista del filtrado de catedraticos
Route::post('/regitro-catedratico', [CatedraticosController::class, 'create'])->name('catedratico.create'); // Lógica para almacenar un nuevo registro
Route::put('/modificar-catedratico/{id}', [CatedraticosController::class, 'update'])->name('catedratico.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar-catedratico/{id}', [CatedraticosController::class, 'delete'])->name('catedratico.delete'); // Lógica para eliminar un registro existente

  /* Rutas del CRUD de Curso */
Route::get('/curso', [CursosController::class, 'index'])->name('curso'); // Vista del filtrado de cursos
Route::post('/regitro-curso', [CursosController::class, 'create'])->name('cursos.create'); // Lógica para almacenar un nuevo registro
Route::put('/modificar-curso/{id}', [CursosController::class, 'update'])->name('cursos.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar-curso/{id}', [CursosController::class, 'delete'])->name('cursos.delete'); // Lógica para eliminar un registro existente

/* Rutas del CRUD de Grado */
Route::get('/grado', [GradosController::class, 'index'])->name('grado'); // Vista del filtrado de grados
Route::post('/regitro-grado', [GradosController::class, 'create'])->name('grados.create'); // Lógica para almacenar un nuevo registro
Route::put('/modificar-grado/{id}', [GradosController::class, 'update'])->name('grados.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar-grado/{id}', [GradosController::class, 'delete'])->name('grados.delete'); // Lógica para eliminar un registro existente

/* Rutas del CRUD de Sucursal */
Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal'); // // Vista del filtrado de catedraticos
Route::post('/regitro-sucursal', [SucursalController::class, 'create'])->name('sucursal.create'); // Lógica para almacenar un nuevo registro
Route::put('/modificar-sucursal/{id}', [SucursalController::class, 'update'])->name('sucursal.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar-sucursal/{id}', [SucursalController::class, 'delete'])->name('sucursal.delete'); // Lógica para eliminar un registro existente

/* Rutas del CRUD de Alumno */
Route::get('/alumnos', [AlumnosController::class, '__invoke'])->name('alumno.invoke'); // Vista de todos los registros de la tabla alumno
Route::get('/alumno', [AlumnosController::class, 'index'])->name('alumno'); // Vista del filtrado de alumnos
Route::post('/regitro-alumno', [AlumnosController::class, 'create'])->name('alumno.create'); // Lógica para almacenar un nuevo registro
Route::put('/modificar-alumno/{id}', [AlumnosController::class, 'update'])->name('alumno.update'); // Lógica para modificar un registro existente
Route::delete('/eliminar-alumno/{id}', [AlumnosController::class, 'delete'])->name('alumno.delete'); // Lógica para eliminar un registro existente
