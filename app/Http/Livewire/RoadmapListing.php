<?php

namespace App\Http\Livewire;

use App\Models\Roadmap;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RoadmapListing extends Component
{
    public function download($id): BinaryFileResponse
    {
        $roadmap = Roadmap::findOrFail($id);

        if ($roadmap->upload->url) {
            return response()->download(Storage::url( $roadmap->upload->url));
        }
    }

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
