<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use App\Models\Upload;
use App\Traits\WithModal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Reports extends Component
{
    use WithFileUploads;
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

    public $search = '';

    public function render()
    {
        $this->offices = Office::select('id','name')->get();
        $this->commodities = Commodity::select('id','name')->get();
        $this->report_periods = ReportPeriod::select('id','name')->get();

        return view('livewire.reports.index',[
            'reports' => $this->report_period_id
                ? Report::where('report_period_id', $this->report_period_id)->paginate(10)
                : Report::paginate(10),
        ]);
    }

    public function resetInputFields()
    {
        $this->report_id = null;
        $this->commodity_id = [];
        $this->office_id = null;
        $this->file = null;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->confirmDeleteDialog = true;
        $this->report_id = $id;
    }

    public function delete($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        $this->confirmDeleteDialog = false;

        session()->flash('message', 'Successfully deleted report');
    }

    public function download($id): BinaryFileResponse
    {
        $report = Report::findOrFail($id);
        $url = $report->upload ? $report->upload->url : null;

        if ($url) {
            return response()->download(Storage::disk('local')->path($url));
        } else {
            session()->flash('message', 'No file found');
        }
    }
}
