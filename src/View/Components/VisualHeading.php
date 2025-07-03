<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualHeading extends Component
{
    public $level;
    public $content;
    public $classes;

    /**
     * Create a new component instance.
     *
     * @param int $level El nivel del encabezado (1 para h1, 2 para h2, etc., hasta 6)
     * @param string $content El texto del encabezado, si se prefiere pasar como prop en lugar de slot
     * @return void
     */
    public function __construct($level = 1, $content = null)
    {
        $this->level = max(1, min(6, $level));
        $this->content = $content;

        // Obtener la configuración de tipografía para este nivel de encabezado
        $typographyConfig = config("gcss.typography.headings.h{$this->level}", []);

        // Combinar las clases de tipografía con cualquier clase adicional que se pueda pasar
        $this->classes = implode(' ', array_filter([
            $typographyConfig['font_size'] ?? '',
            $typographyConfig['font_weight'] ?? '',
            $typographyConfig['line_height'] ?? '',
            $typographyConfig['text_color'] ?? config('gcss.typography.default_text_color', 'text-gray-900'), // Fallback a color de texto global
            config('gcss.typography.default_font_family', 'font-sans'), // Fuente global
        ]));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('gcss::components.visual-heading');
    }
}

