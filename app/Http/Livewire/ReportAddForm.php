<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReportAddForm extends Component
{
    use WithFileUploads;

    public $report;

    public $report_id;

    public $report_period_id = '';

    public $office_id = '';

    public $commodity_id = [];

    public $file = null;

    public $offices;

    public $commodities;

    public $report_periods;

    public $pageTitle = 'Add/Edit Report';

    public function mount(?Report $report)
    {
        $this->report = null;

        if ($report)
        {
            $this->report = $report;
            $this->report_id = $this->report->id;
            $this->report_period_id = $this->report->report_period_id;
            $this->office_id = $this->report->office_id;
            $this->commodity_id = $this->report->commodities->pluck('id') ?? [];
            $this->file = null;
        }
    }

    protected $rules = [
        'report_period_id'  => 'required',
        'office_id'         => 'required',
        'commodity_id'      => 'required',
        'file'              => 'required',
    ];

    public function resetInputFields()
    {
        $this->report_period_id  = '';
        $this->office_id         = '';
        $this->commodity_id      = [];
        $this->file              = null;
    }

    public function store()
    {
        $this->validate();
        // initialize report
        $report = null;
        // if report id is not null, update the entry
        // else create the entry
        if ($this->report_id) {
            $report = Report::find($this->report_id);
            $report->update([
                'office_id'         => $this->office_id,
                'report_period_id'  => $this->report_period_id,
                'user_id'           => Auth::id()
            ]);
        } else {
            $report = Report::create([
                'office_id'         => $this->office_id,
                'report_period_id'  => $this->report_period_id,
                'user_id'           => Auth::id()
            ]);
        }
        // attach the commodities
        $report->commodities()->sync($this->commodity_id);
        // upload the file if it exists
        if ($this->file) {
            $title = time() . '_' . $report->office->name . ' as of ' . $report->report_period->name;

            $upload = Storage::disk('google')->putFileAs(config('folders.progress-reports'), $this->file, $title . '.' . $this->file->extension());

            $uploadEntry = Upload::create([
                'upload_type_id'    => 2,
                'title'             => $title,
                'path'              => $upload,
                'url'               => Storage::disk('google')->url($upload),
                'user_id'           => Auth::id(),
            ]);
            // add to report
            $report->upload_id = $uploadEntry->id;

            $report->save();
        }
        // return flash
        session()->flash('message',
            $this->report_id ? 'Successfully updated report' : 'Successfully added report'
        );
        // reset fields
        return response()->redirectToRoute('reports.index');
    }

    public function render()
    {
        $this->offices = Office::all();
        $this->commodities = $this->office_id ? Commodity::where('office_id', $this->office_id)->get() : Commodity::all();
        $this->report_periods = ReportPeriod::all();

        return view('livewire.report-add-form');
    }
}
