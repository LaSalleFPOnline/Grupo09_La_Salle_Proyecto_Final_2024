<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PistasController;
use App\Http\Controllers\ControlPanelController;

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

// Inicio
Route::get('/', [InicioController::class, 'inicio'])->name('inicio');
//Pistas
Route::get('pistas/listar', [PistasController::class, 'listar'])->name('listar_pistas');
Route::get('pistas/editar/{id}', [PistasController::class, 'editar'])->name('editar_pista');
Route::put('pistas/actualizar/{id}', [PistasController::class, 'actualizar'])->name('actualizar_pista');
Route::get('pistas/crear', [PistasController::class, 'crear'])->name('crear_pista');
Route::post('pistas/guardar', [PistasController::class, 'guardar'])->name('guardar_pista');
Route::delete('pistas/eliminar/{id}', [PistasController::class, 'eliminar'])->name('eliminar_pista');
//Panel de conttrol
Route::get('controlpanel', [ControlPanelController::class, 'index'])->name('controlpanel');
