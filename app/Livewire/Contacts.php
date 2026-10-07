<?php

namespace App\Livewire;

use App\Livewire\Forms\ContactForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.myapp")]
class Contacts extends Component
{
    public ContactForm $form;

    public function submitContact()
    {
        // ini kalau mau langsung menggunakan method di dalam ContactForm
        // dengan cara ini jadi untuk form yang cukup kompleks bisa dipisahkan ke dalam class Form sendiri
        $this->form->store();
    
        session()->flash("success", "berhasil mengirimkan pesan");
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
