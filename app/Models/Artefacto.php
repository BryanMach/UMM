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
        return $this->hasMany(Inspeccione::class);
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
        return $this->hasMany(certificado::class);
    }
    public function propietario()
    {
        return $this->hasMany(ListaPropietario::class);
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
}
