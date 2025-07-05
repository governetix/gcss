<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualMapSection extends Component
{
    public $address;
    public $class;

    public function __construct(
        $address,
        $class = ''
    ) {
        $this->address = $address;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-map-section');
    }
}
