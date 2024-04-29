<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datosAdicionale extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'datos_adicionales';

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
    protected $fillable = ['idArtefacto', 'lugar', 'mercPelig', 'maxPasajeros', 'cargaComb', 'peso', 'altura'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class);
    }
}
