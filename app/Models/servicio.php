<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'servicios';

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
    protected $fillable = ['servicio'];

    public function artefacto()
    {
        return $this->hasMany(Artefacto::class);
    }
}
