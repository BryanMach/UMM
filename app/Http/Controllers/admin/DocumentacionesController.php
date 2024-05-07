<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Artefacto;
use App\Models\Documentacione;
use Illuminate\Http\Request;

class DocumentacionesController extends Controller
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
            $documentaciones = Documentacione::where('idArtefacto', 'LIKE', "%$keyword%")
                ->orWhere('directorio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $documentaciones = Documentacione::latest()->paginate($perPage);
        }

        return view('admin.documentaciones.index', compact('documentaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $artefactos = Artefacto::All();
        return view('admin.documentaciones.create', compact('artefactos'));
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

        Documentacione::create($requestData);

        return redirect('admin/documentaciones')->with('flash_message', 'Documentacione agregado!!!');
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
        $documentacione = Documentacione::findOrFail($id);

        return view('admin.documentaciones.show', compact('documentacione'));
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
        $documentacione = Documentacione::findOrFail($id);

        return view('admin.documentaciones.edit', compact('documentacione'));
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

        $documentacione = Documentacione::findOrFail($id);
        $documentacione->update($requestData);

        return redirect('admin/documentaciones')->with('flash_message', 'Documentacione actualizado!');
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
        Documentacione::destroy($id);

        return redirect('admin/documentaciones')->with('flash_message', 'Documentacione borrado!');
    }
}
