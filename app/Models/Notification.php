<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'message',
        'icon',
        'url',
        'read',
        'user_id',
    ];

    protected $casts = [
        'read' => 'boolean',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('read', false);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public static function createNotification($type, $message, $url = null, $userId = null)
    {
        $icons = [
            'new_contact' => '💬',
            'new_project' => '📁',
            'new_post' => '📝',
            'new_user' => '👤',
            'system' => '⚙️',
        ];

        return self::create([
            'type' => $type,
            'message' => $message,
            'icon' => $icons[$type] ?? '🔔',
            'url' => $url,
            'user_id' => $userId,
        ]);
    }
}
