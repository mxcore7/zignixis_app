<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdooModule extends Model
{
    use \Spatie\Translatable\HasTranslations;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'icon',
        'description',
        'features',
        'link',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
