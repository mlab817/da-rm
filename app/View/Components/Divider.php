<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Divider extends Component
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
<div class="hidden sm:block">
    <div class="py-8">
        <div class="border-t border-gray-200"></div>
    </div>
</div>
blade;
    }
}
