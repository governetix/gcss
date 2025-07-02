<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualHeading extends Component
{
    public $level; // Para h1, h2, h3, etc.
    public $content; // El texto del encabezado, si se pasa como prop
    public $classes; // Clases de Tailwind CSS para el encabezado

    /**
     * Create a new component instance.
     *
     * @param int $level El nivel del encabezado (1 para h1, 2 para h2, etc., hasta 6)
     * @param string $content El texto del encabezado, si se prefiere pasar como prop en lugar de slot
     * @return void
     */
    public function __construct($level = 1, $content = null)
    {
        // Aseguramos que el nivel esté entre 1 y 6
        $this->level = max(1, min(6, $level));
        $this->content = $content;

        // Definimos clases base de Tailwind CSS para cada nivel de encabezado
        // Puedes personalizar esto en config/gcss.php si lo deseas, pero por ahora lo definimos aquí.
        $baseClasses = [
            1 => 'text-5xl font-extrabold leading-tight', // H1
            2 => 'text-4xl font-bold leading-tight',      // H2
            3 => 'text-3xl font-semibold leading-snug',   // H3
            4 => 'text-2xl font-medium leading-normal',   // H4
            5 => 'text-xl font-medium leading-relaxed',   // H5
            6 => 'text-lg font-medium leading-relaxed',   // H6
        ];

        // Combinamos las clases base con cualquier clase adicional que se pueda definir en la configuración
        // Por ahora, solo usamos las clases base. Más adelante, podríamos leer de config('gcss.typography.headings.h1')
        $this->classes = $baseClasses[$this->level] . ' text-gray-900 dark:text-white'; // Color de texto por defecto
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

