<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelemedicineDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'telemedicine_details';  // Nama tabel yang benar

    protected $fillable = [
        'telemedicine_id',
        'detail_description',
        'amount',
        'drug_id',
        'total',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function telemedicine()
    {
        return $this->belongsTo(Telemedicine::class);
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
