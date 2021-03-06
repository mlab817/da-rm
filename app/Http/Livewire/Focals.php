<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Focal;
use App\Models\Office;
use App\Models\Roadmap;
use App\Traits\WithModal;
use Livewire\Component;

class Focals extends Component
{
    use WithModal;

    public  $roadmaps,
            $offices,
            $statuses,
            $status,
            $roadmap_id,
            $name,
            $designation,
            $email,
            $office_id,
            $telephone_number,
            $fax_number,
            $mobile_number,
            $viber_number,
            $focal_id;

    protected $rules = [
        'status'            => 'required|in:permanent,alternate',
        'roadmap_id'        => 'required',
        'name'              => 'required',
        'designation'       => 'required',
        'email'             => 'required',
        'office_id'         => 'required',
        'telephone_number'  => 'required',
        'fax_number'        => 'required',
        'mobile_number'     => 'required',
        'viber_number'      => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $this->offices = Office::select('id','name')->get();
        $this->roadmaps = Roadmap::select('id','name')->get();
        $this->statuses = ['permanent','alternate'];

        return view('livewire.focals.index',[
            'focals' => Focal::paginate(10)
        ]);
    }

    public function resetInputFields()
    {
        $this->status = '';
        $this->roadmap_id = '';
        $this->name = '';
        $this->designation = '';
        $this->email = '';
        $this->office_id = '';
        $this->telephone_number = '';
        $this->fax_number = '';
        $this->mobile_number = '';
        $this->viber_number = '';
        $this->focal_id = null;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $validatedData = $this->validate();

        $focal = Focal::updateOrCreate([
            'id' => $this->focal_id,
        ], $validatedData);

        session()->flash('message',
            $this->focal_id ? 'Successfully updated focal' : 'Successfully created focal'
        );

        $this->closeModal();
    }

    public function edit($id)
    {
        $focal = Focal::findOrFail($id);

        $this->status = $focal->status;
        $this->roadmap_id = $focal->roadmap_id;
        $this->name = $focal->name;
        $this->designation = $focal->designation;
        $this->email = $focal->email;
        $this->office_id = $focal->office_id;
        $this->telephone_number = $focal->telephone_number;
        $this->fax_number = $focal->fax_number;
        $this->mobile_number = $focal->mobile_number;
        $this->viber_number = $focal->viber_number;
        $this->focal_id = $focal->id;

        $this->openModal();
    }

    public function delete($id)
    {
        $focal = Focal::findOrFail($id);
        $focal->delete();

        session()->flash('message',
            'Successfully deleted focal'
        );
    }
}
