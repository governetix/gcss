<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualList extends Component
{
    public $type;
    public $class;

    public function __construct($type = 'ul', $class = '')
    {
        $this->type = $type;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-list');
    }
}
