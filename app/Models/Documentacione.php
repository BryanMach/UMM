<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documentacione extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'documentaciones';

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
    protected $fillable = ['idArtefacto', 'directorio'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class);
    }
}
