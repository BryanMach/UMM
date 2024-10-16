<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Artefacto;
use app\Models\Persona;

class Usuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idPersonal', 'usuario', 'contrasena', 'nivel'];

    public function artefactos()
    {
        return $this->hasMany(Artefacto::class);
    }
    public function personals()
    {
        return $this->belongsTo(Personal::class, 'idPersonal', 'id');
    }
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
