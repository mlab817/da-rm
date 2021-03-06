<?php

namespace App\Http\Livewire\Offices;

use App\Models\Office;
use Livewire\Component;

class ShowOffices extends Component
{
    public function render()
    {
        return view('livewire.show-offices', [
            'offices' => Office::all()
        ]);
    }
}
