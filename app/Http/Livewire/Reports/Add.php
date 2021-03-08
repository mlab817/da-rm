<?php

namespace App\Http\Livewire\Reports;

use App\Models\Report;
use Livewire\Component;

class Add extends Component
{
    // Declare properties
    public $report;

    public function mount($report)
    {
        $this->report = null;

        if ($report)
        {
            $this->report = $report;
        }
    }

    public function render()
    {
        return view('livewire.reports.add');
    }
}
