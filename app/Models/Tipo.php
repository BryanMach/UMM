<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Artefacto;

class Tipo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipos';

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
    protected $fillable = ['tipo'];

    public function artefactos(){
        return $this->hasMany(Artefacto::class);
    }
}
