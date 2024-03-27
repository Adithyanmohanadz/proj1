<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class Admin extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id';

    // ...

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null; // not needed for now, you can implement it if you need it
    }

    public function setRememberToken($value)
    {
        // not needed for now, you can implement it if you need it
    }

    public function getRememberTokenName()
    {
        return null; // not needed for now, you can implement it if you need it
    }

    // You may need to add other methods required by the contract based on your needs

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
