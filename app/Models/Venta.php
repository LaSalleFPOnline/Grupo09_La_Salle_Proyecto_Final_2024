<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $table = 'ventas';
    protected $primaryKey = 'VentaId';
    protected $fillable = ['Estado', 'UserId', 'ArticuloId', 'Precio', 'Unidades'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Usuario', 'UserId', 'UserId');
    }

    public function articulo()
    {
        return $this->belongsTo('App\Models\Articulo', 'ArticuloId', 'id');
    }

}