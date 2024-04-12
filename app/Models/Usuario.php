<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['UserId', 'Nombre', 'Email', 'Password', 'IsAdmin'];
    protected $dates = ['created_at','updated_at','deleted_at'];
}