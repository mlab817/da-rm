<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $message;

    public $type = 'success';

    public function mount($message = '', $type = '')
    {
        $this->message  = $message;
        $this->type    = $type;
    }

    public function render()
    {
        return <<<'blade'
            <div class="alert alert-{{ $type }}" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        blade;
    }
}
