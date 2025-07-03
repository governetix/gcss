<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualDropdown extends Component
{
    public $triggerText;
    public $triggerIcon;
    public $triggerType;
    public $position;
    public $offset;

    public $menuBg;
    public $menuShadow;
    public $menuRounded;
    public $menuBorder;
    public $menuPadding;

    public $itemText;
    public $itemHoverBg;
    public $itemHoverText;
    public $itemPadding;

    /**
     * Create a new component instance.
     *
     * @param string $triggerText Texto del elemento que activa el dropdown.
     * @param string $triggerIcon Clase del ícono para el elemento que activa el dropdown.
     * @param string $triggerType Tipo de trigger ('button' o 'link').
     * @param string $position Posición del menú ('bottom-left', 'bottom-right', 'top-left', 'top-right').
     * @param string $offset Margen entre el trigger y el menú (ej. 'mt-2').
     * @param string $menuBg Clases de Tailwind para el color de fondo del menú.
     * @param string $menuShadow Clases de Tailwind para la sombra del menú.
     * @param string $menuRounded Clases de Tailwind para el radio de borde del menú.
     * @param string $menuBorder Clases de Tailwind para el borde del menú.
     * @param string $menuPadding Clases de Tailwind para el padding del menú.
     * @param string $itemText Clases de Tailwind para el color del texto de los ítems del menú.
     * @param string $itemHoverBg Clases de Tailwind para el color de fondo al pasar el mouse por los ítems.
     * @param string $itemHoverText Clases de Tailwind para el color del texto al pasar el mouse por los ítems.
     * @param string $itemPadding Clases de Tailwind para el padding de los ítems del menú.
     * @return void
     */
    public function __construct(
        $triggerText = null,
        $triggerIcon = null,
        $triggerType = null,
        $position = null,
        $offset = null,
        $menuBg = null,
        $menuShadow = null,
        $menuRounded = null,
        $menuBorder = null,
        $menuPadding = null,
        $itemText = null,
        $itemHoverBg = null,
        $itemHoverText = null,
        $itemPadding = null
    ) {
        $this->triggerText = $triggerText;
        $this->triggerIcon = $triggerIcon;
        $this->triggerType = $triggerType ?? config('gcss.dropdowns.default_trigger_type', 'button');
        $this->position = $position ?? config('gcss.dropdowns.default_position', 'bottom-left');
        $this->offset = $offset ?? config('gcss.dropdowns.default_offset', 'mt-2');

        $this->menuBg = $menuBg ?? config('gcss.dropdowns.menu_defaults.bg', 'bg-white');
        $this->menuShadow = $menuShadow ?? config('gcss.dropdowns.menu_defaults.shadow', 'shadow-lg');
        $this->menuRounded = $menuRounded ?? config('gcss.dropdowns.menu_defaults.rounded', 'rounded-md');
        $this->menuBorder = $menuBorder ?? config('gcss.dropdowns.menu_defaults.border', 'border border-gray-200');
        $this->menuPadding = $menuPadding ?? config('gcss.dropdowns.menu_defaults.padding', 'py-1');

        $this->itemText = $itemText ?? config('gcss.dropdowns.item_defaults.text', config('gcss.typography.default_text_color', 'text-gray-700'));
        $this->itemHoverBg = $itemHoverBg ?? config('gcss.dropdowns.item_defaults.hover_bg', 'hover:bg-gray-100');
        $this->itemHoverText = $itemHoverText ?? config('gcss.dropdowns.item_defaults.hover_text', 'hover:text-gray-900');
        $this->itemPadding = $itemPadding ?? config('gcss.dropdowns.item_defaults.padding', 'px-4 py-2');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $containerClasses = 'relative inline-block text-left';

        $menuClasses = implode(' ', [
            'absolute z-50',
            $this->menuBg,
            $this->menuShadow,
            $this->menuRounded,
            $this->menuBorder,
            $this->menuPadding,
            $this->offset,
        ]);

        if ($this->position === 'bottom-left') {
            $menuClasses .= ' left-0 origin-top-left';
        } elseif ($this->position === 'bottom-right') {
            $menuClasses .= ' right-0 origin-top-right';
        } elseif ($this->position === 'top-left') {
            $menuClasses .= ' left-0 bottom-full origin-bottom-left';
        } elseif ($this->position === 'top-right') {
            $menuClasses .= ' right-0 bottom-full origin-bottom-right';
        }

        $itemClasses = implode(' ', [
            'block w-full text-left',
            $this->itemText,
            $this->itemHoverBg,
            $this->itemHoverText,
            $this->itemPadding,
            'whitespace-nowrap',
        ]);

        return view('gcss::components.visual-dropdown', [
            'containerClasses' => $containerClasses,
            'menuClasses' => $menuClasses,
            'itemClasses' => $itemClasses,
        ]);
    }
}

