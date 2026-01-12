<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, \Spatie\Translatable\HasTranslations;

    public $translatable = ['title', 'description', 'solution', 'results', 'testimonial', 'meta_title', 'meta_description', 'meta_keywords'];

    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    protected $fillable = [
        'user_id', 'title', 'slug', 'client_name', 'sector', 'description', 'solution', 'results', 'testimonial', 'featured_image', 'images', 'published_at', 'status', 'deadline',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'images' => 'array',
        'published_at' => 'datetime',
        'deadline' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'En attente',
            'in_progress' => 'En cours',
            'completed' => 'Terminé',
            'cancelled' => 'Annulé',
            default => 'Inconnu',
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'in_progress' => 'blue',
            'completed' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }
}
