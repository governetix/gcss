<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $value;
    public $class;

    public function __construct(
        $name,
        $label = '',
        $type = 'text',
        $placeholder = '',
        $value = '',
        $class = ''
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.form-input');
    }
}
