<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    public $search;

    /**
     * Create a new component instance.
     *
     * @param string $search
     */
    public function __construct(string $search)
    {
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.search');
    }
}
