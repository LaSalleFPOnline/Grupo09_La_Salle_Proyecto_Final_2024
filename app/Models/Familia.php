<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familia extends Model
{
    use SoftDeletes;

    protected $table = 'familias';
    protected $primaryKey = 'id';
    protected $fillable = ['CodigoFamilia', 'DescripcionFamilia'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}