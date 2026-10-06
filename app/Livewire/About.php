<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.myapp")]
class About extends Component
{
    public function render()
    {
        return <<<'HTML'
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800">About</h1>
                <p class="text-gray-500 mt-2">About Us</p>
            </div>
        HTML;
    }
}
