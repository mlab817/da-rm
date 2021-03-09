<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Report;
use App\Models\Roadmap;
use App\Models\Upload;
use App\Models\UploadType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class RoadmapAddForm extends Component
{
    use WithFileUploads;

    public $roadmap_id;

    public $commodity_id;

    public $report_id;

    public $start_date;

    public $participants_involved;

    public $activities_done;

    public $activities_ongoing;

    public $overall_status;

    public $report_date;

    public $upload_id;

    public $user_id;

    public $file;

    public $roadmap;

    protected $rules = [
        'report_id' => 'required',
        'commodity_id' => 'required',
        'start_date' => 'required',
        'participants_involved' => 'required',
        'activities_done' => 'required',
        'activities_ongoing' => 'required',
        'overall_status' => 'required',
        'report_date' => 'required',
        'file' => 'sometimes|mimes:pdf',
    ];

    public function mount(?Roadmap $roadmap)
    {
        $this->roadmap = null;

        if ($roadmap) {
            $this->roadmap = $roadmap;
            $this->roadmap_id = $this->roadmap->id;
            $this->commodity_id = $this->roadmap->commodity_id;
            $this->report_id = $this->roadmap->report_id;
            $this->start_date = $this->roadmap->start_date;
            $this->participants_involved = $this->roadmap->participants_involved;
            $this->activities_done = $this->roadmap->activities_done;
            $this->activities_ongoing = $this->roadmap->activities_ongoing;
            $this->overall_status = $this->roadmap->overall_status;
            $this->report_date = $this->roadmap->report_date;
            $this->file = null;
        }
    }

    public function store()
    {
        $this->validate();

        $roadmap = null;

        if ($this->roadmap_id) {
            // update
            $roadmap = Roadmap::findOrFail($this->roadmap_id);
            $roadmap->update([
                'report_id' => $this->report_id,
                'commodity_id' => $this->commodity_id,
                'start_date' => $this->start_date,
                'participants_involved' => $this->participants_involved,
                'activities_done' => $this->activities_done,
                'activities_ongoing' => $this->activities_ongoing,
                'overall_status' => $this->overall_status,
                'report_date' => $this->report_date,
                'user_id' => Auth::id(),
            ]);
        } else {
            // save
            $roadmap = Roadmap::create([
                'report_id' => $this->report_id,
                'commodity_id' => $this->commodity_id,
                'start_date' => $this->start_date,
                'participants_involved' => $this->participants_involved,
                'activities_done' => $this->activities_done,
                'activities_ongoing' => $this->activities_ongoing,
                'overall_status' => $this->overall_status,
                'report_date' => $this->report_date,
                'user_id' => Auth::id(),
            ]);
        }
        // handle file save
        if ($this->file)
        {
            $title = preg_replace('/[^a-zA-Z0-9\-\._]/',' ', time() . '_' . $roadmap->commodity->name . ' as of ' . $roadmap->report->report_period->name);
            $uploadedFile = $this->file->storePubliclyAs('roadmaps', $title . '.' . $this->file->extension());

            $upload = Upload::create([
                'upload_type_id' => UploadType::where('name', 'roadmap')->first()->id,
                'title' => $title,
                'user_id' => Auth::id(),
                'url' => $uploadedFile
            ]);

            if ($upload)
            {
                $roadmap->upload_id = $upload->id;
                $roadmap->save();
            }
        }

        // flash message in session
        session()->flash('message','Successfully added report');
    }

    public function render()
    {
        return view('livewire.roadmap-add-form',[
            'reports'           => Report::all()->sortBy('report_period_id'),
            'commodities'       => Commodity::all(),
        ]);
    }
}
