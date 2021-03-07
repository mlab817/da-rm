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
            $commodity_id = '',
            $start_date,
            $participants_involved,
            $activities_done,
            $activities_ongoing,
            $overall_status,
            $report_date,
            $user_id,
            $upload_id,
            $file;

    protected $rules = [
        'office_id'             => 'required',
        'commodity_id'          => 'required',
        'start_date'            => 'required',
        'participants_involved' => 'required',
        'activities_done'       => 'required',
        'activities_ongoing'    => 'required',
        'overall_status'        => 'required',
        'report_date'           => 'required',
        'report_period_id'      => 'required',
        'file'                  => 'sometimes',
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

        $roadmap = Roadmap::create($validatedData);

        // create report then upload file
        $upload = $this->file->storePublicly('roadmaps');

        // create upload record
        if ($upload) {
            $newUpload = Upload::create([
                'upload_type_id' => 2,
                'title' => $roadmap->commodity->name,
                'url' => $upload,
                'user_id' => Auth::id(),
            ]);

            if ($newUpload) {
                $roadmap->upload_id = $newUpload->id;
                $roadmap->saveQuietly();
            }
        }

        return redirect()->route('reports.show', $roadmap->id);
    }

    public function resetInputFields()
    {
        $this->office_id = '';
        $this->start_date = '';
        $this->commodity_id = '';
        $this->participants_involved = '';
        $this->activities_done = '';
        $this->activities_ongoing = '';
        $this->overall_status = '';
        $this->report_date = '';
        $this->report_period_id = '';
        $this->file = '';
    }
}
