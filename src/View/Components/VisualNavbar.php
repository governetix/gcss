<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualNavbar extends Component
{
    public $links;
    public $linkClasses;

    public function __construct($links = [], $linkClasses = 'text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium')
    {
        $this->links = $links;
        $this->linkClasses = $linkClasses;
    }

    public function render()
    {
        $baseClasses = 'relative z-50 w-full bg-white shadow-md';
        // No se usa $this->attributes->get('class') aquí. La vista se encarga de fusionar.
        $classes = trim($baseClasses);

        return view('gcss::components.visual-navbar', ['classes' => $classes]);
    }
}