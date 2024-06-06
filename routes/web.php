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
use App\Http\Controllers\admin\ubicacionController;
use App\Http\Controllers\Auth\PerfilesController;

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
Route::get('/externo', function () {
    return view('externo');
});
Route::get('/interno', function () {
    return view('interno');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::group(['middleware' => ['auth']], function () {
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
    Route::resource('admin/ubicacion', ubicacionController::class);

    Route::post('admin/imprimir-certificado-registro', [PerfilesController::class, 'imprimir_certificado_registro']);
    Route::post('admin/imprimir-certificado-seguridad', [PerfilesController::class, 'imprimir_certificado_seguridad']);
    Route::post('admin/imprimir-certificado-francobordo', [PerfilesController::class, 'imprimir_certificado_francobordo']);
    Route::post('admin/imprimir-certificado-arqueo', [PerfilesController::class, 'imprimir_certificado_arqueo']);
    Route::get('admin/imprimir', [ArtefactosController::class, 'imprimir']);
    Route::get('admin/perf45a', [PerfilesController::class, 'administrador']);
    Route::get('admin/perf45j', [PerfilesController::class, 'jefe']);
    Route::get('admin/perf45i', [PerfilesController::class, 'interno']);
    Route::get('admin/perf45r', [PerfilesController::class, 'registrador']);
    //Rutas para registrar
    Route::post('admin/registro', [PerfilesController::class, 'registrar']);
    Route::post('admin/registro/guardarRegistro', [PerfilesController::class, 'guardarRegistro']);
    Route::get('admin/registro', [PerfilesController::class, 'registrar']);
    Route::get('admin/registro/guardarRegistro', [PerfilesController::class, 'guardarRegistro']);
    //Rutas para renovar
    Route::post('admin/renovar', [PerfilesController::class, 'renovar']);
    Route::post('admin/renovar/guardarRenovacion', [PerfilesController::class, 'guardarRenovacion']);
    //Rutas para corregir
    Route::post('admin/corregir', [PerfilesController::class, 'corregir']);
    Route::post('admin/corregir/guardarCorrección', [PerfilesController::class, 'guardarCorrección']);
    //Rutas para certificar
    Route::resource('admin/certificados', certificadosController::class);
});
Route::resource('admin/certicados', 'admin\certicadosController');
Route::resource('admin/certificados', 'admin\certificadosController');
