<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\FamiliasController;
use App\Http\Controllers\PistasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\DatosGeneralesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CobrosController;

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
//Artículos
Route::get('articulos/listar', [ArticulosController::class, 'listar'])->name('listar_articulos');
Route::get('articulos/editar/{id}', [ArticulosController::class, 'editar'])->name('editar_articulo');
Route::put('articulos/actualizar/{id}', [ArticulosController::class, 'actualizar'])->name('actualizar_articulo');
Route::get('articulos/crear', [ArticulosController::class, 'crear'])->name('crear_articulo');
Route::post('articulos/guardar', [ArticulosController::class, 'guardar'])->name('guardar_articulo');
Route::delete('articulos/eliminar/{id}', [ArticulosController::class, 'eliminar'])->name('eliminar_articulo');
//Familias
Route::get('familias/listar', [FamiliasController::class, 'listar'])->name('listar_familias');
Route::get('familias/editar/{id}', [FamiliasController::class, 'editar'])->name('editar_familia');
Route::put('familias/actualizar/{id}', [FamiliasController::class, 'actualizar'])->name('actualizar_familia');
Route::get('familias/crear', [FamiliasController::class, 'crear'])->name('crear_familia');
Route::post('familias/guardar', [FamiliasController::class, 'guardar'])->name('guardar_familia');
Route::delete('familias/eliminar/{id}', [FamiliasController::class, 'eliminar'])->name('eliminar_familia');
//Pistas
Route::get('pistas/listar', [PistasController::class, 'listar'])->name('listar_pistas');
Route::get('pistas/editar/{id}', [PistasController::class, 'editar'])->name('editar_pista');
Route::put('pistas/actualizar/{id}', [PistasController::class, 'actualizar'])->name('actualizar_pista');
Route::get('pistas/crear', [PistasController::class, 'crear'])->name('crear_pista');
Route::post('pistas/guardar', [PistasController::class, 'guardar'])->name('guardar_pista');
Route::delete('pistas/eliminar/{id}', [PistasController::class, 'eliminar'])->name('eliminar_pista');
//Usuarios
Route::get('usuarios/listar', [UsuariosController::class, 'listar'])->name('listar_usuarios');
Route::get('usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('editar_usuario');
Route::put('usuarios/actualizar/{id}', [UsuariosController::class, 'actualizar'])->name('actualizar_usuarios');
Route::get('usuarios/crear', [UsuariosController::class, 'crear'])->name('crear_usuario');
Route::post('usuarios/guardar', [UsuariosController::class, 'guardar'])->name('guardar_usuario');
Route::delete('usuarios/eliminar/{id}', [UsuariosController::class, 'eliminar'])->name('eliminar_usuario');
//Panel de control
Route::get('controlpanel', [ControlPanelController::class, 'index'])->name('controlpanel');
//Datos generales
Route::get('datosgenerales', [DatosGeneralesController::class, 'editar'])->name('editar_datos_generales');
Route::put('datosgenerales', [DatosGeneralesController::class, 'actualizar'])->name('actualizar_datos_generales');
//Reservas
Route::get('reservarpista', [ReservasController::class, 'reservar'])->name('reservar_pista');
//Ventas
Route::get('ventas/listar', [VentasController::class, 'listar'])->name('listar_ventas');
Route::get('ventas/editar/{id}', [VentasController::class, 'editar'])->name('editar_venta');
Route::put('ventas/actualizar/{id}', [VentasController::class, 'actualizar'])->name('actualizar_venta');
Route::get('ventas/crear', [VentasController::class, 'crear'])->name('crear_venta');
Route::post('ventas/guardar', [VentasController::class, 'guardar'])->name('guardar_venta');
Route::delete('ventas/eliminar/{id}', [VentasController::class, 'eliminar'])->name('eliminar_venta');
//Cobros
Route::get('cobros/listar', [CobrosController::class, 'listar'])->name('listar_cobros');
Route::get('cobros/editar/{id}', [CobrosController::class, 'editar'])->name('editar_cobro');
Route::put('cobros/actualizar/{id}', [CobrosController::class, 'actualizar'])->name('actualizar_cobro');
Route::get('cobros/crear', [CobrosController::class, 'crear'])->name('crear_cobro');
Route::post('cobros/guardar', [CobrosController::class, 'guardar'])->name('guardar_cobro');
Route::delete('cobros/eliminar/{id}', [CobrosController::class, 'eliminar'])->name('eliminar_cobro');