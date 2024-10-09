<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['nombre', 'apellido', 'CI', 'ambito', 'idArtefacto', 'matricula', 'cargo', 'venCarnet', 'lugarNac', 'lugarReg', 'fechaNac', 'estadoCiv', 'idUsuario'];

    public function artefactos()
    {
        return $this->belongsTo(Artefacto::class, 'idArtefacto');
    }
    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'id');
    }
}
