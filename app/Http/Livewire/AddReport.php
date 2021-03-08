<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddReport extends Component
{
    public $report;

    public function mount($report)
    {
        $this->report = null;

        if ($report)
        {
            $this->report = $report;
        }
    }

    public function render()
    {
        return view('livewire.add-report');
    }
}
