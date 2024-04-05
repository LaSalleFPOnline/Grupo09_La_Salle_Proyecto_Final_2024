<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;

    protected $table = 'reservas';
    protected $primaryKey = 'ReservaId';
    protected $fillable = ['UserId', 'PistaId', 'Fecha', 'Hora'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}