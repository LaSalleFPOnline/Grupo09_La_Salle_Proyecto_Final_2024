<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pista extends Model
{
    use SoftDeletes;

    protected $table = 'pistas';
    protected $primaryKey = 'PistaId';
    protected $fillable = ['CodigoPista', 'DescripcionPista'];
    protected $dates = ['deleted_at'];
}