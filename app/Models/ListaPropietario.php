<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Artefacto;

class ListaPropietario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lista_propietarios';

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
    protected $fillable = ['idPropietario', 'idArtefacto'];

    public function artefactos(){
        return $this->belongsTo(Artefacto::class,'idArtefacto','id');
    }
    public function propietarios(){
        return $this->belongsTo(Tipo::class, 'idPropietario', 'id');
    }
}
