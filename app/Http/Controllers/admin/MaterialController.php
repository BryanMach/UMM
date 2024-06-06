<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class MaterialController extends Controller
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
            $material = Material::where('material', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $material = Material::latest()->paginate($perPage);
        }

        return view('admin.material.index', compact('material', 'nivel'));
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
        return view('admin.material.create', compact('nivel'));
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

        Material::create($requestData);

        return redirect('admin/material')->with('flash_message', 'Material agregado!!!');
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
        $material = Material::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.material.show', compact('material', 'nivel'));
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
        $material = Material::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];

        return view('admin.material.edit', compact('material', 'nivel'));
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

        $material = Material::findOrFail($id);
        $material->update($requestData);

        return redirect('admin/material')->with('flash_message', 'Material actualizado!');
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
        Material::destroy($id);

        return redirect('admin/material')->with('flash_message', 'Material borrado!');
    }
}
