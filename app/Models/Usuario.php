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
    protected $fillable = ['UserId', 'Nombre', 'Email', 'Password', 'IsAdmin', '_token'];
    protected $nullable = ['UserId'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function getAuthIdentifierName()
    {
        return $this->Email;
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function getRememberToken()
    {
        return $this->_token;
    }

    public function setRememberToken($value)
    {
        $this->_token = $value;
        $this->save();
    }

    public function getRememberTokenName()
    {

    }
}