<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualFeatureGrid extends Component
{
    public $features;
    public $class;

    public function __construct(
        $features,
        $class = ''
    ) {
        $this->features = $features;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-feature-grid');
    }
}
