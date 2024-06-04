<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Artefacto;
use App\Models\Inspeccione;
use Illuminate\Http\Request;

class InspeccionesController extends Controller
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
        $artefactos = Artefacto::All();
        if (!empty($keyword)) {
            $inspecciones = Inspeccione::where('gestion', 'LIKE', "%$keyword%")
                ->orWhere('jefeinspector', 'LIKE', "%$keyword%")
                ->orWhere('motivo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $inspecciones = Inspeccione::latest()->paginate($perPage);
        }

        return view('admin.inspecciones.index', compact('inspecciones','artefactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $artefactos = Artefacto::All();
        return view('admin.inspecciones.create', compact('artefactos'));
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

        Inspeccione::create($requestData);

        return redirect('admin/inspecciones')->with('flash_message', 'Inspeccione agregado!!!');
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
        $inspeccione = Inspeccione::findOrFail($id);
        $artefactos = Artefacto::All();

        return view('admin.inspecciones.show', compact('inspeccione','artefactos'));
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
        $inspeccione = Inspeccione::findOrFail($id);
        $artefactos = Artefacto::All();

        return view('admin.inspecciones.edit', compact('inspeccione','artefactos'));
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

        $inspeccione = Inspeccione::findOrFail($id);
        $inspeccione->update($requestData);

        return redirect('admin/inspecciones')->with('flash_message', 'Inspeccione actualizado!');
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
        Inspeccione::destroy($id);

        return redirect('admin/inspecciones')->with('flash_message', 'Inspeccione borrado!');
    }
}
