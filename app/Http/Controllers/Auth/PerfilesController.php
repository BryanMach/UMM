<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Personal;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilesController extends Controller
{
    /**AQUIIII: adapta esta cosa para controlar perfiles como el jefe, interno y externo
     * luego recomiendo que el if se cambie por un switch
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function perfil(request $request){
        @dd('id:', Auth::user()->id);
        $usuario = Auth::user()->id;
        $nivel= Usuario::findOrFail($usuario);
        if($nivel->nivel == 1){
            return view("id",[""=> $usuario]);
        }elseif($nivel->nivel == 2){
            return view("",[""=> $usuario]);
        }else{
            return view("",[""=> $usuario]);
        }
    }
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $usuarios = Usuario::where('idPersonal', 'LIKE', "%$keyword%")
                ->orWhere('usuario', 'LIKE', "%$keyword%")
                ->orWhere('contrasena', 'LIKE', "%$keyword%")
                ->orWhere('nivel', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $usuarios = Usuario::latest()->paginate($perPage);
        }

        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $personas = Personal::All();
        return view('admin.usuarios.create', compact('personas'));
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

        Usuario::create($requestData);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario agregado!!!');
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
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
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
        $usuario = Usuario::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
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

        $usuario = Usuario::findOrFail($id);
        $usuario->update($requestData);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario actualizado!');
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
        Usuario::destroy($id);

        return redirect('admin/usuarios')->with('flash_message', 'Usuario borrado!');
    }
}
