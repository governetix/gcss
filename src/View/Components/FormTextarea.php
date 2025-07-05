<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class FormTextarea extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public $rows;
    public $class;

    public function __construct(
        $name,
        $label = '',
        $placeholder = '',
        $value = '',
        $rows = 3,
        $class = ''
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->rows = $rows;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.form-textarea');
    }
}
