<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualTestimonialSlider extends Component
{
    public $testimonials;
    public $class;

    public function __construct(
        $testimonials,
        $class = ''
    ) {
        $this->testimonials = $testimonials;
        $this->class = $class;
    }

    public function render()
    {
        return view('gcss::components.visual-testimonial-slider');
    }
}
