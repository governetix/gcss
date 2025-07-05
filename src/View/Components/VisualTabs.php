<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualTabs extends Component
{
    public $tabs;
    public $activeTab;
    public $class;
    public $tabBorderColor;
    public $alignment;
    public $tabItemClasses;
    public $activeTabTextColor;
    public $activeTabBorderColor;
    public $tabTextColor;
    public $tabHoverTextColor;
    public $panelClasses;

    public function __construct(
        $tabs,
        $activeTab,
        $class = '',
        $tabBorderColor = 'border-gray-200',
        $alignment = 'justify-start',
        $tabItemClasses = 'py-2 px-4 font-medium text-sm focus:outline-none',
        $activeTabTextColor = 'text-blue-600',
        $activeTabBorderColor = 'border-blue-600',
        $tabTextColor = 'text-gray-500',
        $tabHoverTextColor = 'hover:text-gray-700',
        $panelClasses = 'p-4'
    ) {
        $this->tabs = $tabs;
        $this->activeTab = $activeTab;
        $this->class = $class;
        $this->tabBorderColor = $tabBorderColor;
        $this->alignment = $alignment;
        $this->tabItemClasses = $tabItemClasses;
        $this->activeTabTextColor = $activeTabTextColor;
        $this->activeTabBorderColor = $activeTabBorderColor;
        $this->tabTextColor = $tabTextColor;
        $this->tabHoverTextColor = $tabHoverTextColor;
        $this->panelClasses = $panelClasses;
    }

    public function render()
    {
        return view('gcss::components.visual-tabs');
    }
}