<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualFlexGrid extends Component
{
    public $display;
    public $direction;
    public $justify;
    public $align;
    public $cols;
    public $gap;

    public function __construct(
        $display = 'flex',
        $direction = 'flex-row',
        $justify = 'justify-start',
        $align = 'items-start',
        $cols = null,
        $gap = 'gap-4'
    ) {
        $this->display = $display;
        $this->direction = $direction;
        $this->justify = $justify;
        $this->align = $align;
        $this->cols = $cols;
        $this->gap = $gap;
    }

    public function render()
    {
        $classes = implode(' ', array_filter([
            $this->display,
            $this->direction,
            $this->justify,
            $this->align,
            $this->cols,
            $this->gap,
        ]));

        return view('gcss::components.visual-flex-grid', compact('classes'));
    }
}