<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($contact) {
            Notification::createNotification(
                'new_contact',
                "Nouveau message de {$contact->name} : {$contact->subject}",
                route('admin.dashboard')
            );

            // Auto-create lead from contact
            Lead::createFromContact($contact);
        });
    }
}
