<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualSection extends Component
{
    public $padding;
    public $bgColor;
    public $textColor;
    public $shadow;
    public $rounded;
    public $fullWidth;

    /**
     * Create a new component instance.
     *
     * @param string $padding Clases de Tailwind para el padding (ej. 'py-8 px-4')
     * @param string $bgColor Clases de Tailwind para el color de fondo (ej. 'bg-gray-100', 'bg-white')
     * @param string $textColor Clases de Tailwind para el color del texto (ej. 'text-gray-900')
     * @param string $shadow Clases de Tailwind para la sombra (ej. 'shadow-md', 'shadow-none')
     * @param string $rounded Clases de Tailwind para el radio de borde (ej. 'rounded-lg', 'rounded-none')
     * @param bool $fullWidth Si la sección debe ser de ancho completo (sin max-w-7xl)
     * @return void
     */
    public function __construct(
        $padding = null,
        $bgColor = null,
        $textColor = null,
        $shadow = null,
        $rounded = null,
        $fullWidth = null
    ) {
        $this->padding = $padding ?? config('gcss.sections.default_padding', 'py-12 px-4 sm:px-6 lg:px-8');
        $this->bgColor = $bgColor ?? config('gcss.sections.default_bg_color', 'bg-white');
        $this->textColor = $textColor ?? config('gcss.typography.default_text_color', 'text-gray-900');
        $this->shadow = $shadow ?? config('gcss.sections.default_shadow', '');
        $this->rounded = $rounded ?? config('gcss.sections.default_rounded', '');
        $this->fullWidth = $fullWidth ?? config('gcss.sections.default_full_width', false);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $baseClasses = [
            $this->padding,
            $this->bgColor,
            $this->textColor,
            $this->shadow,
            $this->rounded,
        ];

        if (!$this->fullWidth) {
            $baseClasses[] = 'max-w-7xl mx-auto';
        }

        $classes = implode(' ', $baseClasses);

        return view('gcss::components.visual-section', ['classes' => $classes]);
    }
}

