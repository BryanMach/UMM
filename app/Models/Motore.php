<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motore extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'motores';

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
    protected $fillable = ['idArtefacto', 'tipo', 'marca', 'numero', 'potencia', 'nominalelectrica'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class, 'idArtefacto', 'id');
    }
}
