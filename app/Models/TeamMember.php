<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use \Spatie\Translatable\HasTranslations;

    public $translatable = ['role', 'bio'];

    protected $fillable = [
        'name',
        'photo',
        'role',
        'bio',
        'social_links',
        'order',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
