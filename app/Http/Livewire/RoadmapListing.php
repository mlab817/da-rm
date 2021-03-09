<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Livewire\Component;

class RoadmapListing extends Component
{
    public function delete($id)
    {
        $roadmap = Roadmap::findOrFail($id);
        $roadmap->delete();

        session()->flash('message','Successfully deleted report');
    }

    public function render()
    {
        return view('livewire.roadmap-listing',[
            'roadmaps' => Roadmap::paginate(10)
        ]);
    }
}
