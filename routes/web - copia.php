<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PersonalController;
use App\Http\Controllers\admin\MaterialController;
use App\Http\Controllers\admin\TipoController;
use App\Http\Controllers\admin\PropietarioController;
use App\Http\Controllers\admin\CuencaController;
use App\Http\Controllers\admin\ArtefactosController;
use App\Http\Controllers\admin\BasesOperativasController;
use App\Http\Controllers\admin\UsuariosController;
use App\Http\Controllers\admin\DocumentacionesController;
use App\Http\Controllers\admin\InspeccionesController;
use App\Http\Controllers\admin\ListaPropietariosController;
use App\Http\Controllers\admin\CertificacionesController;
use App\Http\Controllers\admin\MotoresController;
use App\Http\Controllers\admin\datosAdicionalesController;
use App\Http\Controllers\admin\RecuperarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/personal', PersonalController::class);
Route::resource('admin/material', MaterialController::class);
Route::resource('admin/tipo', TipoController::class);
Route::resource('admin/cuenca', CuencaController::class);
Route::resource('admin/propietario', PropietarioController::class);
Route::resource('admin/artefactos', ArtefactosController::class);
Route::resource('admin/bases-operativas', BasesOperativasController::class);
Route::resource('admin/usuarios', UsuariosController::class);
Route::resource('admin/documentaciones', DocumentacionesController::class);
Route::resource('admin/inspecciones', InspeccionesController::class);
Route::resource('admin/lista-propietarios', ListaPropietariosController::class);
Route::resource('admin/certificaciones', CertificacionesController::class);
Route::resource('admin/motores', MotoresController::class);
Route::resource('admin/datos-adicionales', datosAdicionalesController::class);
Route::resource('admin/recuperar', RecuperarController::class);