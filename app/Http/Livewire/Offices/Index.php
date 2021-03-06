<?php

namespace App\Http\Livewire\Offices;

use App\Models\Office;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $offices = Office::all();

        return view('offices', [
            'offices' => $offices
        ]);
    }
}
