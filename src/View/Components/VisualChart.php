<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualChart extends Component
{
    public $type;
    public $data;
    public $options;
    public $class;

    public function __construct(
        $type,
        $data,
        $options = [],
        $class = ''
    ) {
        $this->type = $type;
        $this->data = $data;
        $this->options = $options;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-chart');
    }
}
