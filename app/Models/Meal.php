<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Meal extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'price'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'image' => 'string',
        'price' => 'string'
    ];
}
