<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualParagraph extends Component
{
    public $class;

    public function __construct($class = '')
    {
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-paragraph');
    }
}
