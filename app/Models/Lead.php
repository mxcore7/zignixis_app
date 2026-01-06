<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'source',
        'status',
        'notes',
        'estimated_value',
        'probability',
        'assigned_to',
        'last_contacted_at',
        'qualified_at',
        'won_at',
    ];

    protected $casts = [
        'estimated_value' => 'decimal:2',
        'probability' => 'integer',
        'last_contacted_at' => 'datetime',
        'qualified_at' => 'datetime',
        'won_at' => 'datetime',
    ];

    // Relationship
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    // Scopes
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeQualified($query)
    {
        return $query->where('status', 'qualified');
    }

    public function scopeWon($query)
    {
        return $query->where('status', 'won');
    }

    // Status helpers
    public function markAsContacted()
    {
        $this->update([
            'status' => 'contacted',
            'last_contacted_at' => now(),
        ]);
    }

    public function markAsQualified()
    {
        $this->update([
            'status' => 'qualified',
            'qualified_at' => now(),
        ]);
    }

    public function markAsWon()
    {
        $this->update([
            'status' => 'won',
            'won_at' => now(),
            'probability' => 100,
        ]);
    }

    // Auto-create lead from contact
    public static function createFromContact($contact)
    {
        return self::create([
            'name' => $contact->name,
            'email' => $contact->email,
            'phone' => $contact->phone ?? null,
            'source' => 'website',
            'status' => 'new',
            'notes' => "Message initial: " . $contact->message,
        ]);
    }

    // Status badge color
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'new' => 'blue',
            'contacted' => 'yellow',
            'qualified' => 'purple',
            'proposal' => 'indigo',
            'won' => 'green',
            'lost' => 'red',
            default => 'gray',
        };
    }
}
