<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class ubicacionController extends Controller
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
            $ubicacion = ubicacion::where('idUsuario', 'LIKE', "%$keyword%")
                ->orWhere('idCuenca', 'LIKE', "%$keyword%")
                ->orWhere('idBaseOperativa', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ubicacion = ubicacion::latest()->paginate($perPage);
        }

        return view('admin.ubicacion.index', compact('ubicacion', 'nivel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.ubicacion.create', compact('nivel'));
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

        ubicacion::create($requestData);

        return redirect('admin/ubicacion')->with('flash_message', 'ubicacion added!');
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
        $ubicacion = ubicacion::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.ubicacion.show', compact('ubicacion', 'nivel'));
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
        $ubicacion = ubicacion::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.ubicacion.edit', compact('ubicacion', 'nivel'));
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

        $ubicacion = ubicacion::findOrFail($id);
        $ubicacion->update($requestData);

        return redirect('admin/ubicacion')->with('flash_message', 'ubicacion updated!');
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
        ubicacion::destroy($id);

        return redirect('admin/ubicacion')->with('flash_message', 'ubicacion deleted!');
    }
}
