<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
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
            $propietario = Propietario::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('tipo', 'LIKE', "%$keyword%")
                ->orWhere('identificador', 'LIKE', "%$keyword%")
                ->orWhere('FechaIni', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $propietario = Propietario::latest()->paginate($perPage);
        }

        return view('admin.propietario.index', compact('propietario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.propietario.create');
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
        
        Propietario::create($requestData);

        return redirect('admin/propietario')->with('flash_message', 'Propietario agregado!!!');
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
        $propietario = Propietario::findOrFail($id);

        return view('admin.propietario.show', compact('propietario'));
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
        $propietario = Propietario::findOrFail($id);

        return view('admin.propietario.edit', compact('propietario'));
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
        
        $propietario = Propietario::findOrFail($id);
        $propietario->update($requestData);

        return redirect('admin/propietario')->with('flash_message', 'Propietario actualizado!');
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
        Propietario::destroy($id);

        return redirect('admin/propietario')->with('flash_message', 'Propietario borrado!');
    }
}
