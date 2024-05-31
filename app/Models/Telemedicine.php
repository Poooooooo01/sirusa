<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telemedicine extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'telemedicine';  // Correct table name

    protected $fillable = [
        'service_name',
        'description',
        'price',
        'consultation_id'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}