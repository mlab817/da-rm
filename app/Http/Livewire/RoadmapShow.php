<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Livewire\Component;

class RoadmapShow extends Component
{
    public $roadmap;

    public $focals;

    public function mount(Roadmap $roadmap)
    {
        $this->roadmap = $roadmap;
        $this->focals = $roadmap->focals;
    }

    public function render()
    {
        return view('livewire.roadmap-show');
    }
}
