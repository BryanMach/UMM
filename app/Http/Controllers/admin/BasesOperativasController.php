<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\BasesOperativa;
use Illuminate\Http\Request;

class BasesOperativasController extends Controller
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
            $basesoperativas = BasesOperativa::where('idCuenca', 'LIKE', "%$keyword%")
                ->orWhere('baseOperativa', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $basesoperativas = BasesOperativa::latest()->paginate($perPage);
        }

        return view('admin.bases-operativas.index', compact('basesoperativas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.bases-operativas.create');
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
        
        BasesOperativa::create($requestData);

        return redirect('admin/bases-operativas')->with('flash_message', 'BasesOperativa added!');
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
        $basesoperativa = BasesOperativa::findOrFail($id);

        return view('admin.bases-operativas.show', compact('basesoperativa'));
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
        $basesoperativa = BasesOperativa::findOrFail($id);

        return view('admin.bases-operativas.edit', compact('basesoperativa'));
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
        
        $basesoperativa = BasesOperativa::findOrFail($id);
        $basesoperativa->update($requestData);

        return redirect('admin/bases-operativas')->with('flash_message', 'BasesOperativa updated!');
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
        BasesOperativa::destroy($id);

        return redirect('admin/bases-operativas')->with('flash_message', 'BasesOperativa deleted!');
    }
}
