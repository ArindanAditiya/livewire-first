<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate("required|email:dns")]
    public $email = "";
    #[Validate("required")]
    public $subject = "";
    #[Validate("required")]
    public $message = "";

    public function store()
    {
        // agar lebih clean, untuk validasi bisa dijalankan di dalam sini
        $validated = $this->validate();

        Contact::create($validated);

        // agar lebih clean untuk reset juga bisa ditaruh di sini
        $this->reset();
    }
}
