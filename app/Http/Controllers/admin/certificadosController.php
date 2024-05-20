<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\certificado;
use Illuminate\Http\Request;

class certificadosController extends Controller
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
            $certificados = certificado::where('tipo', 'LIKE', "%$keyword%")
                ->orWhere('nreg', 'LIKE', "%$keyword%")
                ->orWhere('fechaEmision', 'LIKE', "%$keyword%")
                ->orWhere('fechaVecimiento', 'LIKE', "%$keyword%")
                ->orWhere('idArtefactos', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $certificados = certificado::latest()->paginate($perPage);
        }

        return view('admin.certificados.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.certificados.create');
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
        
        certificado::create($requestData);

        return redirect('admin/certificados')->with('flash_message', 'certificado added!');
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
        $certificado = certificado::findOrFail($id);

        return view('admin.certificados.show', compact('certificado'));
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
        $certificado = certificado::findOrFail($id);

        return view('admin.certificados.edit', compact('certificado'));
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
        
        $certificado = certificado::findOrFail($id);
        $certificado->update($requestData);

        return redirect('admin/certificados')->with('flash_message', 'certificado updated!');
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
        certificado::destroy($id);

        return redirect('admin/certificados')->with('flash_message', 'certificado deleted!');
    }
}
