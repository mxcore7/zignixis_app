<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        // Step 1: Project Nature
        'project_type',
        'project_type_other',
        
        // Step 2: Timeline
        'timeline_urgency',
        'start_date',
        'is_date_fixed',
        
        // Step 3: Budget
        'budget_range',
        'funding_mode',
        
        // Step 4: Company Context
        'industry',
        'company_size',
        'country',
        'city',
        'existing_system',
        'users_count',
        
        // Step 5: Description
        'description',
        'references',
        'priority_features',
        'technical_constraints',
        
        // Step 6: Contact & Engagement
        'contact_name',
        'company_name',
        'email',
        'phone',
        'job_title',
        'discovery_source',
        'serious_commitment',
        
        // Meta
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'is_date_fixed' => 'boolean',
        'serious_commitment' => 'boolean',
    ];

    /**
     * Get the final formatted project type.
     */
    public function getFinalProjectTypeAttribute(): string
    {
        if ($this->project_type === 'Autre' && $this->project_type_other) {
            return 'Autre : ' . $this->project_type_other;
        }
        return $this->project_type;
    }
    
    /**
     * Accessor for status formatting
     */
    public function getStatusLabelAttribute(): string
    {
        $statuses = [
            'new' => 'Nouveau',
            'in_progress' => 'En cours',
            'completed' => 'Traité',
            'rejected' => 'Rejeté',
        ];
        
        return $statuses[$this->status] ?? ucfirst($this->status);
    }
    
    public function getStatusColorAttribute(): string
    {
        $colors = [
            'new' => 'bg-blue-100 text-blue-800 ring-blue-600/20',
            'in_progress' => 'bg-yellow-100 text-yellow-800 ring-yellow-600/20',
            'completed' => 'bg-green-100 text-green-800 ring-green-600/20',
            'rejected' => 'bg-red-100 text-red-800 ring-red-600/20',
        ];
        
        return $colors[$this->status] ?? 'bg-gray-100 text-gray-800 ring-gray-600/20';
    }
}
