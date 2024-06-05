<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Personal;
use App\Models\Usuario;
use App\Models\User;
use App\Models\Artefacto;
use App\Models\Cuenca;
use App\Models\BasesOperativa;
use App\Models\Certificacione;
use App\Models\certificado;
use App\Models\ListaPropietario;
use App\Models\Material;
use App\Models\Tipo;
use App\Models\Motore;
use App\Models\datosAdicionale;
use App\Models\Documentacione;
use App\Models\Inspeccione;
use App\Models\ubicacion;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Ramsey\Uuid\Type\Integer;
use Carbon\Carbon;


class PerfilesController extends Controller
{
    /**AQUIIII: adapta esta cosa para controlar perfiles como el jefe, interno y externo
     * luego recomiendo que el if se cambie por un switch
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(request $request)
    {
        $idusuario = Auth::user()->id;
        $usuario = Usuario::findOrFail($idusuario);
        switch ($usuario->nivel) {
            case 1:
                return $this->administrador($request);
                break;
            case 2:
                return $this->jefe($request);
                break;
            case 3:
                return $this->interno($request);
                break;
            case 4:
                return $this->registrador($request);
                break;
        }
    }
    public function administrador(request $request)
    {
        //@dd('id:', Auth::user()->id);
        $idusuario = Auth::user()->id;
        $usuario = Usuario::findOrFail($idusuario);

        if ($usuario->nivel == 1) {
            $artefactos = Artefacto::all();
            $vista = \View::make('admin.perfiles.prueba', compact('artefactos'))->render();
            return view('admin.perfiles.prueba', compact('vista', 'artefactos'));
        }
    }
    public function jefe(request $request)
    {
        //@dd('id:', Auth::user()->id);
        $idusuario = Auth::user()->id;
        $usuario = Usuario::findOrFail($idusuario);
        $perfil = Personal::findOrFail($usuario->idPersonal);
        $personal = Personal::All();
        if ($usuario->nivel == 2) {
            $vista = \View::make('admin.perfiles.Jefe', compact('personal', 'usuario', 'perfil'))->render();
            return view('admin.perfiles.Jefe', compact('vista', 'personal', 'usuario', 'perfil'));
        }
    }
    public function interno(request $request)
    {
        //@dd('id:', Auth::user()->id);
        $idusuario = Auth::user()->id;
        $usuario = Usuario::findOrFail($idusuario);
        $perfil = Personal::findOrFail($usuario->idPersonal);
        $persona = Personal::All();
        if ($usuario->nivel == 3) {
            $vista = \View::make('admin.perfiles.interno', compact('persona', 'usuario', 'perfil'))->render();
            return view('admin.perfiles.interno', compact('vista', 'persona', 'usuario', 'perfil'));
        }
    }
    public function registrador(request $request)
    {
        //@dd('id:', Auth::user()->id);
        $idusuario = Auth::user()->id;
        $usuario = Usuario::findOrFail($idusuario);
        $perfil = Personal::findOrFail($usuario->idPersonal);
        $personal = Personal::All();
        $basesoperativas = BasesOperativa::All();
        $cuencas = Cuenca::All();
        //$listapropietarios = ListaPropietario::where('idUsuario','and','id');
        $listapropietarios = ListaPropietario::latest('idPropietario')->paginate(25);;
        if ($usuario->nivel == 4) {
            $vista = \View::make('admin.perfiles.externo', compact('listapropietarios','personal', 'usuario', 'perfil', 'basesoperativas', 'cuencas'))->render();
            return view('admin.perfiles.externo', compact('vista', 'listapropietarios', 'personal', 'usuario', 'perfil', 'basesoperativas', 'cuencas'));
        }
    }

    public function registrar(Request $request)
    {
        $perPage = 25;
        $requestData = $request->all();
        //dd($requestData);
        $cuenca = $request->idCuenca;
        $baseoperativa = $request->idBaseOperativa;
        $personas = Personal::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuarios = Usuario::All();
        //$usuario = Usuario::findOrFail(Auth::user()->id);
        $artefactos = Artefacto::All();
        $propietarios = Propietario::All();
        $basesoperativas = BasesOperativa::All();
        $cuencas = Cuenca::All();
        $certificacion = Certificacione::All();
        //Usuario::create($requestData);

        return view('admin.registros.create', compact('tipos', 'materiales', 'personas', 'usuarios', 'artefactos', 'basesoperativas', 'cuencas', 'certificacion'));
    }
    /*
    Aqui recibo todos los datos para todas las tablas de parte del  registrador
    reparto todo el request par apartirlo en los request necesarios para cada caso
    */
    public function guardarRegistro(Request $request)
    {
        $Usuario = Usuario::findOrFail(Auth::user()->id);
        $requestData = $request->all();
        $requestPropietario = ['nombre' => $requestData['nombre'], 'tipo' => $requestData['tipo'], 'identificador' => $requestData['identificador'], 'FechaIni' => $requestData['FechaIni']];
        //cabe resaltar que en la siguiente linea
        //obtengo todos los campos del reciente registro
        //y me es tan ffácil sacar la id con un ->id
        $idPropietario = Propietario::create($requestPropietario);
        //$idPropietario=Propietario::latest()->first();
        $requestArtefacto = [
            'idUsuarios' => $Usuario->id, 'idBaseOperativa' => $requestData['idBaseOperativa'], 'matricula' => $requestData['matricula'], 'nombre' => $requestData['nombreA'], 'idTipo' => $requestData['idTipo'], 'idMaterial' => $requestData['idMaterial'],
            'eslora' => $requestData['eslora'], 'manga' => $requestData['manga'], 'puntal' => $requestData['puntal'],
            'francobordo' => $requestData['francobordo'], 'propulsion' => $requestData['propulsion'], 'construccion' => $requestData['construccion'], 'trn' => $requestData['trn'], 'trb' => $requestData['trb'],
            'servicio' => $requestData['servicio'], 'asociacion' => $requestData['asociacion'], 'observaciones' => $requestData['observaciones']
        ];
        $idArtefacto = Artefacto::create($requestArtefacto);
        $requestListaPropietarios = ['idPropietario' => $idPropietario->id, 'idArtefacto' => $idArtefacto->id];
        ListaPropietario::create($requestListaPropietarios);

        $requestMotor = [
            'idArtefacto' => $idArtefacto->id, 'tipo' => $requestData['tipoM'], 'marca' => $requestData['marca'], 'numero' => $requestData['numero'],
            'potencia' => $requestData['potencia'], 'nominalelectrica' => $requestData['nominalelectrica']
        ];
        Motore::create($requestMotor);
        /* 
     * carga comb es un número con valores
     * 11,12,13 para vehículos autopropulsados
     * 21,22,23 para vehículos sin propulsión
     * 
     */
        $requestDatoAdicional = [
            'idArtefacto' => $idArtefacto->id, 'lugar' => $requestData['lugar'], 'mercPelig' => $requestData['mercPelig'],
            'maxPasajeros' => $requestData['maxPasajeros'], 'cargaComb' => $requestData['cargaComb'], 'peso' => $requestData['peso'], 'altura' => $requestData['altura']
        ];
        datosAdicionale::create($requestDatoAdicional);
        $requestInspeccion = ['idArtefacto' => $idArtefacto->id, 'gestion' => $requestData['gestion'], 'jefeinspector' => $requestData['jefeinspector'], 'motivo' => $requestData['motivo']];
        Inspeccione::create($requestInspeccion);
        $requestDocumentacion = ['idArtefacto' => $idArtefacto->id, 'directorio' => $requestData['directorio']];
        Documentacione::create($requestDocumentacion);
        return redirect('admin/perf45r')->with('flash_message', 'Nuevo registro exitoso!!!');
    }
    // Definir función para agregar tiempo a una fecha y devolverla en formato dd/mm/aaaa
    public function imprimir_certificado_registro(Request $request)
    { //muestro un pdf
        $requestData = $request->all();
        //$cuenca=$request->idCuenca;
        //protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial',
        //'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'servicio', 'asociacion', 'observaciones'];
        $baseoperativa = $request->idBaseOperativa;
        $propietario = Propietario::findOrFail($requestData['idPropietario']);
        //dd($propietario);
        $artefacto = Artefacto::findOrFail($requestData['idArtefacto']);
        $inspeccion = Inspeccione::findOrFail($requestData['idArtefacto']);
        $tipo = Tipo::findOrFail($artefacto['idTipo']);
        $material = Material::findOrFail($artefacto['idMaterial']);
        //$usuario = Usuario::findOrFail(Auth::user()->id);
        //$id=$artefacto['idBaseOperativa'];
        $basesoperativa = BasesOperativa::findOrFail($artefacto['idBaseOperativa']);
        $motor = Motore::findOrFail($artefacto['idBaseOperativa']);
        $datoAdicional = datosAdicionale::findOrFail($artefacto['idBaseOperativa']);
        //dd($basesoperativa);
        $cuenca = Cuenca::findOrFail($basesoperativa['idCuenca']);
        //Proceso para añadir 1 al control de numeros de registro por cuenca
        $numeroc = Certificacione::findOrFail($cuenca['id']);
        $aux = $numeroc;
        $numero = $numeroc['numero'];
        $numero = $numero + 1;
        $aux['numero'] = $numero;
        //$numeroc->update($aux);
        $fechaActual = date('m-d-Y');
        $fechaActualTimestamp = strtotime($fechaActual);
        $fechaActual = date('Y-m-d');
        $nuevaFechaTimestamp = strtotime('+5 years', $fechaActualTimestamp);
        $fechaVencimiento = date('Y-m-d', $nuevaFechaTimestamp);
        //dd('Fechats: '.$fechaVencimiento);
        $fechaAlertaTimestamp = strtotime('-6 months', $nuevaFechaTimestamp);
        $fechaAlerta = date('Y-m-d', $fechaAlertaTimestamp);
        //dd('Fechats'.$fechaAlerta);
        //dd($fechaVencimiento);

        //Proceso para añadir un certificado
        //'idArtefactos', 'tipoC', 'nreg','correlativo', 'fechaEmision', 'fechaVecimiento'
        /*
         * 
     * tipoC corresponde a un tipo de certificado
     * registro=1
     * seguridad=2
     * arqueo=3
     * fb=4
     * medioAmb=5
     * dot min=6
     * 
     */
        $requestCertificado = [
            'idArtefacto' => $requestData['idArtefacto'], 'tipoC' => '1',
            'nreg' => $numero, 'correlativo' => $requestData['correlativo'], 'fechaEmision' => $fechaActual, 'fechaAlerta' => $fechaAlerta, 'fechaVencimiento' => $fechaVencimiento
        ];
        //dd($requestCertificado);
        $certificacion = certificado::create($requestCertificado);
        $certificacion['fechaEmision'] = $this->mostrarFechaFormateada($certificacion['fechaEmision']);
        $certificacion['fechaVencimiento'] = $this->mostrarFechaFormateada($certificacion['fechaVencimiento']);
        ($certificacion['fechaVencimiento']);
        $vista = \View::make('admin.certificadospdf.certificarregistro', compact('propietario', 'tipo', 'material', 'artefacto', 'basesoperativa', 'cuenca',
        'certificacion','inspeccion','motor', 'datoAdicional'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('registro'.$requestCertificado['nreg'].'.pdf');
    }
    
    public function mostrarFechaFormateada($fecha) {
    $dia=Carbon::parse($fecha)->format('d');
    $mes=Carbon::parse($fecha)->format('m');
    $año=Carbon::parse($fecha)->format('Y');
    
    switch ($mes) {
        case '01':
            # code...
            $mes='ENERO';
            break;
        case '02':
            # code...
            $mes='FEBRERO';
            break;
        case '03':
            # code...
            $mes='MARZO';
            break;
        case '04':
            # code...
            $mes='ABRIL';
            break;
        case '05':
            # code...
            $mes='MAYO';
        break;
        case '06':
            # code...
            $mes='JUNIO';
            break;
        case '07':
            # code...
            $mes='JULIO';
            break;
        case '08':
            # code...
            $mes='AGOSTO';
            break;
        case '09':
            # code...
            $mes='SEPTIEMBRE';
            break;
        case '10':
            # code...
            $mes='OCTUBRE';
        break;
        case '11':
            # code...
            $mes='NOVIEMBRE';
            break;
        case '12':
            # code...
            $mes='DICIEMBRE';
        break;
        default:
            # code...
            break;
    }

    $fechaFormateada = $dia.' DE '.$mes.' DE '.$año;
    return $fechaFormateada;
    }
    public function imprimir_certificado_seguridad()
    { //muestro un pdf
        /*dd('Probando imprimir certificados');*/
        $artefactos = Artefacto::all();
        $vista = \View::make('admin.certificadospdf.certificarseguridad', compact('artefactos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('seguridad.pdf');
    }
    public function imprimir_certificado_francobordo()
    { //muestro un pdf
        /*dd('Probando imprimir certificados');*/
        $artefactos = Artefacto::all();
        $vista = \View::make('admin.certificadospdf.certificarfrancobordo', compact('artefactos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('francobordo.pdf');
    }
    public function imprimir_certificado_arqueo()
    { //muestro un pdf
        /*dd('Probando imprimir certificados');*/
        $artefactos = Artefacto::all();
        $vista = \View::make('admin.certificadospdf.certificararqueo', compact('artefactos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('arqueo.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $personas = Personal::All();
        return view('admin.usuarios.create', compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Usuario::create($requestData);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario agregado!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Usuario::destroy($id);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario borrado!');
    }
}
