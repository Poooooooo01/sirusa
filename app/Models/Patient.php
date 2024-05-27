<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'patients';

    protected $fillable = [
        'id',
        'nik',
        'nama',
        'date_of_birth',
        'gender',
        'address',
        'emergency_contact',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }
}
