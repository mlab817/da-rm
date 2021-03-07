<?php

namespace App\Http\Livewire\Roadmaps;

use App\Models\Roadmap;
use Livewire\Component;

class Index extends Component
{
    public $roadmaps;

    public function render()
    {
        $this->roadmaps = Roadmap::all();

        return view('livewire.roadmaps.index');
    }
}
