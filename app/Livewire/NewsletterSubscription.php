<?php

namespace App\Livewire;

use Livewire\Component;

class NewsletterSubscription extends Component
{
    public $email = '';
    public $success = false;

    protected $rules = [
        'email' => 'required|email|unique:subscribers,email',
    ];

    public function subscribe()
    {
        $this->validate();

        \App\Models\Subscriber::create([
            'email' => $this->email,
            'status' => 'active',
            'verified_at' => now(),
        ]);

        $this->success = true;
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
