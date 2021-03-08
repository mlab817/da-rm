<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\ReportPeriod;
use Livewire\Component;

class AddReport extends Component
{
    public $report;

    public $report_id;

    public $report_period_id;

    public $office_id;

    public $commodity_id;

    public $file;

    public $offices;

    public $commodities;

    public $report_periods;

//    public function mount($report)
//    {
//        $this->report = null;
//
//        if ($report)
//        {
//            $this->report = $report;
//        }
//    }

    public function render()
    {
        $this->offices = Office::all();
        $this->commodities = Commodity::all();
        $this->report_periods = ReportPeriod::all();

        return view('livewire.reports.add');
    }
}
