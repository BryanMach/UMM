<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificacione extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'certificaciones';

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
    protected $fillable = ['idCuenca', 'numero'];

    public function cuenca(){
        return $this->belongsTo(Cuenca::class, 'idCuenca', 'id');
    }
}
