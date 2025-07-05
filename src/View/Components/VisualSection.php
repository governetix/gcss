<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualSection extends Component
{
    public $bgColor;
    public $textColor;
    public $padding;
    public $shadow;
    public $rounded;

    public function __construct(
        $bgColor = 'bg-transparent',
        $textColor = 'text-gray-800',
        $padding = 'py-12',
        $shadow = 'shadow-none',
        $rounded = 'rounded-none'
    ) {
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
        $this->padding = $padding;
        $this->shadow = $shadow;
        $this->rounded = $rounded;
    }

    public function render()
    {
        $baseClasses = 'relative';
        $dynamicClasses = [
            $this->bgColor,
            $this->textColor,
            $this->padding,
            $this->shadow,
            $this->rounded,
        ];

        // No se usa $this->attributes->get('class') aquí. La vista se encarga de fusionar.
        $classes = trim(implode(' ', array_filter(array_merge([$baseClasses], $dynamicClasses))));

        return view('gcss::components.visual-section', ['classes' => $classes]);
    }
}