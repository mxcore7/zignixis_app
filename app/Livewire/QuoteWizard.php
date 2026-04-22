<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quote;

class QuoteWizard extends Component
{
    public $step = 1;
    public $success = false;

    // Step 1: Project Nature
    public $project_type = '';
    public $project_type_other = '';

    // Step 2: Timeline
    public $timeline_urgency = '';
    public $start_date = '';
    public $is_date_fixed = false;

    // Step 3: Budget
    public $budget_range = ''; // Will hold string like '1 000 000 – 2 000 000 FCFA'
    public $funding_mode = '';

    // Step 4: Company Context
    public $industry = '';
    public $company_size = '';
    public $country = 'Cameroun';
    public $city = '';
    public $existing_system = '';
    public $users_count = '';

    // Step 5: Description
    public $description = '';
    public $references = '';
    public $priority_features = '';
    public $technical_constraints = '';

    // Step 6: Contact & Engagement
    public $contact_name = '';
    public $company_name = '';
    public $email = '';
    public $phone = '';
    public $job_title = '';
    public $discovery_source = '';
    public $serious_commitment = false;

    // Validation Rules mapping to steps
    protected function rules()
    {
        return [
            1 => [
                'project_type' => 'required|string',
                'project_type_other' => 'required_if:project_type,Autre|max:255',
            ],
            2 => [
                'timeline_urgency' => 'required|string',
                'start_date' => 'nullable|string|max:255',
                'is_date_fixed' => 'nullable|boolean',
            ],
            3 => [
                'budget_range' => 'required|string',
                'funding_mode' => 'nullable|string',
            ],
            4 => [
                'industry' => 'required|string',
                'company_size' => 'required|string',
                'country' => 'required|string',
                'city' => 'required|string',
                'existing_system' => 'required|string',
                'users_count' => 'nullable|string',
            ],
            5 => [
                'description' => 'required|string|min:10',
                'references' => 'nullable|string',
                'priority_features' => 'nullable|string',
                'technical_constraints' => 'nullable|string',
            ],
            6 => [
                'contact_name' => 'required|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:50',
                'job_title' => 'nullable|string',
                'discovery_source' => 'nullable|string',
                'serious_commitment' => 'accepted', // Must be true/1/on/yes
            ]
        ];
    }
    
    // Custom messages
    protected $messages = [
        'project_type_other.required_if' => 'Veuillez préciser la nature de votre projet.',
        'serious_commitment.accepted' => 'Vous devez confirmer votre engagement à donner suite.',
        'description.min' => 'Merci de décrire votre projet avec un peu plus de détails.',
    ];

    public function nextStep()
    {
        $this->validate($this->rules()[$this->step]);
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }

    public function submit()
    {
        // Final validation for all steps
        $rules = collect($this->rules())->collapse()->toArray();
        $this->validate($rules);

        Quote::create([
            'project_type' => $this->project_type,
            'project_type_other' => $this->project_type_other,
            'timeline_urgency' => $this->timeline_urgency,
            'start_date' => $this->start_date,
            'is_date_fixed' => $this->is_date_fixed,
            'budget_range' => $this->budget_range,
            'funding_mode' => $this->funding_mode,
            'industry' => $this->industry,
            'company_size' => $this->company_size,
            'country' => $this->country,
            'city' => $this->city,
            'existing_system' => $this->existing_system,
            'users_count' => $this->users_count,
            'description' => $this->description,
            'references' => $this->references,
            'priority_features' => $this->priority_features,
            'technical_constraints' => $this->technical_constraints,
            'contact_name' => $this->contact_name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'job_title' => $this->job_title,
            'discovery_source' => $this->discovery_source,
            'serious_commitment' => $this->serious_commitment,
        ]);

        $this->success = true;
    }

    public function render()
    {
        return view('livewire.quote-wizard');
    }
}
