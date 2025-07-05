<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualHeroSection extends Component
{
    public $title;
    public $subtitle;
    public $ctaText;
    public $ctaUrl;
    public $bgImage;
    public $class;

    public function __construct(
        $title,
        $subtitle = '',
        $ctaText = '',
        $ctaUrl = '',
        $bgImage = '',
        $class = ''
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->ctaText = $ctaText;
        $this->ctaUrl = $ctaUrl;
        $this->bgImage = $bgImage;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-hero-section');
    }
}
