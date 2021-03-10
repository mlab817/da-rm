<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Focal;
use App\Models\Office;
use App\Models\Roadmap;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FocalAddForm extends Component
{
    public $focal = null,
        $status = '',
        $roadmap_id = '',
        $name = '',
        $designation = '',
        $email = '',
        $office_id = '',
        $telephone_number = '',
        $fax_number = '',
        $mobile_number = '',
        $viber_number = '',
        $focal_id = null;

    public function mount(?Focal $focal)
    {
        $this->focal = null;

        if ($focal)
        {
            $this->focal = $focal;
            $this->focal_id = $this->focal->id;
            $this->status = $this->focal->status;
            $this->roadmap_id = $this->focal->roadmap_id;
            $this->name = $this->focal->name;
            $this->designation = $this->focal->designation;
            $this->email = $this->focal->email;
            $this->office_id = $this->focal->office_id;
            $this->telephone_number = $this->focal->telephone_number;
            $this->fax_number = $this->focal->fax_number;
            $this->mobile_number = $this->focal->mobile_number;
            $this->viber_number = $this->focal->viber_number;
        }

        $office_id = request()->query('office_id');
        $roadmap_id = request()->query('roadmap_id');

        if ($office_id) {
            $this->office_id = $office_id;
        }

        if ($roadmap_id) {
            $this->roadmap_id = $roadmap_id;
        }
    }

    protected $rules = [
        'status'            => 'required|in:permanent,alternate',
        'roadmap_id'        => 'required',
        'name'              => 'required|max:50',
        'designation'       => 'required|max:50',
        'email'             => 'required|max:50',
        'office_id'         => 'required',
        'telephone_number'  => 'required|max:50',
        'fax_number'        => 'required|max:50',
        'mobile_number'     => 'required|max:50',
        'viber_number'      => 'required|max:50',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function store()
    {
        $this->validate();

        $data = [
            'status' => $this->status,
            'roadmap_id' => $this->roadmap_id,
            'name' => $this->name,
            'designation' => $this->designation,
            'email' => $this->email,
            'office_id' => $this->office_id,
            'telephone_number' => $this->telephone_number,
            'fax_number' => $this->fax_number,
            'mobile_number' => $this->mobile_number,
            'viber_number' => $this->viber_number,
            'user_id' => Auth::id(),
        ];

        if ($this->focal_id)
        {
            $focal = Focal::find($this->focal_id);
            $focal->update($data);
        } else {
            $focal = Focal::create($data);
        }

        session()->flash('message',
            $this->focal_id ? 'Successfully updated focal' : 'Successfully created focal'
        );

        return redirect()->route('focals');
    }

    public function render()
    {
        return view('livewire.focal-add-form',[
            'offices' => Office::select('id','name')->get(),
            'roadmaps' => Roadmap::with('commodity')->get(),
            'statuses' => ['permanent','alternate'],
        ]);
    }
}
