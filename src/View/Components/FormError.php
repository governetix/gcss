<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class FormError extends Component
{
    public $name;
    public $class;

    public function __construct(
        $name,
        $class = ''
    ) {
        $this->name = $name;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.form-error');
    }
}
