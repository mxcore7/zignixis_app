<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    protected $fillable = [
        'client_name',
        'company',
        'position',
        'content',
        'avatar',
        'rating',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
