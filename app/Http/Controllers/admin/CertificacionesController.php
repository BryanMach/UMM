<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Certificacione;
use App\Models\Cuenca;
use Illuminate\Http\Request;

class CertificacionesController extends Controller
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
            $certificaciones = Certificacione::where('idCuenca', 'LIKE', "%$keyword%")
                ->orWhere('numero', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $certificaciones = Certificacione::latest()->paginate($perPage);
        }

        return view('admin.certificaciones.index', compact('certificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cuencas = Cuenca::All();
        return view('admin.certificaciones.create', compact('cuencas'));
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

        Certificacione::create($requestData);

        return redirect('admin/certificaciones')->with('flash_message', 'Certificacione agregado!!!');
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
        $certificacione = Certificacione::findOrFail($id);

        return view('admin.certificaciones.show', compact('certificacione'));
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
        $certificacione = Certificacione::findOrFail($id);

        return view('admin.certificaciones.edit', compact('certificacione'));
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

        $certificacione = Certificacione::findOrFail($id);
        $certificacione->update($requestData);

        return redirect('admin/certificaciones')->with('flash_message', 'Certificacione actualizado!');
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
        Certificacione::destroy($id);

        return redirect('admin/certificaciones')->with('flash_message', 'Certificacione borrado!');
    }
}
