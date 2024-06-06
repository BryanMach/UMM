<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\BasesOperativa;
use App\Models\Cuenca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

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
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        if (!empty($keyword)) {
            switch ($keyword):
                case "Lacustre":
                    $keyword = "3";
                    break;
                case "De la Plata":
                    $keyword = "2";
                    break;
                case "Amazónica":
                    $keyword = "1";
                    break;
                case "Amazonica":
                    $keyword = "1";
                    break;
                default:
                    break;
            endswitch;
            /*$basesoperativas = BasesOperativa::where('baseOperativa', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
            if(empty($basesoperativas)){
                $var=Cuenca::where('cuenca','LIKE', "%$keyword%")->latest()->paginate($perPage);
                if(!empty($var)){
                    $keyword=$var->cuenca->id;
                    $basesoperativas = BasesOperativa::where('idCuenca', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                }
            }*/
            $basesoperativas = BasesOperativa::where('idCuenca', 'LIKE', "%$keyword%")
                ->orWhere('baseOperativa', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $basesoperativas = BasesOperativa::with('cuenca')->latest("idCuenca")->latest("baseOperativa")->paginate($perPage);
        }

        return view('admin.bases-operativas.index', compact('basesoperativas', 'nivel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cuencas = Cuenca::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.bases-operativas.create', compact('cuencas', 'nivel'));
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

        return redirect('admin/bases-operativas')->with('flash_message', 'Base operativa agregada!!!');
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
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.bases-operativas.show', compact('basesoperativa', 'nivel'));
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
        $cuencas = Cuenca::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        return view('admin.bases-operativas.edit', compact('basesoperativa', 'cuencas', 'nivel'));
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

        return redirect('admin/bases-operativas')->with('flash_message', 'BasesOperativa actualizado!');
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

        return redirect('admin/bases-operativas')->with('flash_message', 'Base operativa borrada!');
    }
}
