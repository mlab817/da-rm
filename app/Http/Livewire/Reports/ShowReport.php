<?php

namespace App\Http\Livewire\Reports;

use App\Models\Report;
use Livewire\Component;

class ShowReport extends Component
{
    public $report;

    public function mount($id)
    {
        $this->report = Report::with('office','upload')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.reports.show-report',[
            'report' => $this->report
        ]);
    }
}
