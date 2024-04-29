<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Personal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personals';

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
    protected $fillable = ['ci', 'cargo', 'grado', 'nombres', 'apellidos', 'contacto', 'foto', 'descripcion', 'vigencia'];
    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }
}
