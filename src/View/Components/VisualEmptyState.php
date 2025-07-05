<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualEmptyState extends Component
{
    public $title;
    public $message;
    public $icon;
    public $class;

    public function __construct(
        $title,
        $message = '',
        $icon = '',
        $class = ''
    ) {
        $this->title = $title;
        $this->message = $message;
        $this->icon = $icon;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-empty-state');
    }
}
