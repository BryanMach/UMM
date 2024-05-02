<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Artefacto;
use Illuminate\Http\Request;

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

        if (!empty($keyword)) {
            $artefactos = Artefacto::where('idUsuarios', 'LIKE', "%$keyword%")
                ->orWhere('idBaseOperativa', 'LIKE', "%$keyword%")
                ->orWhere('matricula', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('idTipo', 'LIKE', "%$keyword%")
                ->orWhere('idMaterial', 'LIKE', "%$keyword%")
                ->orWhere('eslora', 'LIKE', "%$keyword%")
                ->orWhere('manga', 'LIKE', "%$keyword%")
                ->orWhere('puntal', 'LIKE', "%$keyword%")
                ->orWhere('francobordo', 'LIKE', "%$keyword%")
                ->orWhere('propulsion', 'LIKE', "%$keyword%")
                ->orWhere('construccion', 'LIKE', "%$keyword%")
                ->orWhere('trn', 'LIKE', "%$keyword%")
                ->orWhere('trb', 'LIKE', "%$keyword%")
                ->orWhere('servicio', 'LIKE', "%$keyword%")
                ->orWhere('asociacion', 'LIKE', "%$keyword%")
                ->orWhere('observaciones', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $artefactos = Artefacto::latest()->paginate($perPage);
        }

        return view('admin.artefactos.index', compact('artefactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.artefactos.create');
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

        return view('admin.artefactos.show', compact('artefacto'));
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

        return view('admin.artefactos.edit', compact('artefacto'));
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
}
