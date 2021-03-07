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

    public  $report_id,
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

        $reports = $this->search ? Report::search($this->search)->paginate(10) : Report::paginate(10);

        return view('livewire.reports.index',[
            'reports' => $reports,
        ]);
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
        $this->file = '';
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
            'file'                  => 'required'
        ]);

        $uploadedFile = $this->upload($this->file);

        if ($uploadedFile) {
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
                'upload_id'             => $uploadedFile->id,
            ]);
        }

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
        $this->file = '';

        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->confirmDeleteDialog = true;
        $this->report_id = $id;
    }

    public function delete()
    {
        $report = Report::findOrFail($this->report_id);
        $report->delete();

        $this->confirmDeleteDialog = false;

        session()->flash('message', 'Successfully deleted report');
    }

    public function upload($file)
    {
        $uploadedFile = $file->storePublicly('roadmaps');

        if ($uploadedFile) {
            return Upload::create([
                'upload_type_id' => 2,
                'title' => 'Roadmap',
                'url' => $uploadedFile,
                'user_id' => Auth::id(),
            ]);
        } else {
            return null;
        }
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
