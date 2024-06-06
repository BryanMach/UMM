<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Recuperar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class RecuperarController extends Controller
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
            $recuperar = Recuperar::where('idUsuario', 'LIKE', "%$keyword%")
                ->orWhere('tabla', 'LIKE', "%$keyword%")
                ->orWhere('posicion', 'LIKE', "%$keyword%")
                ->orWhere('operacion', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('campo', 'LIKE', "%$keyword%")
                ->orWhere('dato', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $recuperar = Recuperar::latest()->paginate($perPage);
        }

        return view('admin.recuperar.index', compact('recuperar', 'nivel'));
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
        return view('admin.recuperar.create', compact('nivel'));
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

        Recuperar::create($requestData);

        return redirect('admin/recuperar')->with('flash_message', 'Recuperar agregado!!!');
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
        $recuperar = Recuperar::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.recuperar.show', compact('recuperar', 'nivel'));
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
        $recuperar = Recuperar::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.recuperar.edit', compact('recuperar', 'nivel'));
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

        $recuperar = Recuperar::findOrFail($id);
        $recuperar->update($requestData);

        return redirect('admin/recuperar')->with('flash_message', 'Recuperar actualizado!');
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
        Recuperar::destroy($id);

        return redirect('admin/recuperar')->with('flash_message', 'Recuperar borrado!');
    }
}
