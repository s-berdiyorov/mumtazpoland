<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $translatable = [
        'title'
    ];

    protected $fillable = [
        'title',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'image' => 'string'
    ];
}
