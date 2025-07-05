<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

/**
 * Displays a versatile and themeable button.
 */
class VisualButton extends Component
{
    public string $type;
    public string $size;
    public string $rounded;
    public ?string $icon;
    public ?string $text;
    public ?string $bgColor;
    public ?string $textColor;
    public ?string $borderWidth;
    public ?string $borderStyle;
    public ?string $borderColor;
    public ?string $shadow;
    public ?string $hoverBgColor;
    public ?string $hoverTextColor;
    public ?string $hoverBorderColor;

    /**
     * A list of predefined options for component properties.
     * Used by the admin dashboard to generate select dropdowns.
     */
    public static array $options = [
        'type' => ['primary', 'secondary', 'danger', 'success', 'warning', 'info', 'light', 'dark', 'outline-primary'],
        'size' => ['sm', 'md', 'lg'],
        'rounded' => ['none', 'sm', 'md', 'lg', 'full'],
        // Colores base de Tailwind para selectores (se expandirán en el frontend si es necesario)
        'bg_color' => [
            'bg-transparent', 'bg-white', 'bg-black',
            'bg-gray-500', 'bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-yellow-500',
            'bg-indigo-500', 'bg-purple-500', 'bg-pink-500', 'bg-fuchsia-500',
            'bg-emerald-500', 'bg-teal-500', 'bg-cyan-500', 'bg-lime-500', 'bg-orange-500',
            'bg-amber-500', 'bg-violet-500', 'bg-rose-500', 'bg-sky-500', 'bg-stone-500',
            'bg-zinc-500', 'bg-neutral-500', 'bg-slate-500'
        ],
        'text_color' => [
            'text-white', 'text-black',
            'text-gray-500', 'text-red-500', 'text-blue-500', 'text-green-500', 'text-yellow-500',
            'text-indigo-500', 'text-purple-500', 'text-pink-500', 'text-fuchsia-500',
            'text-emerald-500', 'text-teal-500', 'text-cyan-500', 'text-lime-500', 'text-orange-500',
            'text-amber-500', 'text-violet-500', 'text-rose-500', 'text-sky-500', 'text-stone-500',
            'text-zinc-500', 'text-neutral-500', 'text-slate-500'
        ],
        'border_width' => ['border-0', 'border', 'border-2', 'border-4'],
        'border_style' => ['border-solid', 'border-dashed', 'border-dotted'],
        'border_color' => [
            'border-transparent', 'border-white', 'border-black',
            'border-gray-500', 'border-red-500', 'border-blue-500', 'border-green-500', 'border-yellow-500',
            'border-indigo-500', 'border-purple-500', 'border-pink-500', 'border-fuchsia-500',
            'border-emerald-500', 'border-teal-500', 'border-cyan-500', 'border-lime-500', 'border-orange-500',
            'border-amber-500', 'border-violet-500', 'border-rose-500', 'border-sky-500', 'border-stone-500',
            'border-zinc-500', 'border-neutral-500', 'border-slate-500'
        ],
        'shadow' => ['shadow-none', 'shadow-sm', 'shadow-md', 'shadow-lg', 'shadow-xl', 'shadow-2xl', 'shadow-inner'],
        'hover_bg_color' => [
            'hover:bg-transparent', 'hover:bg-white', 'hover:bg-black',
            'hover:bg-gray-600', 'hover:bg-red-600', 'hover:bg-blue-600', 'hover:bg-green-600', 'hover:bg-yellow-600',
            'hover:bg-indigo-600', 'hover:bg-purple-600', 'hover:bg-pink-600', 'hover:bg-fuchsia-600',
            'hover:bg-emerald-600', 'hover:bg-teal-600', 'hover:bg-cyan-600', 'hover:bg-lime-600', 'hover:bg-orange-600',
            'hover:bg-amber-600', 'hover:bg-violet-600', 'hover:bg-rose-600', 'hover:bg-sky-600', 'hover:bg-stone-600',
            'hover:bg-zinc-600', 'hover:bg-neutral-600', 'hover:bg-slate-600'
        ],
        'hover_text_color' => [
            'hover:text-white', 'hover:text-black',
            'hover:text-gray-600', 'hover:text-red-600', 'hover:text-blue-600', 'hover:text-green-600', 'hover:text-yellow-600',
            'hover:text-indigo-600', 'hover:text-purple-600', 'hover:text-pink-600', 'hover:text-fuchsia-600',
            'hover:text-emerald-600', 'hover:text-teal-600', 'hover:text-cyan-600', 'hover:text-lime-600', 'hover:text-orange-600',
            'hover:text-amber-600', 'hover:text-violet-600', 'hover:text-rose-600', 'hover:text-sky-600', 'hover:text-stone-600',
            'hover:text-zinc-600', 'hover:text-neutral-600', 'hover:text-slate-600'
        ],
        'hover_border_color' => [
            'hover:border-transparent', 'hover:border-white', 'hover:border-black',
            'hover:border-gray-600', 'hover:border-red-600', 'hover:border-blue-600', 'hover:border-green-600', 'hover:border-yellow-600',
            'hover:border-indigo-600', 'hover:border-purple-600', 'hover:border-pink-600', 'hover:border-fuchsia-600',
            'hover:border-emerald-600', 'hover:border-teal-600', 'hover:border-cyan-600', 'hover:border-lime-600', 'hover:border-orange-600',
            'hover:border-amber-600', 'hover:border-violet-600', 'hover:border-rose-600', 'hover:border-sky-600', 'hover:border-stone-600',
            'hover:border-zinc-600', 'hover:border-neutral-600', 'hover:border-slate-600'
        ],
    ];

    /**
     * Create a new component instance.
     *
     * @param ?string $type The style of the button (e.g., 'primary', 'secondary'). Determines the color scheme.
     * @param ?string $size The size of the button ('sm', 'md', or 'lg').
     * @param ?string $rounded The border radius of the button (e.g., 'md', 'full').
     * @param ?string $icon The name of a Lucide icon or a FontAwesome class to display inside the button.
     * @param ?string $text The text to display in the button. Can also be provided via the component's slot.
     * @param ?string $bgColor Tailwind class for background color (e.g., 'bg-blue-500').
     * @param ?string $textColor Tailwind class for text color (e.g., 'text-white').
     * @param ?string $borderWidth Tailwind class for border width (e.g., 'border-2').
     * @param ?string $borderStyle Tailwind class for border style (e.g., 'border-solid').
     * @param ?string $borderColor Tailwind class for border color (e.g., 'border-blue-500').
     * @param ?string $shadow Tailwind class for box shadow (e.g., 'shadow-md').
     * @param ?string $hoverBgColor Tailwind class for hover background color (e.g., 'hover:bg-blue-600').
     * @param ?string $hoverTextColor Tailwind class for hover text color (e.g., 'hover:text-gray-100').
     * @param ?string $hoverBorderColor Tailwind class for hover border color (e.g., 'hover:border-blue-600').
     */
    public function __construct(
        ?string $type = null,
        ?string $size = null,
        ?string $rounded = null,
        ?string $icon = null,
        ?string $text = null,
        ?string $bgColor = null,
        ?string $textColor = null,
        ?string $borderWidth = null,
        ?string $borderStyle = null,
        ?string $borderColor = null,
        ?string $shadow = null,
        ?string $hoverBgColor = null,
        ?string $hoverTextColor = null,
        ?string $hoverBorderColor = null
    ) {
        // Asignar propiedades, priorizando las pasadas directamente, luego las de la configuración de 'components',
        // y finalmente las de 'buttons.default_...'
        $this->type = $type ?? config('gcss.components.gcss-visual-button.type', config('gcss.buttons.default_type', 'primary'));
        $this->size = $size ?? config('gcss.components.gcss-visual-button.size', config('gcss.buttons.default_size', 'md'));
        $this->rounded = $rounded ?? config('gcss.components.gcss-visual-button.rounded', config('gcss.buttons.default_rounded', 'rounded-md'));
        $this->icon = $icon;
        $this->text = $text;

        // Nuevas propiedades configurables
        // Si la propiedad directa es null, intenta de 'components', luego de 'buttons.default_'
        $this->bgColor = $bgColor ?? config('gcss.components.gcss-visual-button.bg_color', config('gcss.buttons.default_bg_color', 'bg-blue-600'));
        $this->textColor = $textColor ?? config('gcss.components.gcss-visual-button.text_color', config('gcss.buttons.default_text_color', 'text-white'));
        $this->borderWidth = $borderWidth ?? config('gcss.components.gcss-visual-button.border_width', config('gcss.buttons.default_border_width', 'border-0'));
        $this->borderStyle = $borderStyle ?? config('gcss.components.gcss-visual-button.border_style', config('gcss.buttons.default_border_style', 'border-solid'));
        $this->borderColor = $borderColor ?? config('gcss.components.gcss-visual-button.border_color', config('gcss.buttons.default_border_color', 'border-transparent'));
        $this->shadow = $shadow ?? config('gcss.components.gcss-visual-button.shadow', config('gcss.buttons.default_shadow', 'shadow-md'));
        $this->hoverBgColor = $hoverBgColor ?? config('gcss.components.gcss-visual-button.hover_bg_color', config('gcss.buttons.default_hover_bg_color', 'hover:bg-blue-700'));
        $this->hoverTextColor = $hoverTextColor ?? config('gcss.components.gcss-visual-button.hover_text_color', config('gcss.buttons.default_hover_text_color', 'hover:text-white'));
        $this->hoverBorderColor = $hoverBorderColor ?? config('gcss.components.gcss-visual-button.hover_border_color', config('gcss.buttons.default_hover_border_color', 'hover:border-transparent'));
    }

    public function render()
    {
        // Clases base generales que siempre se aplican
        $baseCommonClasses = [
            'font-bold',
            'inline-flex items-center justify-center',
            'transition ease-in-out duration-150',
            'focus:outline-none focus:ring-2 focus:ring-opacity-75',
            'disabled:opacity-75 disabled:cursor-not-allowed',
        ];

        // Obtener clases de tamaño y redondeo
        $sizeClasses = config("gcss.buttons.sizes.{$this->size}", '');
        $roundedClasses = "rounded-{$this->rounded}"; // Ya es una clase de Tailwind

        // Por defecto, usar las propiedades directas (útil para el dashboard)
        $dynamicClasses = [
            $this->bgColor,
            $this->textColor,
            $this->borderWidth,
            $this->borderStyle,
            $this->borderColor,
            $this->shadow,
            $this->hoverBgColor,
            $this->hoverTextColor,
            $this->hoverBorderColor,
        ];

        // Si se usa un 'type' predefinido, sus estilos tienen prioridad
        // PERO solo si las propiedades directas no están definidas.
        // En el dashboard, las propiedades directas siempre se pasarán desde Alpine.js,
        // por lo que el 'type' solo actuará como un "preset" inicial.
        $typeConfig = config("gcss.buttons.types.{$this->type}", null);
        if ($typeConfig &&
            (is_null($this->bgColor) || $this->bgColor === config('gcss.buttons.default_bg_color')) &&
            (is_null($this->textColor) || $this->textColor === config('gcss.buttons.default_text_color')) &&
            (is_null($this->borderWidth) || $this->borderWidth === config('gcss.buttons.default_border_width')) &&
            (is_null($this->borderStyle) || $this->borderStyle === config('gcss.buttons.default_border_style')) &&
            (is_null($this->borderColor) || $this->borderColor === config('gcss.buttons.default_border_color')) &&
            (is_null($this->shadow) || $this->shadow === config('gcss.buttons.default_shadow')) &&
            (is_null($this->hoverBgColor) || $this->hoverBgColor === config('gcss.buttons.default_hover_bg_color')) &&
            (is_null($this->hoverTextColor) || $this->hoverTextColor === config('gcss.buttons.default_hover_text_color')) &&
            (is_null($this->hoverBorderColor) || $this->hoverBorderColor === config('gcss.buttons.default_hover_border_color'))
        ) {
            $dynamicClasses = [
                $typeConfig['bg'] ?? '',
                $typeConfig['text'] ?? '',
                $typeConfig['border'] ?? '',
                $typeConfig['shadow'] ?? '',
                $typeConfig['hover_bg'] ?? '',
                $typeConfig['hover_text'] ?? '',
                $typeConfig['hover_border'] ?? '',
            ];
        }


        $classes = trim(implode(' ', array_filter(array_merge(
            $baseCommonClasses,
            [$sizeClasses, $roundedClasses],
            collect($dynamicClasses)->flatten()->all()
        ))));

        return view('gcss::components.visual-button', ['classes' => $classes]);
    }
}

