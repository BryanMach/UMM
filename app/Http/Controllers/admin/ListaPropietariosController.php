<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Artefacto;
use App\Models\ListaPropietario;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class ListaPropietariosController extends Controller
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

        if (!empty($keyword)) {
            $listapropietarios = ListaPropietario::where('idPropietario', 'LIKE', "%$keyword%")
                ->orWhere('idArtefacto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $listapropietarios = ListaPropietario::latest('idPropietario')->paginate($perPage);
        }

        return view('admin.lista-propietarios.index', compact('listapropietarios', 'nivel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $propietarios = Propietario::All();
        $artefactos = Artefacto::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.lista-propietarios.create', compact('propietarios', 'artefactos', 'nivel'));
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

        ListaPropietario::create($requestData);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario agregado!!!');
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
        $listapropietario = ListaPropietario::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.lista-propietarios.show', compact('listapropietario', 'nivel'));
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
        $listapropietario = ListaPropietario::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.lista-propietarios.edit', compact('listapropietario', 'nivel'));
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

        $listapropietario = ListaPropietario::findOrFail($id);
        $listapropietario->update($requestData);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario actualizado!');
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
        ListaPropietario::destroy($id);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario borrado!');
    }
}
