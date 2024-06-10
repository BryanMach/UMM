<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use app\Models\BasesOperativa;

class Cuenca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuencas';

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
    protected $fillable = ['cuenca'];

    public function basesoperativas(){
        return $this->hasMany(BasesOperativa::class,'idCuenca');
    }
    public function certificaciones(){
        return $this->hasMany(Certificacione::class,'idCuenca');
    }
}
