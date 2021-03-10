<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $slot }}</h2>
blade;
    }
}
