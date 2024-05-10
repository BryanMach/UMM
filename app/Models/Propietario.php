<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ListaPropietario;

class Propietario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'propietarios';

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
    protected $fillable = ['nombre', 'tipo', 'identificador', 'FechaIni'];

    public function propietario()
    {
        return $this->hasMany(ListaPropietario::class);
    }
}
