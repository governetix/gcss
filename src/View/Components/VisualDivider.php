<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualDivider extends Component
{
    public $height;
    public $color;
    public $margin;
    public $fullWidth;
    public $text;
    public $icon;
    public $iconColor;
    public $iconSize;
    public $box;
    public $boxBg;
    public $boxText;
    public $boxPadding;
    public $boxRounded;
    public $boxBorder;
    public $boxShadow;
    public $lineStyle;

    /**
     * Create a new component instance.
     *
     * @param string $height Clases de Tailwind para la altura (ej. 'h-px', 'h-1', 'h-2')
     * @param string $color Clases de Tailwind para el color de fondo (ej. 'bg-gray-300', 'bg-blue-500')
     * @param string $margin Clases de Tailwind para el margen vertical (ej. 'my-4', 'my-12')
     * @param bool $fullWidth Si el divisor debe ocupar el 100% del ancho (sin max-width)
     * @param string $text Texto opcional para mostrar en el centro del divisor
     * @param string $icon Clase del ícono (ej. 'fas fa-star')
     * @param string $iconColor Color del ícono (ej. 'text-blue-500')
     * @param string $iconSize Tamaño del ícono (ej. 'text-xl')
     * @param bool $box Si el contenido central (texto o ícono) debe estar dentro de una caja
     * @param string $boxBg Color de fondo de la caja (ej. 'bg-white')
     * @param string $boxText Color de texto/ícono de la caja (ej. 'text-gray-700')
     * @param string $boxPadding Padding de la caja (ej. 'px-4 py-2')
     * @param string $boxRounded Redondeo de la caja (ej. 'rounded-full')
     * @param string $boxBorder Borde de la caja (ej. 'border border-gray-300')
     * @param string $boxShadow Sombra de la caja (ej. 'shadow-md')
     * @param string $lineStyle Estilo de la línea ('solid', 'dotted', 'dashed', 'double')
     * @return void
     */
    public function __construct(
        $height = null,
        $color = null,
        $margin = null,
        $fullWidth = null,
        $text = null,
        $icon = null,
        $iconColor = null,
        $iconSize = null,
        $box = false,
        $boxBg = null,
        $boxText = null,
        $boxPadding = null,
        $boxRounded = null,
        $boxBorder = null,
        $boxShadow = null,
        $lineStyle = null
    ) {
        $this->height = $height ?? config('gcss.dividers.default_height', 'h-px');
        $this->color = $color ?? config('gcss.dividers.default_color', 'bg-gray-200');
        $this->margin = $margin ?? config('gcss.dividers.default_margin', 'my-8');
        $this->fullWidth = $fullWidth ?? config('gcss.dividers.default_full_width', true);
        $this->text = $text;
        $this->icon = $icon;

        $this->iconColor = $iconColor ?? config('gcss.dividers.icon_box_defaults.icon_color', config('gcss.typography.default_text_color', 'text-gray-500'));
        $this->iconSize = $iconSize ?? config('gcss.dividers.icon_box_defaults.icon_size', 'text-lg');

        $this->box = $box;
        $this->boxBg = $boxBg ?? config('gcss.dividers.icon_box_defaults.bg', 'bg-white');
        $this->boxText = $boxText ?? config('gcss.dividers.icon_box_defaults.text', config('gcss.typography.default_text_color', 'text-gray-500'));
        $this->boxPadding = $boxPadding ?? config('gcss.dividers.icon_box_defaults.padding', 'px-3 py-1');
        $this->boxRounded = $boxRounded ?? config('gcss.dividers.icon_box_defaults.rounded', 'rounded-md');
        $this->boxBorder = $boxBorder ?? config('gcss.dividers.icon_box_defaults.border', 'border border-gray-300');
        $this->boxShadow = $boxShadow ?? config('gcss.dividers.icon_box_defaults.shadow', 'shadow-sm');

        $this->lineStyle = $lineStyle ?? config('gcss.dividers.default_line_style', 'border-solid');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classes = [
            $this->height,
            $this->color,
            $this->margin,
            'w-full',
        ];

        $classes = implode(' ', $classes);

        $boxClasses = '';
        if ($this->box || $this->text || $this->icon) {
            $boxClasses = implode(' ', [
                $this->boxBg,
                $this->boxText,
                $this->boxPadding,
                $this->boxRounded,
                $this->boxBorder,
                $this->boxShadow,
                'flex items-center justify-center',
                'whitespace-nowrap',
            ]);
        }

        return view('gcss::components.visual-divider', [
            'classes' => $classes,
            'boxClasses' => $boxClasses,
        ]);
    }
}

