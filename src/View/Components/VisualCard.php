<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualCard extends Component
{
    public $padding;
    public $shadow;
    public $rounded;
    public $bgColor;
    public $border;
    public $textColor;
    public $icon;
    public $iconPosition;
    public $bgImage;
    public $bgImageClasses;
    public $iconCircle; // Nuevo: si el ícono debe estar dentro de un círculo
    public $iconCirclePosition; // Nuevo: posición del círculo del ícono (ej. 'top-right-outside')

    /**
     * Create a new component instance.
     *
     * @param string $padding Clases de Tailwind para el padding (ej. 'p-4', 'px-6 py-4')
     * @param string $shadow Clases de Tailwind para la sombra (ej. 'shadow-md', 'shadow-lg', 'shadow-none')
     * @param string $rounded Clases de Tailwind para el radio de borde (ej. 'rounded', 'rounded-lg', 'rounded-full')
     * @param string $bgColor Clases de Tailwind para el color de fondo (ej. 'bg-white', 'bg-gray-100')
     * @param string $border Clases de Tailwind para el borde (ej. 'border', 'border-gray-300', 'border-2 border-blue-500')
     * @param string $textColor Clases de Tailwind para el color del texto dentro de la tarjeta (ej. 'text-gray-900')
     * @param string $icon Nombre de la clase del ícono (ej. 'fas fa-star')
     * @param string $iconPosition Posición del ícono ('left', 'right', 'top-center', 'bottom-right', 'overlay-top-right')
     * @param string $bgImage URL de la imagen de fondo de la tarjeta
     * @param string $bgImageClasses Clases de Tailwind para la imagen de fondo (ej. 'bg-cover bg-center')
     * @param bool $iconCircle Si el ícono debe estar dentro de un círculo
     * @param string $iconCirclePosition Posición del círculo del ícono ('top-right-outside', 'bottom-left-outside', etc.)
     * @return void
     */
    public function __construct(
        $padding = null,
        $shadow = null,
        $rounded = null,
        $bgColor = null,
        $border = null,
        $textColor = null,
        $icon = null,
        $iconPosition = null,
        $bgImage = null,
        $bgImageClasses = 'bg-cover bg-center',
        $iconCircle = false, // Por defecto, el ícono no está en un círculo
        $iconCirclePosition = null
    ) {
        // Obtener valores por defecto de la configuración
        $this->padding = $padding ?? config('gcss.cards.default_padding', 'p-6');
        $this->shadow = $shadow ?? config('gcss.cards.default_shadow', 'shadow-md');
        $this->rounded = $rounded ?? config('gcss.cards.default_rounded', 'rounded-lg');
        $this->bgColor = $bgColor ?? config('gcss.cards.default_bg_color', 'bg-white');
        $this->border = $border ?? config('gcss.cards.default_border', '');
        $this->textColor = $textColor ?? config('gcss.cards.default_text_color', 'text-gray-900');

        $this->icon = $icon;
        $this->iconPosition = $iconPosition ?? ($icon ? 'left' : ''); // Por defecto 'left' si hay ícono y no hay posición específica
        $this->bgImage = $bgImage;
        $this->bgImageClasses = $bgImageClasses;
        $this->iconCircle = $iconCircle;
        $this->iconCirclePosition = $iconCirclePosition;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Clases base para la tarjeta
        $baseClasses = [
            $this->padding,
            $this->shadow,
            $this->rounded,
            $this->border,
            $this->textColor,
        ];

        // Añadir clases de fondo si no hay imagen de fondo, o si la imagen no cubre todo
        if (!$this->bgImage) {
            $baseClasses[] = $this->bgColor;
        } else {
            $baseClasses[] = 'relative overflow-hidden';
            $baseClasses[] = 'min-h-[150px]';
        }

        // Unir todas las clases
        $classes = implode(' ', $baseClasses);

        // Estilos en línea para la imagen de fondo
        $inlineStyle = $this->bgImage ? "background-image: url('{$this->bgImage}');" : '';

        // Clases para el círculo del ícono si iconCircle es true
        $iconCircleClasses = '';
        if ($this->iconCircle) {
            $iconCircleDefaults = config('gcss.cards.icon_circle_defaults', []);
            $iconCircleClasses = implode(' ', [
                $iconCircleDefaults['bg'] ?? 'bg-blue-600',
                $iconCircleDefaults['text'] ?? 'text-white',
                $iconCircleDefaults['size'] ?? 'p-3 text-xl',
                $iconCircleDefaults['rounded'] ?? 'rounded-full',
                $iconCircleDefaults['shadow'] ?? 'shadow-md',
                $iconCircleDefaults['border'] ?? '',
                'flex items-center justify-center', // Para centrar el ícono dentro del círculo
            ]);

            // Añadir clases de posición si se especifica iconCirclePosition
            if ($this->iconCirclePosition) {
                $positionClasses = config('gcss.cards.icon_circle_positions.' . $this->iconCirclePosition, '');
                $iconCircleClasses .= ' ' . $positionClasses;
            }
        }


        return view('gcss::components.visual-card', [
            'classes' => $classes,
            'inlineStyle' => $inlineStyle,
            'iconCircleClasses' => $iconCircleClasses, // Pasar las clases del círculo del ícono a la vista
        ]);
    }
}

