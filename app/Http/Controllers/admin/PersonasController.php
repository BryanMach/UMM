<?php

namespace App\Http\Controllers\admin;

use app\Models\personas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use App\Models\Artefacto;
use App\Models\BasesOperativa;
use App\Models\Material;
use App\Models\servicio;
use App\Models\Tipo;


use App\Models\certificado;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        $personas = Persona::with('usuarios')->paginate(10);
        if (!empty($keyword)) {
            $artefactos = Artefacto::where('matricula', 'LIKE', "%$keyword%")
                ->orWhere('nombre', 'LIKE', "%$keyword%")
                ->orWhere('asociacion', 'LIKE', "%$keyword%")
                ->orWhere('idBaseOperativa', 'LIKE', "%$keyword%")
                ->orWhere('idUsuarios', 'LIKE', "%$keyword%")
                ->orWhere('idTipo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $artefactos = Artefacto::with(['certificado', 'usuarios', 'baseoperativa.cuenca'])->latest()->paginate($perPage);
        }

        return view('admin.personas.index', compact('artefactos', 'nivel', 'personas'));
    }
    public function index2()
    {
        $persona = Persona::all();
        return $persona;
    }
    public function create()
    {
        $basesoperativas = BasesOperativa::All();
        $usuarios = Usuario::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        return view('admin.personas.create', compact('basesoperativas', 'tipos', 'usuarios', 'materiales', 'nivel', 'servicio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'CI' => 'required|CI|unique:personas,CI',
            'ambito' => 'nullable|string|max:255',
            'idArtefacto' => 'required|exists:artefactos,id',
            'ambito' => 'nullable|string|max:255',
            'matricula' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'venCarnet' => 'nullable|string|max:255',
            'lugarNac' => 'nullable|string|max:255',
            'lugarReg' => 'nullable|string|max:255',
            'fechaNac' => 'nullable|date',
            'estadoCiv' => 'nullable|string|max:255',

        ]);

        Persona::create($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }

    public function show($id)
    {
        $listapropietario = Persona::findOrFail($id);
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $personas = Persona::findOrFail($id);

        return view('admin.personas.show', compact('listapropietario', 'nivel', 'personas'));
    }

    public function edit($id)
    {
        $artefacto = Artefacto::findOrFail($id);
        $basesoperativas = BasesOperativa::All();
        $usuarios = Usuario::All();
        $tipos = Tipo::All();
        $materiales = Material::All();
        $usuario = Usuario::findOrFail(Auth::user()->id);
        $nivel = $usuario['nivel'];
        $servicio = servicio::all();
        $personas = Persona::findOrFail($id);
        return view('admin.personas.edit', compact('artefacto', 'basesoperativas', 'tipos', 'usuarios', 'materiales', 'nivel', 'servicio', 'personas'));
    }

    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:personas,email,' . $persona->id,
            'telefono' => 'nullable|string|max:15',
            'artefacto_id' => 'required|exists:artefactos,id',
        ]);

        $persona->update($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    public function destroy($id)
    {
        Persona::destroy($id);

        return redirect('admin/personas')->with('flash_message', 'Persona eliminada!');
    }
}
