<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\User;
use App\Models\cargo;
class PersonalController extends Controller
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
        $cargo = cargo::all();
        if (!empty($keyword)) {
            $personal = Personal::where('ci', 'LIKE', "%$keyword%")
                ->orWhere('grado', 'LIKE', "%$keyword%")
                ->orWhere('nombres', 'LIKE', "%$keyword%")
                ->orWhere('apellidos', 'LIKE', "%$keyword%")
                ->orWhere('contacto', 'LIKE', "%$keyword%")
                ->orWhere('foto', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('vigencia', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $personal = Personal::latest()->paginate($perPage);
        }

        return view('admin.personal.index', compact('personal', 'nivel','cargo'));
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
        $cargos = cargo::all();
        return view('admin.personal.create', compact('nivel','cargos'));
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
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        Personal::create($requestData);


        return redirect('admin/personal')->with('flash_message', 'Personal agregado!!!');
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
        $personal = Personal::findOrFail($id);

        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $cargos = cargo::findOrFail($personal['idCargo']);
        $usuarios = $personal->usuarios;
        $acc = User::all();
        return view('admin.personal.show', compact('personal', 'nivel','cargos','usuarios','acc'));
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
        $personal = Personal::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $cargos = cargo::all();
        return view('admin.personal.edit', compact('personal', 'nivel','cargos'));
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
        $personal = Personal::findOrFail($id);
        $requestData = $request->all();
        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('uploads', 'public');
        }
        $personal->update($requestData);
        
        return redirect('admin/personal')->with('flash_message', 'Personal actualizado!');
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
        Personal::destroy($id);

        return redirect('admin/personal')->with('flash_message', 'Personal borrado!');
    }
}
