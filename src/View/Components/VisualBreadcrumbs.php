<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualBreadcrumbs extends Component
{
    public $items;
    public $class;

    public function __construct($items, $class = '')
    {
        $this->items = $items;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-breadcrumbs');
    }
}
