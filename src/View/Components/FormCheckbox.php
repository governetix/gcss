<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class FormCheckbox extends Component
{
    public $name;
    public $label;
    public $value;
    public $checked;
    public $class;

    public function __construct(
        $name,
        $label = '',
        $value = 1,
        $checked = false,
        $class = ''
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->checked = $checked;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.form-checkbox');
    }
}
