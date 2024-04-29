<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recuperar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recuperars';

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
    protected $fillable = ['idUsuario', 'tabla', 'posicion', 'operacion', 'fecha', 'campo', 'dato'];
//muchos usuarios generan registros para recuperar
    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }
}
