<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, \Spatie\Translatable\HasTranslations;

    public $translatable = ['name', 'short_description', 'full_description'];

    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'short_description',
        'full_description',
        'features',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}
