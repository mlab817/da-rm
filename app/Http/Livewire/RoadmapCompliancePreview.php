<?php

namespace App\Http\Livewire;

use App\Models\ComplianceReview;
use App\Models\Roadmap;
use Livewire\Component;

class RoadmapCompliancePreview extends Component
{
    public $roadmap_id;

    public $roadmap;

    public function mount($roadmap_id)
    {
        $this->roadmap_id = $roadmap_id;
        $this->roadmap = Roadmap::find($this->roadmap_id);
    }

    public function render()
    {
        return view('livewire.roadmap-compliance-preview',[
            'compliance_reviews' => $this->roadmap->compliance_reviews,
        ]);
    }
}
