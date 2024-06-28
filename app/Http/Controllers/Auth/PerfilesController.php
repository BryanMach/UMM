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
use App\Models\servicio;
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
    public function bienvenida()
    {
        $paginas = 5;
        $artefactos = Artefacto::join('lista_propietarios', 'lista_propietarios.idArtefacto', '=', 'artefactos.id')
            ->select('artefactos.*')
            ->paginate($paginas);
        $bases = BasesOperativa::all();
        $jefe = Personal::where('idCargo', 2)
            ->where('vigencia', 1)
            ->get();
        $cuencas = Cuenca::all();

        // Crear un array para almacenar los conteos
        $counts = [];

        // Iterar sobre cada cuenca y contar los artefactos asociados
        foreach ($cuencas as $cuenca) {
            $count = Artefacto::whereHas('baseOperativa', function ($query) use ($cuenca) {
                $query->where('idCuenca', $cuenca->id);
            })->count();

            // Almacenar el conteo en el array, usando el nombre de la cuenca como clave
            $counts[$cuenca->cuenca] = $count;
        }
        return view('welcome', compact('artefactos', 'bases', 'jefe', 'counts'));
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
        $listaL = ListaPropietario::join('artefactos', 'lista_propietarios.idArtefacto', '=', 'artefactos.id')
            ->join('bases_operativas', 'artefactos.idBaseOperativa', '=', 'bases_operativas.id')
            ->where('bases_operativas.idCuenca', 3)
            ->select('lista_propietarios.*')
            ->get();
        $listaP = ListaPropietario::join('artefactos', 'lista_propietarios.idArtefacto', '=', 'artefactos.id')
            ->join('bases_operativas', 'artefactos.idBaseOperativa', '=', 'bases_operativas.id')

            ->where('bases_operativas.idCuenca', 2)
            ->select('lista_propietarios.*')
            ->get();

        $listaA = ListaPropietario::join('artefactos', 'lista_propietarios.idArtefacto', '=', 'artefactos.id')
            ->join('bases_operativas', 'artefactos.idBaseOperativa', '=', 'bases_operativas.id')

            ->where('bases_operativas.idCuenca', 1)
            ->select('lista_propietarios.*')
            ->get();
        $nivel = $usuario['nivel'];
        if ($usuario->nivel == 3) {
            $vista = \View::make('admin.perfiles.interno', compact('persona', 'usuario', 'perfil', 'listaL', 'listaP', 'listaA'))->render();
            return view('admin.perfiles.interno', compact('vista', 'persona', 'usuario', 'perfil', 'listaL', 'listaP', 'listaA'));
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
        $listapropietarios = ListaPropietario::join('artefactos', 'lista_propietarios.idArtefacto', '=', 'artefactos.id')
            ->join('usuarios', 'artefactos.idUsuarios', '=', 'usuarios.id')
            ->where('usuarios.id', $usuario->id)
            ->select('lista_propietarios.*')
            ->get();
        $nivel = $usuario['nivel'];
        //$listapropietarios = ListaPropietario::latest('idPropietario')->paginate(25);;
        if ($usuario->nivel == 4) {
            $vista = \View::make('admin.perfiles.externo', compact('listapropietarios', 'personal', 'usuario', 'perfil', 'basesoperativas', 'cuencas', 'nivel'))->render();
            return view('admin.perfiles.externo', compact('vista', 'listapropietarios', 'personal', 'usuario', 'perfil', 'basesoperativas', 'cuencas', 'nivel'));
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
        $servicios = servicio::all();
        //Usuario::create($requestData);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.registros.create', compact('tipos', 'materiales', 'personas', 'usuarios', 'artefactos', 'basesoperativas', 'cuencas', 'certificacion', 'nivel', 'servicios'));
    }
    public function renovar(Request $request)
    {
        $perPage = 25;
        $requestData = $request->all();
        //dd($requestData['id']);
        $cuenca = $request->idCuenca;
        $baseoperativa = $request->idBaseOperativa;
        $personas = Personal::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuarios = Usuario::All();
        //$usuario = Usuario::findOrFail(Auth::user()->id);
        $listapropietarios = ListaPropietario::findOrFail($requestData['id']);
        $artefactos = Artefacto::findOrFail($listapropietarios['idArtefacto']);
        $propietarios = Propietario::findOrFail($listapropietarios['idPropietario']);
        $basesoperativas = BasesOperativa::All();
        $cuencas = Cuenca::All();
        $certificacion = Certificacione::All();
        //Usuario::create($requestData);

        return view('admin.registros.create', compact('tipos', 'materiales', 'personas', 'usuarios', 'artefactos', 'basesoperativas', 'cuencas', 'certificacion'));
    }
    public function corregir(Request $request)
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
        $listapropietarios = ListaPropietario::findOrFail($requestData['id']);
        $artefacto = Artefacto::findOrFail($listapropietarios['idArtefacto']);
        $propietario = Propietario::findOrFail($listapropietarios['idPropietario']);
        $motore = Motore::findOrFail($listapropietarios['idPropietario']);
        $datosadicionale = datosAdicionale::findOrFail($listapropietarios['idPropietario']);
        $inspeccione = Inspeccione::findOrFail($listapropietarios['idPropietario']);
        $documentacione = Documentacione::findOrFail($listapropietarios['idPropietario']);
        $basesoperativas = BasesOperativa::All();
        $cuencas = Cuenca::All();
        $certificacion = Certificacione::All();
        //Usuario::create($requestData);
        /*
        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);
        */
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.registros.edit', compact('propietario', 'motore', 'datosadicionale', 'inspeccione', 'documentacione', 'tipos', 'materiales', 'personas', 'usuarios', 'artefacto', 'basesoperativas', 'cuencas', 'certificacion', 'nivel'));
    }
    public function guardarRenovacion(Request $request)
    {
        /*
        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);
        */
        $Usuario = Usuario::findOrFail(Auth::user()->id);
        $requestData = $request->all();
        $requestPropietario = ['nombre' => $requestData['nombre'], 'tipo' => $requestData['tipo'], 'identificador' => $requestData['identificador'], 'FechaIni' => $requestData['FechaIni']];
        dd($requestPropietario);
        //cabe resaltar que en la siguiente linea
        //obtengo todos los campos del reciente registro
        //y me es tan ffácil sacar la id con un ->id
        $idPropietario = Propietario::findOrFail(Auth::user()->id);
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
     *
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
            'francobordo' => $requestData['francobordo'], 'propulsion' => $requestData['choice'], 'construccion' => $requestData['construccion'], 'trn' => $requestData['trn'], 'trb' => $requestData['trb'],
            'idServicio' => $requestData['idServicio'], 'asociacion' => $requestData['asociacion'], 'observaciones' => $requestData['observaciones']
        ];
        $idArtefacto = Artefacto::create($requestArtefacto);
        $requestListaPropietarios = ['idPropietario' => $idPropietario->id, 'idArtefacto' => $idArtefacto->id];
        ListaPropietario::create($requestListaPropietarios);
        if ($requestData['choice'] == 'MOTOR') {
            $requestMotor = [
                'idArtefacto' => $idArtefacto->id, 'tipo' => $requestData['tipoM'], 'marca' => $requestData['marca'], 'numero' => $requestData['numero'],
                'potencia' => $requestData['potencia'], 'nominalelectrica' => $requestData['nominalelectrica']
            ];
            Motore::create($requestMotor);
        }

        /*
     *
     * carga comb es un número con valores
     * 11,12,13 para vehículos autopropulsados
     * 21,22,23 para vehículos sin propulsión
     *
     */
        $requestDatoAdicional = [
            'idArtefacto' => $idArtefacto->id, 'lugar' => $requestData['lugar'], 'mercPelig' => $requestData['mercPelig'],
            'maxPasajeros' => $requestData['maxPasajeros']
        ];
        datosAdicionale::create($requestDatoAdicional);
        $requestInspeccion = ['idArtefacto' => $idArtefacto->id, 'gestion' => $requestData['gestion'], 'jefeinspector' => $requestData['jefeinspector'], 'motivo' => $requestData['motivo']];
        Inspeccione::create($requestInspeccion);
        if ($request->has('directorio')) {
            if ($request->hasFile('directorio')) {
                $requestData['directorio'] = $request->file('foto')->store('uploads', 'public');
            }
            $requestDocumentacion = ['idArtefacto' => $idArtefacto->id, 'directorio' => $requestData['directorio']];
            Documentacione::create($requestDocumentacion);
        }
        switch ($Usuario->nivel) {
            case 2:
                $direccion = "admin/perf45j";
                break;
            case 3:
                $direccion = "admin/perf45i";
                break;
            case 4:
                $direccion = "admin/perf45r";
                break;
        }

        return redirect($direccion)->with('flash_message', 'Nuevo registro exitoso!!!');
    }
    // Definir función para agregar tiempo a una fecha y devolverla en formato dd/mm/aaaa
    //imprimir_certificado_registro
    public function imprimir_certificado_registro(Request $request)
    { //muestro un pdf
        //dd('Probando imprimir certificados');
        $requestData = $request->all();
        //$cuenca=$request->idCuenca;
        //protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial',
        //'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'servicio', 'asociacion', 'observaciones'];
        $baseoperativa = $request->idBaseOperativa;
        $propietario = Propietario::findOrFail($requestData['idPropietario']);
        //dd($propietario);
        $artefacto = Artefacto::findOrFail($requestData['idArtefacto']);
        $inspeccion = Inspeccione::where('idArtefacto', $requestData['idArtefacto'])->first();
        $tipo = Tipo::findOrFail($artefacto['idTipo']);
        $servicio = servicio::findOrFail($artefacto['idServicio']);
        $material = Material::findOrFail($artefacto['idMaterial']);
        //$usuario = Usuario::where('id',Auth::user()->id);
        //$id=$artefacto['idBaseOperativa'];
        $basesoperativa = BasesOperativa::findOrFail($artefacto['idBaseOperativa']);

        $motor = Motore::where('idArtefacto', $artefacto['idBaseOperativa'])->first();
        $datoAdicional = datosAdicionale::where('idArtefacto', $artefacto['id'])->first();
        //dd($basesoperativa);
        $cuenca = Cuenca::where('id', $basesoperativa['idCuenca'])->first();
        //sdd($cuenca);
        //Proceso para añadir 1 al control de numeros de registro por cuenca
        $numeroc = Certificacione::where('id', $cuenca['id'])->first();
        $aux = $numeroc;
        $numero = $numeroc['numero'];
        $numero = $numero + 1;
        $aux['numero'] = $numero;
        //Configuración de tiempos de vencimiento
        $fechaActual = date('Y-m-d');
        $fechaActualTimestamp = strtotime($fechaActual);
        $nuevaFechaTimestamp = strtotime('+5 years', $fechaActualTimestamp);
        $fechaVencimiento = date('Y-m-d', $nuevaFechaTimestamp);
        $fechaVencimientoTimestamp = strtotime($fechaVencimiento);
        $fechaAlertaTimestamp = strtotime('-6 months', $fechaVencimientoTimestamp);
        $fechaAlerta = date('Y-m-d', $fechaAlertaTimestamp);
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
        $certificacion = certificado::create($requestCertificado);
        /*
        array:5 [▼ // app\Http\Controllers\admin\ubicacionController.php:114
  "_method" => "PATCH"
  "_token" => "8Y9tRL35bV6eLwWP8o0SK9vYB87hqy9GuHxWeyHT"
  "idUsuario" => "1"
  "idCuenca" => "1"
  "idBaseOperativa" => "2"
]
        */
        //dd('num:'.$numeroc);
        //"num:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}" 
        //dd('aux:'.$aux);
        //"aux:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}"
        $aux = ["numero" => $numero];
        $numeroc->update($aux);
        $certificacion['fechaEmision'] = $this->mostrarFechaFormateada($certificacion['fechaEmision']);
        $certificacion['fechaVencimiento'] = $this->mostrarFechaFormateada($fechaVencimiento);
        //dd('fechaEmision'.$certificacion['fechaEmision'].'fechaVencimiento'.$certificacion['fechaVencimiento']);
        $vista = \View::make('admin.certificadospdf.certificarregistro', compact(
            'propietario',
            'tipo',
            'material',
            'artefacto',
            'basesoperativa',
            'cuenca',
            'certificacion',
            'inspeccion',
            'motor',
            'datoAdicional'
        ))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('registro' . $requestCertificado['nreg'] . '.pdf');
    }

    public function mostrarFechaFormateada($fecha)
    {
        $dia = Carbon::parse($fecha)->format('d');
        $mes = Carbon::parse($fecha)->format('m');
        $año = Carbon::parse($fecha)->format('Y');

        switch ($mes) {
            case '01':
                # code...
                $mes = 'ENERO';
                break;
            case '02':
                # code...
                $mes = 'FEBRERO';
                break;
            case '03':
                # code...
                $mes = 'MARZO';
                break;
            case '04':
                # code...
                $mes = 'ABRIL';
                break;
            case '05':
                # code...
                $mes = 'MAYO';
                break;
            case '06':
                # code...
                $mes = 'JUNIO';
                break;
            case '07':
                # code...
                $mes = 'JULIO';
                break;
            case '08':
                # code...
                $mes = 'AGOSTO';
                break;
            case '09':
                # code...
                $mes = 'SEPTIEMBRE';
                break;
            case '10':
                # code...
                $mes = 'OCTUBRE';
                break;
            case '11':
                # code...
                $mes = 'NOVIEMBRE';
                break;
            case '12':
                # code...
                $mes = 'DICIEMBRE';
                break;
            default:
                # code...
                break;
        }

        $fechaFormateada = $dia . ' DE ' . $mes . ' DE ' . $año;
        return $fechaFormateada;
    }
    public function imprimir_certificado_seguridad(Request $request)
    { //muestro un pdf

        $requestData = $request->all();
        //$cuenca=$request->idCuenca;
        //protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial',
        //'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'servicio', 'asociacion', 'observaciones'];
        $baseoperativa = $request->idBaseOperativa;
        $propietario = Propietario::findOrFail($requestData['idPropietario']);
        //dd($propietario);
        $artefacto = Artefacto::findOrFail($requestData['idArtefacto']);
        $inspeccion = Inspeccione::where('idArtefacto', $requestData['idArtefacto'])->first();
        $tipo = Tipo::findOrFail($artefacto['idTipo']);
        $servicio = servicio::findOrFail($artefacto['idServicio']);
        $material = Material::findOrFail($artefacto['idMaterial']);
        //$usuario = Usuario::where('id',Auth::user()->id);
        //$id=$artefacto['idBaseOperativa'];
        $basesoperativa = BasesOperativa::findOrFail($artefacto['idBaseOperativa']);

        $motor = Motore::where('idArtefacto', $artefacto['idBaseOperativa'])->first();
        $datoAdicional = datosAdicionale::where('idArtefacto', $artefacto['id'])->first();
        //dd($basesoperativa);
        $cuenca = Cuenca::where('id', $basesoperativa['idCuenca'])->first();
        //sdd($cuenca);
        //Proceso para añadir 1 al control de numeros de registro por cuenca
        $numeroc = Certificacione::where('id', $cuenca['id'])->first();
        //Configuración de tiempos de vencimiento
        $fechaActual = date('Y-m-d');
        $fechaActualTimestamp = strtotime($fechaActual);
        $nuevaFechaTimestamp = strtotime('+5 years', $fechaActualTimestamp);
        $fechaVencimiento = date('Y-m-d', $nuevaFechaTimestamp);
        $fechaVencimientoTimestamp = strtotime($fechaVencimiento);
        $fechaAlertaTimestamp = strtotime('-6 months', $fechaVencimientoTimestamp);
        $fechaAlerta = date('Y-m-d', $fechaAlertaTimestamp);
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
            'idArtefacto' => $requestData['idArtefacto'], 'tipoC' => '2',
            'nreg' => $numeroc->numero, 'correlativo' => $requestData['correlativo'], 'fechaEmision' => $fechaActual, 'fechaAlerta' => $fechaAlerta, 'fechaVencimiento' => $fechaVencimiento
        ];
        $certificacion = certificado::create($requestCertificado);
        /*
        array:5 [▼ // app\Http\Controllers\admin\ubicacionController.php:114
  "_method" => "PATCH"
  "_token" => "8Y9tRL35bV6eLwWP8o0SK9vYB87hqy9GuHxWeyHT"
  "idUsuario" => "1"
  "idCuenca" => "1"
  "idBaseOperativa" => "2"
]
        */
        //dd('num:'.$numeroc);
        //"num:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}" 
        //dd('aux:'.$aux);
        //"aux:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}"

        $certificacion['fechaEmision'] = $this->mostrarFechaFormateada($certificacion['fechaEmision']);
        $certificacion['fechaVencimiento'] = $this->mostrarFechaFormateada($fechaVencimiento);
        $vista = \View::make('admin.certificadospdf.certificarseguridad', compact(
            'propietario',
            'tipo',
            'material',
            'artefacto',
            'basesoperativa',
            'cuenca',
            'certificacion',
            'inspeccion',
            'motor',
            'datoAdicional'
        ))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('seguridad' . $requestCertificado['nreg'] . '.pdf');
    }
    public function imprimir_certificado_francobordo(Request $request)
    { //muestro un pdf
        $requestData = $request->all();
        //$cuenca=$request->idCuenca;
        //protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial',
        //'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'servicio', 'asociacion', 'observaciones'];
        $baseoperativa = $request->idBaseOperativa;
        $propietario = Propietario::findOrFail($requestData['idPropietario']);
        //dd($propietario);
        $artefacto = Artefacto::findOrFail($requestData['idArtefacto']);
        $inspeccion = Inspeccione::where('idArtefacto', $requestData['idArtefacto'])->first();
        $tipo = Tipo::findOrFail($artefacto['idTipo']);
        $servicio = servicio::findOrFail($artefacto['idServicio']);
        $material = Material::findOrFail($artefacto['idMaterial']);
        //$usuario = Usuario::where('id',Auth::user()->id);
        //$id=$artefacto['idBaseOperativa'];
        $basesoperativa = BasesOperativa::findOrFail($artefacto['idBaseOperativa']);

        $motor = Motore::where('idArtefacto', $artefacto['idBaseOperativa'])->first();
        $datoAdicional = datosAdicionale::where('idArtefacto', $artefacto['id'])->first();
        //dd($basesoperativa);
        $cuenca = Cuenca::where('id', $basesoperativa['idCuenca'])->first();
        //sdd($cuenca);
        //Proceso para añadir 1 al control de numeros de registro por cuenca
        $numeroc = Certificacione::where('id', $cuenca['id'])->first();
        //Configuración de tiempos de vencimiento
        $fechaActual = date('Y-m-d');
        $fechaActualTimestamp = strtotime($fechaActual);
        $nuevaFechaTimestamp = strtotime('+5 years', $fechaActualTimestamp);
        $fechaVencimiento = date('Y-m-d', $nuevaFechaTimestamp);
        $fechaVencimientoTimestamp = strtotime($fechaVencimiento);
        $fechaAlertaTimestamp = strtotime('-6 months', $fechaVencimientoTimestamp);
        $fechaAlerta = date('Y-m-d', $fechaAlertaTimestamp);
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
            'idArtefacto' => $requestData['idArtefacto'], 'tipoC' => '3',
            'nreg' => $numeroc->numero, 'correlativo' => $requestData['correlativo'], 'fechaEmision' => $fechaActual, 'fechaAlerta' => $fechaAlerta, 'fechaVencimiento' => $fechaVencimiento
        ];
        $certificacion = certificado::create($requestCertificado);
        /*
        array:5 [▼ // app\Http\Controllers\admin\ubicacionController.php:114
  "_method" => "PATCH"
  "_token" => "8Y9tRL35bV6eLwWP8o0SK9vYB87hqy9GuHxWeyHT"
  "idUsuario" => "1"
  "idCuenca" => "1"
  "idBaseOperativa" => "2"
]
        */
        //dd('num:'.$numeroc);
        //"num:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}" 
        //dd('aux:'.$aux);
        //"aux:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}"

        $certificacion['fechaEmision'] = $this->mostrarFechaFormateada($certificacion['fechaEmision']);
        $certificacion['fechaVencimiento'] = $this->mostrarFechaFormateada($fechaVencimiento);
        $vista = \View::make('admin.certificadospdf.certificarfrancobordo', compact(
            'propietario',
            'tipo',
            'material',
            'artefacto',
            'basesoperativa',
            'cuenca',
            'certificacion',
            'inspeccion',
            'motor',
            'datoAdicional'
        ))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('francobordo' . $requestCertificado['nreg'] . '.pdf');
    }
    public function imprimir_certificado_arqueo(Request $request)
    { //muestro un pdf
        $requestData = $request->all();
        //$cuenca=$request->idCuenca;
        //protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial',
        //'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'servicio', 'asociacion', 'observaciones'];
        $baseoperativa = $request->idBaseOperativa;
        $propietario = Propietario::findOrFail($requestData['idPropietario']);
        //dd($propietario);
        $artefacto = Artefacto::findOrFail($requestData['idArtefacto']);
        $inspeccion = Inspeccione::where('idArtefacto', $requestData['idArtefacto'])->first();
        $tipo = Tipo::findOrFail($artefacto['idTipo']);
        $servicio = servicio::findOrFail($artefacto['idServicio']);
        $material = Material::findOrFail($artefacto['idMaterial']);
        //$usuario = Usuario::where('id',Auth::user()->id);
        //$id=$artefacto['idBaseOperativa'];
        $basesoperativa = BasesOperativa::findOrFail($artefacto['idBaseOperativa']);

        $motor = Motore::where('idArtefacto', $artefacto['idBaseOperativa'])->first();
        $datoAdicional = datosAdicionale::where('idArtefacto', $artefacto['id'])->first();
        //dd($basesoperativa);
        $cuenca = Cuenca::where('id', $basesoperativa['idCuenca'])->first();
        //sdd($cuenca);
        //Proceso para añadir 1 al control de numeros de registro por cuenca
        $numeroc = Certificacione::where('id', $cuenca['id'])->first();
        //Configuración de tiempos de vencimiento
        $fechaActual = date('Y-m-d');
        $fechaActualTimestamp = strtotime($fechaActual);
        $nuevaFechaTimestamp = strtotime('+5 years', $fechaActualTimestamp);
        $fechaVencimiento = date('Y-m-d', $nuevaFechaTimestamp);
        $fechaVencimientoTimestamp = strtotime($fechaVencimiento);
        $fechaAlertaTimestamp = strtotime('-6 months', $fechaVencimientoTimestamp);
        $fechaAlerta = date('Y-m-d', $fechaAlertaTimestamp);
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
            'idArtefacto' => $requestData['idArtefacto'], 'tipoC' => '4',
            'nreg' => $numeroc->numero, 'correlativo' => $requestData['correlativo'], 'fechaEmision' => $fechaActual, 'fechaAlerta' => $fechaAlerta, 'fechaVencimiento' => $fechaVencimiento
        ];
        $certificacion = certificado::create($requestCertificado);
        /*
        array:5 [▼ // app\Http\Controllers\admin\ubicacionController.php:114
  "_method" => "PATCH"
  "_token" => "8Y9tRL35bV6eLwWP8o0SK9vYB87hqy9GuHxWeyHT"
  "idUsuario" => "1"
  "idCuenca" => "1"
  "idBaseOperativa" => "2"
]
        */
        //dd('num:'.$numeroc);
        //"num:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}" 
        //dd('aux:'.$aux);
        //"aux:{"id":2,"created_at":"2024-05-16T16:27:39.000000Z","updated_at":"2024-05-16T16:27:39.000000Z","idCuenca":2,"numero":1}"

        $certificacion['fechaEmision'] = $this->mostrarFechaFormateada($certificacion['fechaEmision']);
        $certificacion['fechaVencimiento'] = $this->mostrarFechaFormateada($fechaVencimiento);
        $vista = \View::make('admin.certificadospdf.certificararqueo', compact(
            'propietario',
            'tipo',
            'material',
            'artefacto',
            'basesoperativa',
            'cuenca',
            'certificacion',
            'inspeccion',
            'motor',
            'datoAdicional'
        ))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($vista);
        return $pdf->stream('arqueo' . $requestCertificado['nreg'] . '.pdf');
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
