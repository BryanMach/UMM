<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Artefacto;

class Material extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'materials';

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
    protected $fillable = ['material'];

    public function material(){
        return $this->hasMany(Artefacto::class);
    }
}
