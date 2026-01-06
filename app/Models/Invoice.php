<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'project_id',
        'number',
        'issue_date',
        'due_date',
        'amount',
        'status',
        'file_path',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'due_date' => 'date',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'paid' => 'Payée',
            'unpaid' => 'Impayée',
            'overdue' => 'En retard',
            default => 'Inconnu',
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'paid' => 'green',
            'unpaid' => 'yellow',
            'overdue' => 'red',
            default => 'gray',
        };
    }

}
