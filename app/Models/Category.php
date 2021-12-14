<?php

namespace App\Models;

use App\Models\Traits\UploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations, UploadImage;

    protected string $imageAttribute = 'image';

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
