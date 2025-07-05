<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualInfoBox extends Component
{
    public $type;
    public $icon;
    public $title;
    public $iconColor;

    public function __construct(
        $type = 'info',
        $icon = null,
        $title = null,
        $iconColor = ''
    ) {
        $this->type = $type;
        $this->icon = $icon;
        $this->title = $title;
        $this->iconColor = $iconColor;
    }

    public function render()
    {
        $baseClasses = 'flex items-start p-4 rounded-lg';
        $typeClasses = [
            'info' => 'bg-blue-100 text-blue-800',
            'success' => 'bg-green-100 text-green-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            'danger' => 'bg-red-100 text-red-800',
        ];

        $classes = $baseClasses . ' ' . ($typeClasses[$this->type] ?? $typeClasses['info']);

        return view('gcss::components.visual-info-box', compact('classes'));
    }
}