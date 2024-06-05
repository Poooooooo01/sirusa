<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'about_details';

    protected $fillable = [
        'title',
        'description'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
}