<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Cuenca;
use Illuminate\Http\Request;

class CuencaController extends Controller
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
            $cuenca = Cuenca::where('cuenca', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cuenca = Cuenca::latest()->paginate($perPage);
        }

        return view('admin.cuenca.index', compact('cuenca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.cuenca.create');
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
        
        Cuenca::create($requestData);

        return redirect('admin/cuenca')->with('flash_message', 'Cuenca added!');
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
        $cuenca = Cuenca::findOrFail($id);

        return view('admin.cuenca.show', compact('cuenca'));
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
        $cuenca = Cuenca::findOrFail($id);

        return view('admin.cuenca.edit', compact('cuenca'));
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
        
        $cuenca = Cuenca::findOrFail($id);
        $cuenca->update($requestData);

        return redirect('admin/cuenca')->with('flash_message', 'Cuenca updated!');
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
        Cuenca::destroy($id);

        return redirect('admin/cuenca')->with('flash_message', 'Cuenca deleted!');
    }
}
