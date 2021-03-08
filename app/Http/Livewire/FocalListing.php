<?php

namespace App\Http\Livewire;

use App\Models\Focal;
use Livewire\Component;

class FocalListing extends Component
{
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

    public function render()
    {
        return view('livewire.focal-listing',[
            'focals' => Focal::paginate(10)
        ]);
    }
}
