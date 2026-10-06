<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.myapp")] // kalau mau costume layout, untuk default pake app
// kalau misalnya nnti mau ganti yang defaultnya apa bisa di /config/livewire.php tapi diinport dulu dari vedor lewat terminal
class Users extends Component
{
    // sahrusnya kalau misalnya nama viewnya sama dengan nama classnya gaperlu panggil rander lagi
    public function render()
    {
        return view('livewire.users');
    }
}
