<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualNotification extends Component
{
    public $type;
    public $message;
    public $class;

    public function __construct(
        $type = 'info',
        $message = '',
        $class = ''
    ) {
        $this->type = $type;
        $this->message = $message;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-notification');
    }
}
