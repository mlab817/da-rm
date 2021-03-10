<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Td extends Component
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
<td class="px-6 py-4 flex-wrap text-sm text-center">
{{ $slot }}
</td>
blade;
    }
}
