<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualModal extends Component
{
    public $name;
    public $title;
    public $class;

    public function __construct(
        $name,
        $title = '',
        $class = ''
    ) {
        $this->name = $name;
        $this->title = $title;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-modal');
    }
}
