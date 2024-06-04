<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificados';

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
     * 
     * tipoC corresponde a un tipo de certificado
     * registro=1
     * seguridad=2
     * arqueo=3
     * fb=4
     * medioAmb=5
     * dot min=6
     * 
     */
    protected $fillable = ['idArtefactos', 'tipoC', 'nreg','correlativo', 'fechaEmision', 'fechaAlerta', 'fechaVecimiento'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class,'idArtefactos','id');
    }
}
