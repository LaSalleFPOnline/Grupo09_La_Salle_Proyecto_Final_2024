<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cobro extends Model
{
    use SoftDeletes;

    protected $table = 'cobros';
    protected $primaryKey = 'CobroId';
    protected $fillable = ['VentaId', 'Importe'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}