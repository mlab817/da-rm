<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $searchTerm;

    public function render()
    {
        return view('livewire.search');
    }
}
