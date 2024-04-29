<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Artefacto;

class BasesOperativa extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bases_operativas';

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
    protected $fillable = ['idCuenca', 'baseOperativa'];

    public function artefactos(){
        return $this->hasMany(Artefacto::class);
    }
    public function cuenca(){
        return $this->belongsTo(Cuenca::class, 'idCuenca', 'id');
    }
}
