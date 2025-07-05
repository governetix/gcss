<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualDivider extends Component
{
    public $height;
    public $color;
    public $lineStyle;
    public $margin;
    public $text;
    public $icon;
    public $iconColor;
    public $iconSize;
    public $box;
    public $boxClasses;
    public $boxText;

    public function __construct(
        $height = 'h-px',
        $color = 'bg-gray-200',
        $lineStyle = 'border-solid',
        $margin = 'my-8',
        $text = null,
        $icon = null,
        $iconColor = 'text-gray-500',
        $iconSize = 'text-base',
        $box = false,
        $boxBg = 'bg-white',
        $boxText = 'text-gray-700',
        $boxBorder = 'border-none',
        $boxRounded = 'rounded-md'
    ) {
        $this->height = $height;
        $this->color = $color;
        $this->lineStyle = $lineStyle;
        $this->margin = $margin;
        $this->text = $text;
        $this->icon = $icon;
        $this->iconColor = $iconColor;
        $this->iconSize = $iconSize;
        $this->box = $box;
        $this->boxText = $boxText;

        $this->boxClasses = implode(' ', array_filter([
            $boxBg,
            $boxText,
            $boxBorder,
            $boxRounded,
            'px-4 py-1',
            'flex items-center',
        ]));
    }

    public function render()
    {
        return view('gcss::components.visual-divider');
    }
}