<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Livewire\Component;

class RoadmapUpdates extends Component
{
    public $updates;

    public $roadmap;

    public function mount(?Roadmap $roadmap)
    {
        $this->roadmap = $roadmap;
        $this->updates = $roadmap->roadmap_updates ?? [];
    }

    public function render()
    {
        return view('livewire.roadmap-updates');
    }
}
