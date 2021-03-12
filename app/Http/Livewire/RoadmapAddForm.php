<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
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

    public $office_id;

    public $start_date;

    public $roadmap;

    protected $rules = [
        'office_id' => 'required',
        'commodity_id' => 'required',
        'start_date' => 'required',
    ];

    public function mount(?Roadmap $roadmap)
    {
        $this->roadmap = null;

        if ($roadmap) {
            $this->roadmap = $roadmap;
            $this->office_id = $roadmap->office_id;
            $this->commodity_id =  $roadmap->commodity_id;
            $this->start_date = $roadmap->start_date;
            $this->roadmap_id = $roadmap->id;
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
                'office_id' => $this->office_id,
                'commodity_id' => $this->commodity_id,
                'start_date' => $this->start_date,
                'user_id' => Auth::id(),
            ]);
        } else {
            // save
            $roadmap = Roadmap::create([
                'office_id' => $this->office_id,
                'commodity_id' => $this->commodity_id,
                'start_date' => $this->start_date,
                'user_id' => Auth::id(),
            ]);
        }

        // flash message in session
        session()->flash('message',
            $this->roadmap_id ? 'Successfully updated roadmap' : 'Successfully added roadmap');

        // redirect to roadmap index
        return redirect()->route('roadmaps.index');
    }

    public function resetInputFields()
    {
        $this->roadmap_id = null;
        $this->office_id = '';
        $this->commodity_id = '';
        $this->start_date = '';
    }

    public function render()
    {
        return view('livewire.roadmap-add-form',[
            'offices'            => Office::all(),
            'commodities'       => $this->office_id
                ? Commodity::where('office_id',$this->office_id)->get()
                : Commodity::all(),
        ]);
    }
}
