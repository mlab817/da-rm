<?php

namespace App\Http\Livewire;

use App\Models\Focal;
use Livewire\Component;

class FocalListing extends Component
{
    public $search;

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
            'focals' => $this->search
                ? Focal::search($this->search)->paginate(10)
                : Focal::paginate(10)
        ]);
    }
}
