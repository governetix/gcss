<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualTooltip extends Component
{
    public $text;
    public $class;

    public function __construct(
        $text,
        $class = ''
    ) {
        $this->text = $text;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-tooltip');
    }
}
