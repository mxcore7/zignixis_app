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

    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo && file_exists(public_path('storage/' . $this->photo))) {
            return asset('storage/' . $this->photo);
        }

        $name = urlencode($this->name);
        return "https://ui-avatars.com/api/?name={$name}&size=200&background=0f172a&color=ffffff&bold=true";
    }
}
