<?php

namespace App\Http\Livewire\Reports;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use Livewire\Component;

class Edit extends Component
{
    public $report_periods, $commodities, $offices, $report;

    public $report_id;

    public $commodity_id;

    public $report_period_id;

    public $office_id;

    public function mount(Report $report)
    {
        $this->report = $report;
    }

    public function render()
    {
        $this->report_periods = ReportPeriod::all();
        $this->commodities = Commodity::all();
        $this->offices = Office::all();

        return view('livewire.reports.edit');
    }
}
