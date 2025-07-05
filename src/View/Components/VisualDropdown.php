<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualDropdown extends Component
{
    public $triggerText;
    public $triggerIcon;
    public $triggerType;
    public $containerClasses;
    public $menuClasses;

    public function __construct(
        $triggerText = 'Options',
        $triggerIcon = null,
        $triggerType = 'button',
        $containerClasses = 'relative inline-block text-left',
        $menuClasses = 'origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10'
    ) {
        $this->triggerText = $triggerText;
        $this->triggerIcon = $triggerIcon;
        $this->triggerType = $triggerType;
        $this->containerClasses = $containerClasses;
        $this->menuClasses = $menuClasses;
    }

    public function render()
    {
        return view('gcss::components.visual-dropdown');
    }
}