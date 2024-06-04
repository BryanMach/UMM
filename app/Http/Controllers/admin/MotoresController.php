<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Artefacto;
use App\Models\Motore;
use Illuminate\Http\Request;

class MotoresController extends Controller
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
            $motores = Motore::where('idArtefacto', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('marca', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->orWhere('potencia', 'LIKE', "%$keyword%")
                ->orWhere('nominalelectrica', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $motores = Motore::latest()->paginate($perPage);
        }

        return view('admin.motores.index', compact('motores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $artefactos = Artefacto::All();
        return view('admin.motores.create', compact('artefactos'));
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

        Motore::create($requestData);

        return redirect('admin/motores')->with('flash_message', 'Motore agregado!!!');
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
        $motore = Motore::findOrFail($id);

        return view('admin.motores.show', compact('motore'));
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
        $motore = Motore::findOrFail($id);
        $artefactos = Artefacto::All();

        return view('admin.motores.edit', compact('motore', 'artefactos'));
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

        $motore = Motore::findOrFail($id);
        $motore->update($requestData);

        return redirect('admin/motores')->with('flash_message', 'Motore actualizado!');
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
        Motore::destroy($id);

        return redirect('admin/motores')->with('flash_message', 'Motore borrado!');
    }
}
