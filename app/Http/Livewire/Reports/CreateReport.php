<?php

namespace App\Http\Livewire\Reports;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use App\Models\Roadmap;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateReport extends Component
{
    use WithFileUploads;

    public $report_periods;
    public $offices;
    public $commodities;
    public $pageTitle = 'Add Report';

    public $report;

    public  $report_period_id = '',
            $office_id = '',
            $commodity_id = [],
            $file = null;

    protected $rules = [
        'report_period_id'      => 'required',
        'office_id'             => 'required',
        'file'                  => 'sometimes',
        'commodity_id'          => 'required|array'
    ];

    public function render()
    {
        $this->report_periods   = ReportPeriod::select('id','name')->get();
        $this->offices          = Office::select('id','name')->get();
        $this->commodities      = Commodity::select('id','name')->get();

        return view('livewire.reports.create-report');
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();

        $report = Report::create([
            'report_period_id'  => $validatedData['report_period_id'],
            'office_id'         => $validatedData['office_id'],
            'user_id'           => Auth::id(),
        ]);

        $report->commodities()->sync($validatedData['commodity_id']);

        // create report then upload file
        $upload = $validatedData['file']->storePublicly('reports');

        // create upload record
        if ($upload) {
            $newUpload = Upload::create([
                'upload_type_id' => 2,
                'title' => $report->report_period->name . ' - ' . $report->office->name,
                'url' => $upload,
                'user_id' => Auth::id(),
            ]);

            if ($newUpload) {
                $report->upload_id = $newUpload->id;
                $report->saveQuietly();
            }
        }

        return redirect()->route('reports');
    }

    public function resetInputFields()
    {
        $this->report_period_id = '';
        $this->office_id = '';
        $this->commodity_id = '';
        $this->file = '';
    }
}
