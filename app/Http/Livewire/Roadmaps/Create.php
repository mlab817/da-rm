<?php

namespace App\Http\Livewire\Roadmaps;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\ReportPeriod;
use Livewire\Component;

class Create extends Component
{
    public $commodities;

    public $report_periods;

    public $offices;

    public function render()
    {
        $this->report_periods = ReportPeriod::select('id','name')->get();
        $this->offices = Office::select('id','name')->get();
        $this->commodities = Commodity::select('id','name')->get();

        return view('livewire.roadmaps.create');
    }
}
