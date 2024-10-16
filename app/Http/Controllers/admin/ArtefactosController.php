<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use PDF;

use App\Models\Artefacto;
use App\Models\BasesOperativa;
use App\Models\Material;
use App\Models\servicio;
use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use App\Models\certificado;


class ArtefactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        if (!empty($keyword)) {
            $artefactos = Artefacto::where('matricula', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('eslora', 'LIKE', "%$keyword%")
                ->orWhere('manga', 'LIKE', "%$keyword%")
                ->orWhere('puntal', 'LIKE', "%$keyword%")
                ->orWhere('francobordo', 'LIKE', "%$keyword%")
                ->orWhere('propulsion', 'LIKE', "%$keyword%")
                ->orWhere('construccion', 'LIKE', "%$keyword%")
                ->orWhere('trn', 'LIKE', "%$keyword%")
                ->orWhere('trb', 'LIKE', "%$keyword%")
                ->orWhere('asociacion', 'LIKE', "%$keyword%")
                ->orWhere('observaciones', 'LIKE', "%$keyword%")
                ->orWhere('idBaseOperativa', 'LIKE', "%$keyword%")
                ->orWhere('idUsuarios', 'LIKE', "%$keyword%")
                ->orWhere('idTipo', 'LIKE', "%$keyword%")
                ->orWhere('idMaterial', 'LIKE', "%$keyword%")
                ->with('certificado', 'baseoperativa.cuenca')
                ->latest()->paginate($perPage);
        } else {
            $artefactos = Artefacto::with(['certificado', 'usuarios', 'baseoperativa.cuenca'])->latest()->paginate($perPage);
        }

        return view('admin.artefactos.index', compact('artefactos', 'nivel', 'servicio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $basesoperativas = BasesOperativa::All();
        $usuarios = Usuario::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        return view('admin.artefactos.create', compact('basesoperativas', 'tipos', 'usuarios', 'materiales', 'nivel', 'servicio'));
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

        Artefacto::create($requestData);

        return redirect('admin/artefactos')->with('flash_message', 'Artefacto agregado!!!');
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
        $artefacto = Artefacto::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        return view('admin.artefactos.show', compact('artefacto', 'nivel', 'servicio'));
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
        $artefacto = Artefacto::findOrFail($id);
        $basesoperativas = BasesOperativa::All();
        $usuarios = Usuario::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        return view('admin.artefactos.edit', compact('artefacto', 'basesoperativas', 'tipos', 'usuarios', 'materiales', 'nivel', 'servicio'));
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

        $artefacto = Artefacto::findOrFail($id);
        $artefacto->update($requestData);

        return redirect('admin/artefactos')->with('flash_message', 'Artefacto actualizado!');
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
        Artefacto::destroy($id);

        return redirect('admin/artefactos')->with('flash_message', 'Artefacto borrado!');
    }
    public function imprimir()
    { //con esto muestro una página
        /*dd('Probando imprimir certificados');*/
        $artefactos = Artefacto::all();
        $vista = \View::make('admin.perfiles.Jefe', compact('artefactos'))->render();
        return view('admin.perfiles.Jefe', compact('vista', 'artefactos'));
    }
}
