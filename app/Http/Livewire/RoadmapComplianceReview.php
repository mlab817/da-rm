<?php

namespace App\Http\Livewire;

use App\Models\ComplianceReview;
use App\Models\OutlineItem;
use App\Models\RoadmapVersion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RoadmapComplianceReview extends Component
{
    public $roadmap_version;

    public $roadmap;

    public $compliance_reviews;

    public $outline_item_id;

    public $findings;

    public $recommendations;

    public $remarks;

    public $addComplianceDialog = false;

    public function showAddCompliance()
    {
        $this->addComplianceDialog = true;
    }

    public function hideAddCompliance()
    {
        $this->addComplianceDialog = false;
    }

    protected $rules = [
        'outline_item_id' => 'required',
        'findings' => 'required',
        'recommendations' => 'required',
        'remarks' => 'required',
    ];

    public function resetInputFields()
    {
        $this->outline_item_id = '';
        $this->findings = '';
        $this->recommendations = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate();

        $compliance_review = new ComplianceReview;
        $compliance_review->roadmap_version_id = $this->roadmap_version->id;
        $compliance_review->outline_item_id = $this->outline_item_id;
        $compliance_review->findings = $this->findings;
        $compliance_review->recommendations = $this->recommendations;
        $compliance_review->remarks = $this->remarks;
        $compliance_review->user_id = Auth::id();
        $compliance_review->save();

        $this->resetInputFields();
        $this->hideAddCompliance();
    }

    public function mount(RoadmapVersion $roadmap_version)
    {
        $this->roadmap_version = $roadmap_version;
        $this->compliance_reviews = $roadmap_version->compliance_reviews;
    }

    public function render()
    {
        return view('livewire.roadmap-compliance-review',[
            'roadmap_version' => $this->roadmap_version,
            'outline_items' => OutlineItem::select('id','item_number','title')->get()
        ]);
    }
}
