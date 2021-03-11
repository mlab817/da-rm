<?php

namespace App\Http\Livewire;

use App\Models\Report;
use App\Models\ReportPeriod;
use App\Traits\WithModal;
use Livewire\Component;
use Livewire\WithPagination;

class ReportListing extends Component
{
    use WithPagination;
    use WithModal;

    public $report_id;

    public $report_period_id;

    public $office_id;

    public $commodity_id;

    public $offices;

    public $commodities;

    public $report_periods;

    public $file;

    public $confirmDeleteDialog = false;

    public function cancelDelete()
    {
        $this->confirmDeleteDialog = false;
        $this->report_id = null;
    }

    public function confirmDelete($id)
    {
        $this->report_id = $id;
        $this->confirmDeleteDialog = true;
    }

    public function delete($id)
    {
        $report = Report::findOrFail($id);

        $report->delete();

        $this->confirmDeleteDialog = false;

        session()->flash('message', 'Successfully deleted report');
    }

    public function render()
    {
        $this->report_periods = ReportPeriod::select('id','name')->get();

        return view('livewire.report-listing',[
            'reports' => $this->report_period_id
                ? Report::where('report_period_id', $this->report_period_id)->paginate(10)
                : Report::paginate(10)
        ]);
    }
}
