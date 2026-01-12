<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'website',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active partners
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by order field
     */
    /**
     * Scope to order by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return null;
        }
        
        $url = \Illuminate\Support\Facades\Storage::url($this->logo);
        
        // Add cache-busting parameter based on file modification time
        try {
            $path = \Illuminate\Support\Facades\Storage::disk('public')->path($this->logo);
            if (file_exists($path)) {
                $timestamp = filemtime($path);
                $url .= '?v=' . $timestamp;
            }
        } catch (\Exception $e) {
            // Ignore errors, return URL without cache-busting
        }
        
        return $url;
    }
}
