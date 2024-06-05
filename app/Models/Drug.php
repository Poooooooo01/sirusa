<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'drugs';  // Correct table name

    protected $fillable = [
        'id',
        'drug_name',
        'brand_id',
        'description',
        'category_id',
        'price',
        'image',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
