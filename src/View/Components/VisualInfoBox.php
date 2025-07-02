<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualInfoBox extends Component
{
    public $type;
    public $title;
    public $icon;
    public $iconColor;
    public $padding;
    public $rounded;
    public $shadow;
    public $bgColor;
    public $textColor;
    public $borderColor;

    /**
     * Create a new component instance.
     *
     * @param string $type Tipo de la caja de información ('info', 'success', 'warning', 'danger').
     * @param string $title Título opcional de la caja.
     * @param string $icon Clase del ícono opcional (ej. 'fas fa-lightbulb'). Si no se especifica, usa el ícono por defecto del tipo.
     * @param string $iconColor Color del ícono opcional (ej. 'text-purple-500'). Si no se especifica, usa el color por defecto del tipo.
     * @param string $padding Clases de Tailwind para el padding.
     * @param string $rounded Clases de Tailwind para el radio de borde.
     * @param string $shadow Clases de Tailwind para la sombra.
     * @param string $bgColor Clases de Tailwind para el color de fondo.
     * @param string $textColor Clases de Tailwind para el color del texto.
     * @param string $borderColor Clases de Tailwind para el color del borde.
     * @return void
     */
    public function __construct(
        $type = null,
        $title = null,
        $icon = null,
        $iconColor = null,
        $padding = null,
        $rounded = null,
        $shadow = null,
        $bgColor = null,
        $textColor = null,
        $borderColor = null
    ) {
        $this->type = $type ?? config('gcss.info_boxes.default_type', 'info');
        $this->title = $title;

        // Obtener configuraciones de tipo por defecto
        $typeConfig = config('gcss.info_boxes.types.' . $this->type, []);

        // Asignar propiedades, priorizando las pasadas directamente, luego las del tipo, luego las generales por defecto
        $this->padding = $padding ?? config('gcss.info_boxes.default_padding', 'p-4');
        $this->rounded = $rounded ?? config('gcss.info_boxes.default_rounded', 'rounded-md');
        $this->shadow = $shadow ?? config('gcss.info_boxes.default_shadow', 'shadow-sm');

        $this->bgColor = $bgColor ?? ($typeConfig['bg'] ?? '');
        $this->textColor = $textColor ?? ($typeConfig['text'] ?? '');
        $this->borderColor = $borderColor ?? ($typeConfig['border'] ?? '');

        // Ícono y color del ícono
        $this->icon = $icon ?? ($typeConfig['icon'] ?? '');
        $this->iconColor = $iconColor ?? ($typeConfig['icon_color'] ?? '');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classes = implode(' ', [
            $this->padding,
            $this->rounded,
            $this->shadow,
            $this->bgColor,
            $this->textColor,
            $this->borderColor,
            'flex items-start', // Para alinear ícono y contenido
        ]);

        return view('gcss::components.visual-info-box', ['classes' => $classes]);
    }
}

