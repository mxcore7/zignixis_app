<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $success = false;

    protected $rules = [
        'firstName' => 'required|min:2',
        'lastName' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        \App\Models\Contact::create([
            'name' => $this->firstName . ' ' . $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => 'Nouveau message de contact', // Default subject since it's not in the form
            'message' => $this->message,
            'is_read' => false,
        ]);

        $this->success = true;
        $this->reset(['firstName', 'lastName', 'email', 'phone', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
