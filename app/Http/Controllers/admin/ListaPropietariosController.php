<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ListaPropietario;
use Illuminate\Http\Request;

class ListaPropietariosController extends Controller
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
            $listapropietarios = ListaPropietario::where('idPropietario', 'LIKE', "%$keyword%")
                ->orWhere('idArtefacto', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $listapropietarios = ListaPropietario::latest()->paginate($perPage);
        }

        return view('admin.lista-propietarios.index', compact('listapropietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.lista-propietarios.create');
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
        
        ListaPropietario::create($requestData);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario added!');
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
        $listapropietario = ListaPropietario::findOrFail($id);

        return view('admin.lista-propietarios.show', compact('listapropietario'));
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
        $listapropietario = ListaPropietario::findOrFail($id);

        return view('admin.lista-propietarios.edit', compact('listapropietario'));
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
        
        $listapropietario = ListaPropietario::findOrFail($id);
        $listapropietario->update($requestData);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario updated!');
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
        ListaPropietario::destroy($id);

        return redirect('admin/lista-propietarios')->with('flash_message', 'ListaPropietario deleted!');
    }
}
