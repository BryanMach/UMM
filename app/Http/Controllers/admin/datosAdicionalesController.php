<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Artefacto;
use App\Models\datosAdicionale;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class datosAdicionalesController extends Controller
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
            $datosadicionales = datosAdicionale::where('idArtefacto', 'LIKE', "%$keyword%")
                ->orWhere('lugar', 'LIKE', "%$keyword%")
                ->orWhere('mercPelig', 'LIKE', "%$keyword%")
                ->orWhere('maxPasajeros', 'LIKE', "%$keyword%")
                ->orWhere('cargaComb', 'LIKE', "%$keyword%")
                ->orWhere('peso', 'LIKE', "%$keyword%")
                ->orWhere('altura', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $datosadicionales = datosAdicionale::latest()->paginate($perPage);
        }

        return view('admin.datos-adicionales.index', compact('datosadicionales', 'nivel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $artefactos = Artefacto::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.datos-adicionales.create', compact('artefactos', 'nivel'));
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

        datosAdicionale::create($requestData);

        return redirect('admin/datos-adicionales')->with('flash_message', 'datosAdicionale agregado!!!');
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
        $datosadicionale = datosAdicionale::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.datos-adicionales.show', compact('datosadicionale', 'nivel'));
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
        $datosadicionale = datosAdicionale::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.datos-adicionales.edit', compact('datosadicionale', 'nivel'));
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

        $datosadicionale = datosAdicionale::findOrFail($id);
        $datosadicionale->update($requestData);

        return redirect('admin/datos-adicionales')->with('flash_message', 'datosAdicionale actualizado!');
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
        datosAdicionale::destroy($id);

        return redirect('admin/datos-adicionales')->with('flash_message', 'datosAdicionale borrado!');
    }
}
