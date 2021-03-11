<?php

namespace App\Http\Livewire;

use App\Models\Report;
use Livewire\Component;

class ReportListing extends Component
{
    public function render()
    {
        return view('livewire.report-listing',[
            'reports' => Report::paginate(10),
        ]);
    }
}
