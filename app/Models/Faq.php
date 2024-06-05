<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faq';

    protected $fillable = [
        'id',
        'question',
        'answer',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function faq()
    {
        return $this->belongsTo(Faq::class, 'id');
    }
}
