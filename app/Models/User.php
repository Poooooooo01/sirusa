<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'email',
        'role'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = Hash::make($password);
    // }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'id');
    }
    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'id');
    }
}
