<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Content extends Component
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
<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
</div>
blade;
    }
}
