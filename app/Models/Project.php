<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, \Spatie\Translatable\HasTranslations;

    public $translatable = ['title', 'description', 'solution', 'results'];

    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'sector',
        'description',
        'solution',
        'results',
        'testimonial',
        'featured_image',
        'images',
        'published_at',
    ];

    protected $casts = [
        'images' => 'array',
        'published_at' => 'datetime',
    ];
}
