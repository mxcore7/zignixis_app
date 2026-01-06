<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriberFactory> */
    protected $fillable = [
        'email',
        'verified_at',
        'status',
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];
}
