<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Th extends Component
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
<th scope="col" {{ $attributes->merge(['class' => 'px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider']) }}>
{{ $slot }}
</th>
blade;
    }
}
