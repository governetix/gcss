<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualPagination extends Component
{
    public $paginator;
    public $class;

    public function __construct($paginator, $class = '')
    {
        $this->paginator = $paginator;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-pagination');
    }
}