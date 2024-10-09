<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artefacto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artefactos';

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
    protected $fillable = ['idUsuarios', 'idBaseOperativa', 'matricula', 'nombre', 'idTipo', 'idMaterial', 'eslora', 'manga', 'puntal', 'francobordo', 'propulsion', 'construccion', 'trn', 'trb', 'idServicio', 'asociacion', 'fotoA', 'observaciones'];

    public function documentos()
    {
        return $this->hasMany(Documentacione::class);
    }
    public function inspecciones()
    {
        return $this->hasMany(Inspeccione::class, 'idArtefacto');
    }
    public function datosadicionales()
    {
        return $this->hasMany(datosAdicionale::class);
    }
    public function motores()
    {
        return $this->hasMany(Motore::class);
    }
    public function certificado()
    {
        return $this->hasMany(certificado::class, 'idArtefacto', 'id');
    }
    public function lista()
    {
        return $this->hasMany(ListaPropietario::class, 'idArtefacto');
    }
    public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'idUsuarios', 'id');
    }
    public function baseoperativa()
    {
        return $this->belongsTo(BasesOperativa::class, 'idBaseOperativa', 'id');
    }
    public function material()
    {
        return $this->belongsTo(Material::class, 'idMaterial', 'id');
    }
    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'idTipo', 'id');
    }
    public function servicio()
    {
        return $this->belongsTo(servicio::class, 'idServicio', 'id');
    }
    public function propietarios()
    {
        return $this->belongsToMany(Propietario::class, 'lista_propietarios', 'idArtefacto', 'idPropietario');
    }
    public function personas()
    {
        return $this->belongsTo(Persona::class);
    }
}
