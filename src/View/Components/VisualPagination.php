<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualPagination extends Component
{
    public $currentPage;
    public $lastPage;
    public $alignment;
    public $class;

    public function __construct($currentPage, $lastPage, $alignment = 'justify-center', $class = '')
    {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->alignment = $alignment;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-pagination', [
            'currentPage' => $this->currentPage,
            'lastPage' => $this->lastPage,
            'alignment' => $this->alignment,
            'class' => $this->class,
        ]);
    }
}