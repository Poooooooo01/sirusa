<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'configurations';

    protected $fillable = [
        'hospital_name',
        'phone_number',
        'address',
        'service_text',
        'doctor_text',
        'about_text',
        'reason',
        'email',
        'subtitle',
        'about_youtube_link',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function configuration()
    {
        return $this->belongsTo(Configuration::class, 'id');
    }
}
