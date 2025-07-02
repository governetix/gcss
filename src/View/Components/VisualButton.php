<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;

class VisualButton extends Component
{
    public $type;
    public $size;
    public $rounded;
    public $icon;
    public $text;

    /**
     * Create a new component instance.
     *
     * @param string $type El tipo de botón (primary, secondary, danger, outline-primary, etc.)
     * @param string $size El tamaño del botón (sm, md, lg)
     * @param string $rounded El radio de borde del botón (rounded-none, rounded-sm, rounded-md, rounded-lg, rounded-full)
     * @param string $icon Nombre de la clase del ícono (ej. 'fa fa-plus' o 'lucide-icon-name')
     * @param string $text Texto del botón, si se prefiere pasar como prop en lugar de slot
     * @return void
     */
    public function __construct($type = null, $size = null, $rounded = null, $icon = null, $text = null)
    {
        // Obtener valores por defecto de la configuración
        $defaultType = config('gcss.buttons.default_type', 'primary');
        $defaultSize = config('gcss.buttons.default_size', 'md');
        $defaultRounded = config('gcss.buttons.default_rounded', 'rounded-md');

        // Asignar propiedades, usando el valor pasado o el por defecto de la configuración
        $this->type = $type ?? $defaultType;
        $this->size = $size ?? $defaultSize;
        $this->rounded = $rounded ?? $defaultRounded;
        $this->icon = $icon;
        // Si no se pasa texto como prop, se usará el slot.
        // Si no hay slot ni texto, se usará la traducción por defecto.
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Obtener las clases de Tailwind CSS basadas en el tipo y tamaño definidos en la configuración
        $typeClasses = config('gcss.buttons.types.' . $this->type, []);
        $sizeClasses = config('gcss.buttons.sizes.' . $this->size, '');

        // Construir la cadena de clases
        $classes = implode(' ', [
            $typeClasses['bg'] ?? '',
            $typeClasses['text'] ?? '',
            $typeClasses['border'] ?? '',
            $typeClasses['shadow'] ?? '',
            $sizeClasses,
            $this->rounded, // Añadir la clase de redondeado
            'font-bold', // Clases base que siempre se aplican
            'inline-flex items-center justify-center', // Para centrar contenido y íconos
            'transition ease-in-out duration-150', // Para transiciones suaves
            'focus:outline-none focus:ring-2 focus:ring-opacity-75', // Estilos de foco
            'disabled:opacity-75 disabled:cursor-not-allowed', // Estilos para estado deshabilitado
        ]);

        // Pasar las clases a la vista
        return view('gcss::components.visual-button', ['classes' => $classes]);
    }
}

