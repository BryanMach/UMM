<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artefacto;

class Inspeccione extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inspecciones';

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
    protected $fillable = ['idArtefacto', 'gestion','jefeinspector','motivo'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class,'idArtefacto','id');
    }
}
