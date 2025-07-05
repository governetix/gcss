<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualKpi extends Component
{
    public $title;
    public $value;
    public $icon;
    public $class;

    public function __construct(
        $title,
        $value,
        $icon = '',
        $class = ''
    ) {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-kpi');
    }
}
