<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Focal;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FocalAddForm extends Component
{
    public $focal = null,
        $status = '',
        $commodity_id = '',
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
            $this->commodity_id = $this->focal->commodity_id;
            $this->name = $this->focal->name;
            $this->designation = $this->focal->designation;
            $this->email = $this->focal->email;
            $this->office_id = $this->focal->office_id;
            $this->telephone_number = $this->focal->telephone_number;
            $this->fax_number = $this->focal->fax_number;
            $this->mobile_number = $this->focal->mobile_number;
            $this->viber_number = $this->focal->viber_number;
        }
    }

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
        $this->focal_id = null;
    }

    public function store()
    {
        $this->validate();

        $data = [
            'status' => $this->status,
            'commodity_id' => $this->commodity_id,
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
    }

    public function render()
    {
        return view('livewire.focal-add-form',[
            'offices' => Office::select('id','name')->get(),
            'commodities' => Commodity::select('id','name')->get(),
            'statuses' => ['permanent','alternate'],
        ]);
    }
}