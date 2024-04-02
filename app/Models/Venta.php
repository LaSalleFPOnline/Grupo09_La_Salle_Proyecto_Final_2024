<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $table = 'ventas';
    protected $primaryKey = 'VentaId';
    protected $fillable = ['Linea', 'UserId', 'ReservaId', 'ArticuloId', 'Precio', 'Unidades'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}