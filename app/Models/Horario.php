<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horario extends Model
{
    use SoftDeletes;

    protected $table = 'horarios';
    protected $primaryKey = 'id';
    protected $fillable = ['HoraDesde', 'HoraHasta'];
    protected $dates = ['deleted_at'];
}