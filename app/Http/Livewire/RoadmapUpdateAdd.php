<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\Roadmap;
use App\Models\RoadmapUpdate;
use Livewire\Component;

class RoadmapUpdateAdd extends Component
{
    public $roadmap;
    public $roadmap_id;
    public $report_id;
    public $participants_involved;
    public $activities_done;
    public $activities_ongoing;
    public $overall_status;
    public $report_date;
    public $remarks;

    protected $rules = [
        'report_id'             => 'required',
        'participants_involved' => 'required',
        'activities_done'       => 'required',
        'activities_ongoing'    => 'required',
        'overall_status'        => 'required',
        'remarks'               => 'required',
    ];

    public function mount()
    {
        $this->roadmap_id = request()->query('roadmap');
        $this->roadmap = Roadmap::find($this->roadmap_id);
    }

    public function store()
    {
        $this->validate();

        $roadmapUpdate = RoadmapUpdate::create([
            'roadmap_id'            => $this->roadmap_id,
            'report_id'             => $this->report_id,
            'participants_involved' => $this->participants_involved,
            'activities_done'       => $this->activities_done,
            'activities_ongoing'    => $this->activities_ongoing,
            'overall_status'        => $this->overall_status,
            'remarks'               => $this->remarks,
        ]);

        return redirect()->route('roadmaps.show', $this->roadmap_id);
    }

    public function render()
    {

        return view('livewire.roadmap-update-add',[
            'reports' => Report::where('office_id', $this->roadmap->office_id)->get(),
        ]);
    }
}
