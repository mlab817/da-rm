<?php

namespace App\Http\Livewire;

use App\Models\Commodity;
use App\Models\Office;
use App\Models\Report;
use App\Models\ReportPeriod;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reports extends Component
{
    public  $reports,
            $report_id,
            $office_id,
            $commodity_id,
            $start_date,
            $participants_involved,
            $activities_done,
            $activities_ongoing,
            $overall_status,
            $report_date,
            $report_period_id,
            $user_id,
            $upload_id;

    public $isOpen = false;

    public $offices;

    public $commodities;

    public $report_periods;

    public function render()
    {
        $this->reports = Report::all();
        $this->offices = Office::select('id','name')->get();
        $this->commodities = Commodity::select('id','name')->get();
        $this->report_periods = ReportPeriod::select('id','name')->get();

        return view('livewire.reports.index');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function resetInputFields()
    {
        $this->report_id = '';
        $this->office_id = '';
        $this->start_date = '';
        $this->commodity_id = '';
        $this->participants_involved = '';
        $this->activities_done = '';
        $this->activities_ongoing = '';
        $this->overall_status = '';
        $this->report_date = '';
        $this->report_period_id = '';
//        $this->user_id = '';
//        $this->upload_id = '';
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'office_id'             => 'required',
            'commodity_id'          => 'required',
            'start_date'            => 'required',
            'participants_involved' => 'required',
            'activities_done'       => 'required',
            'activities_ongoing'    => 'required',
            'overall_status'        => 'required',
            'report_date'           => 'required',
            'report_period_id'      => 'required',
        ]);

        Report::updateOrCreate([
            'id' => $this->report_id
        ],[
            'office_id'             => $this->office_id,
            'commodity_id'          => $this->commodity_id,
            'start_date'            => $this->start_date,
            'participants_involved' => $this->participants_involved,
            'activities_done'       => $this->activities_done,
            'activities_ongoing'    => $this->activities_ongoing,
            'overall_status'        => $this->overall_status,
            'report_date'           => $this->report_date,
            'report_period_id'      => $this->report_period_id,
            'user_id'               => Auth::id(),
        ]);

        session()->flash('message',
            $this->report_id ? 'Successfully updated report' : 'Successfully created report'
        );

        $this->closeModal();
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        $this->report_id = $id;
        $this->office_id = $report->office_id;
        $this->start_date = $report->start_date;
        $this->commodity_id = $report->commodity_id;
        $this->participants_involved = $report->participants_involved;
        $this->activities_done = $report->activities_done;
        $this->activities_ongoing = $report->activities_ongoing;
        $this->overall_status = $report->overall_status;
        $this->report_date = $report->report_date;
        $this->report_period_id = $report->report_period_id;

        $this->openModal();
    }

    public function delete($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        session()->flash('message', 'Successfully deleted report');
    }
}
