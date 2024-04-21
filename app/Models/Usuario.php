<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model implements Authenticatable
{
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $fillable = ['UserId', 'Nombre', 'Email', 'Password', 'IsAdmin'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function getAuthIdentifierName()
    {

    }

    public function getAuthIdentifier()
    {

    }

    public function getAuthPassword()
    {

    }

    public function getRememberToken()
    {

    }

    public function setRememberToken($value)
    {

    }

    public function getRememberTokenName()
    {

    }
}