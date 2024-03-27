<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatoGeneral extends Model
{
    use SoftDeletes;

    protected $table = 'datosgenerales';
    protected $primaryKey = 'id';
    protected $fillable = ['TiempoReserva', 'HoraInicio', 'HoraFin'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}