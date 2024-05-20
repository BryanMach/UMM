<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\admin\certificadosController;
use App\Http\Controllers\admin\PerfilesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::group(['middleware'=> ['auth']], function () {
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
    Route::get('admin/imprimir-certificado-registro',[ArtefactosController::class,'imprimir_certificado_registro']);
    Route::get('admin/imprimir-certificado-seguridad',[ArtefactosController::class,'imprimir_certificado_seguridad']);
    Route::get('admin/imprimir-certificado-francobordo',[ArtefactosController::class,'imprimir_certificado_francobordo']);
    Route::get('admin/imprimir-certificado-arqueo',[ArtefactosController::class,'imprimir_certificado_arqueo']);
    Route::get('admin/imprimir',[ArtefactosController::class,'imprimir']);
    Route::resource('admin/perfil',PerfilesController::class);
    Route::resource('admin/certificados', certificadosController::class);
});
Route::resource('admin/certicados', 'admin\certicadosController');
Route::resource('admin/certificados', 'admin\certificadosController');