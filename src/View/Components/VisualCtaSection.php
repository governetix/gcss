<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualCtaSection extends Component
{
    public $title;
    public $subtitle;
    public $ctaText;
    public $ctaUrl;
    public $class;

    public function __construct(
        $title,
        $subtitle = '',
        $ctaText = '',
        $ctaUrl = '',
        $class = ''
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->ctaText = $ctaText;
        $this->ctaUrl = $ctaUrl;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-cta-section');
    }
}
