<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class FormSelect extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $class;

    public function __construct(
        $name,
        $label = '',
        $options = [],
        $selected = '',
        $class = ''
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.form-select');
    }
}
