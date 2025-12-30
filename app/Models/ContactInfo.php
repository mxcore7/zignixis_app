<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';

    protected $fillable = [
        'key',
        'value',
        'icon',
        'type',
        'order',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    /**
     * Scope to order by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    /**
     * Get value for specific locale if translatable
     */
    public function getLocalizedValue($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        if (is_array($this->value) && isset($this->value[$locale])) {
            return $this->value[$locale];
        }
        
        return is_array($this->value) ? ($this->value['fr'] ?? $this->value['en'] ?? '') : $this->value;
    }
}
