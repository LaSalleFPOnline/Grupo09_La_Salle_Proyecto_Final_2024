<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use SoftDeletes;

    protected $table = 'articulos';
    protected $primaryKey = 'id';
    protected $fillable = ['CodigoArticulo', 'DescripcionArticulo', 'FamiliaId', 'Stock', 'Precio'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}