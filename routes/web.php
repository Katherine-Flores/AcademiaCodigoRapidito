<?php
use App\Http\Controllers\CatedraticosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\GradosController;
use App\Http\Controllers\CursosController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catedraticos', CatedraticosController::class);
Route::get('/sucursal', SucursalController::class);
Route::get('/grados', GradosController::class);
Route::get('/cursos', CursosController::class);
Route::get('/acerca-de', [\App\Http\Controllers\AcerdaController::class, 'index'])->name('layouts.acerca');
