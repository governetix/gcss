<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualFlexGrid extends Component
{
    public $display; // 'flex' o 'grid'
    public $direction; // flex-row, flex-col, etc.
    public $justify; // justify-start, justify-center, etc.
    public $align; // items-start, items-center, etc.
    public $gap; // gap-x, gap-y, gap
    public $wrap; // flex-wrap, flex-nowrap
    public $cols; // grid-cols-1, grid-cols-2, md:grid-cols-3, etc.
    public $rows; // grid-rows-1, grid-rows-2, etc.
    public $autoFlow; // grid-flow-row, grid-flow-col, etc.

    /**
     * Create a new component instance.
     *
     * @param string $display Define si es 'flex' o 'grid'.
     * @param string $direction Para flex: 'flex-row', 'flex-col', 'flex-row-reverse', 'flex-col-reverse'.
     * @param string $justify Para flex: 'justify-start', 'justify-end', 'justify-center', 'justify-between', 'justify-around', 'justify-evenly'.
     * @param string $align Para flex: 'items-start', 'items-end', 'items-center', 'items-baseline', 'items-stretch'.
     * @param string $gap Clases de Tailwind para el gap (ej. 'gap-4', 'gap-x-2', 'gap-y-6').
     * @param string $wrap Para flex: 'flex-wrap', 'flex-nowrap', 'flex-wrap-reverse'.
     * @param string $cols Para grid: 'grid-cols-1', 'grid-cols-2', 'md:grid-cols-3', etc.
     * @param string $rows Para grid: 'grid-rows-1', 'grid-rows-2', etc.
     * @param string $autoFlow Para grid: 'grid-flow-row', 'grid-flow-col', 'grid-flow-row-dense', 'grid-flow-col-dense'.
     * @return void
     */
    public function __construct(
        $display = null,
        $direction = null,
        $justify = null,
        $align = null,
        $gap = null,
        $wrap = null,
        $cols = null,
        $rows = null,
        $autoFlow = null
    ) {
        $this->display = $display ?? config('gcss.flex_grid.default_display', 'flex');
        $this->gap = $gap ?? config('gcss.flex_grid.default_gap', 'gap-4');

        if ($this->display === 'flex') {
            $this->direction = $direction ?? config('gcss.flex_grid.flex_defaults.direction', 'flex-row');
            $this->justify = $justify ?? config('gcss.flex_grid.flex_defaults.justify', 'justify-start');
            $this->align = $align ?? config('gcss.flex_grid.flex_defaults.align', 'items-start');
            $this->wrap = $wrap ?? config('gcss.flex_grid.flex_defaults.wrap', 'flex-wrap');
        } elseif ($this->display === 'grid') {
            $this->cols = $cols ?? config('gcss.flex_grid.grid_defaults.cols', 'grid-cols-1');
            $this->rows = $rows ?? config('gcss.flex_grid.grid_defaults.rows', '');
            $this->autoFlow = $autoFlow ?? config('gcss.flex_grid.grid_defaults.auto_flow', 'grid-flow-row');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classes = [$this->display, $this->gap];

        if ($this->display === 'flex') {
            $classes[] = $this->direction;
            $classes[] = $this->justify;
            $classes[] = $this->align;
            $classes[] = $this->wrap;
        } elseif ($this->display === 'grid') {
            $classes[] = $this->cols;
            if ($this->rows) {
                $classes[] = $this->rows;
            }
            $classes[] = $this->autoFlow;
        }

        return view('gcss::components.visual-flex-grid', ['classes' => implode(' ', $classes)]);
    }
}

