<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Focal;
use App\Models\Office;
use Livewire\Component;

class Focals extends Component
{
    public $focals,
        $commodities,
        $offices,
        $statuses,
        $status,
        $commodity_id,
        $name,
        $designation,
        $email,
        $office_id,
        $telephone_number,
        $fax_number,
        $mobile_number,
        $viber_number,
        $focal_id;

    public $isOpen = false;

    protected $rules = [
        'status'            => 'required|in:permanent,alternate',
        'commodity_id'      => 'required',
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
        $this->focals = Focal::all();
        $this->offices = Office::select('id','name')->get();
        $this->commodities = Commodity::select('id','name')->get();
        $this->statuses = ['permanent','alternate'];

        return view('livewire.focals.index');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->status = '';
        $this->commodity_id = '';
        $this->name = '';
        $this->designation = '';
        $this->email = '';
        $this->office_id = '';
        $this->telephone_number = '';
        $this->fax_number = '';
        $this->mobile_number = '';
        $this->viber_number = '';
        $this->focal_id = '';
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
        $this->commodity_id = $focal->commodity_id;
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
