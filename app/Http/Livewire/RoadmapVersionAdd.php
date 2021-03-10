<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\RoadmapVersion;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoadmapVersionAdd extends Component
{
    use WithFileUploads;

    public $versions;

    public $roadmap_id,
            $date,
            $title,
            $attachment,
            $url,
            $report_id;

    public $uploadVersionDialog = false;

    protected $rules = [
        'report_id' => 'required',
        'date'      => 'required',
        'attachment'=> 'required|mimes:pdf',
        'title'     => 'required',
    ];

    public function uploadFile()
    {
        $this->uploadVersionDialog = true;
    }

    public function cancel()
    {
        $this->uploadVersionDialog = false;
    }

    public function mount($versions, $roadmap_id)
    {
        $this->versions = $versions;
        $this->roadmap_id = $roadmap_id;
    }

    public function store()
    {
        $this->validate();

        $file = $this->attachment->storePublicly('roadmaps');

        // if successfully saved, create roadmap version entry
        if ($file) {
            $roadmapVersion = RoadmapVersion::create([
                'report_id' => $this->report_id,
                'roadmap_id'=> $this->roadmap_id,
                'title'     => $this->title,
                'url'       => $file,
                'date'      => $this->date
            ]);
        }

        session()->flash('message','Successfully added roadmap version');
    }

    public function deleteVersion($id)
    {
        $roadmapVersion = RoadmapVersion::find($id);
        $roadmapVersion->delete();

        session()->flash('message','Successfully deleted version');
    }

    public function render()
    {
        return view('livewire.roadmap-version-add',[
            'reports' => Report::all(),
        ]);
    }
}
