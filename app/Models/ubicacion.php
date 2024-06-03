<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ubicacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ubicacions';

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
    protected $fillable = ['idUsuario', 'idCuenca', 'idBaseOperativa'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'id');
    }
    public function cuenca()
    {
        return $this->belongsTo(Cuenca::class, 'idCuenca', 'id');
    }
    public function base()
    {
        return $this->belongsTo(BasesOperativa::class, 'idBaseOperativa', 'id');
    }
}
