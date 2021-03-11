<?php

namespace App\Http\Livewire;

use App\Models\OutlineItem;
use App\Models\RoadmapVersion;
use Livewire\Component;

class ComplianceReviewForm extends Component
{
    public $roadmap_version;

    public $outline_items;

    public function mount(RoadmapVersion $roadmapVersion)
    {
        $this->roadmap_version = $roadmapVersion;
    }

    public function store()
    {

    }

    public function render()
    {
        $this->outline_items = OutlineItem::all();

        return view('livewire.compliance-review-form');
    }
}
