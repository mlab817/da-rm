<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Livewire\Component;

class RoadmapShow extends Component
{
    public $roadmap;

    public $focals;

    public $roadmap_updates;

    public function mount($roadmap)
    {
        $this->roadmap          = Roadmap::where('id',$roadmap)->with(['focals','roadmap_updates','roadmap_versions'])->first();
        $this->focals           = $this->roadmap->focals;
        $this->roadmap_updates  = $this->roadmap->roadmap_updates;
    }

    public function render()
    {
        return view('livewire.roadmap-show');
    }
}
