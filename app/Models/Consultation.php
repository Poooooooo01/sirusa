<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'consultations';  // Nama tabel yang benar

    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'consultation_date',
        'status',
        'notes',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function telemedicines()
    {
        return $this->hasMany(Telemedicine::class);
    }
}
