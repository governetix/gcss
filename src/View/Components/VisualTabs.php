<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualTabs extends Component
{
    public $tabs;
    public $activeTab;
    public $alignment;
    public $tabPadding;
    public $tabTextColor;
    public $tabHoverTextColor;
    public $tabBorderColor;
    public $activeTabTextColor;
    public $activeTabBorderColor;
    public $panelPadding;
    public $panelBgColor;
    public $panelBorderColor;

    /**
     * Create a new component instance.
     *
     * @param array $tabs Array de pestañas (ej. [['id' => 'tab1', 'label' => 'General', 'icon' => 'fas fa-info-circle'], ...]).
     * @param string $activeTab ID de la pestaña activa por defecto.
     * @param string $alignment Alineación de las pestañas ('justify-start', 'justify-center', 'justify-end').
     * @param string $tabPadding Clases de Tailwind para el padding de cada pestaña.
     * @param string $tabTextColor Clases de Tailwind para el color del texto de las pestañas.
     * @param string $tabHoverTextColor Clases de Tailwind para el color del texto al pasar el mouse por las pestañas.
     * @param string $tabBorderColor Clases de Tailwind para el color del borde inferior de las pestañas (inactivo).
     * @param string $activeTabTextColor Clases de Tailwind para el color del texto de la pestaña activa.
     * @param string $activeTabBorderColor Clases de Tailwind para el color del borde inferior de la pestaña activa.
     * @param string $panelPadding Clases de Tailwind para el padding del panel de contenido.
     * @param string $panelBgColor Clases de Tailwind para el color de fondo del panel de contenido.
     * @param string $panelBorderColor Clases de Tailwind para el color del borde del panel de contenido.
     * @return void
     */
    public function __construct(
        $tabs = [],
        $activeTab = null,
        $alignment = null,
        $tabPadding = null,
        $tabTextColor = null,
        $tabHoverTextColor = null,
        $tabBorderColor = null,
        $activeTabTextColor = null,
        $activeTabBorderColor = null,
        $panelPadding = null,
        $panelBgColor = null,
        $panelBorderColor = null
    ) {
        $this->tabs = $tabs;
        $this->activeTab = $activeTab ?? (isset($tabs[0]['id']) ? $tabs[0]['id'] : null);

        $this->alignment = $alignment ?? config('gcss.tabs.default_alignment', 'justify-start');
        $this->tabPadding = $tabPadding ?? config('gcss.tabs.default_tab_padding', 'px-4 py-2');
        $this->tabTextColor = $tabTextColor ?? config('gcss.typography.default_text_color', 'text-gray-700');
        $this->tabHoverTextColor = $tabHoverTextColor ?? config('gcss.tabs.default_tab_hover_text_color', 'hover:text-blue-600');
        $this->tabBorderColor = $tabBorderColor ?? config('gcss.tabs.default_tab_border_color', 'border-gray-200');
        $this->activeTabTextColor = $activeTabTextColor ?? config('gcss.tabs.active_tab_text_color', 'text-blue-600');
        $this->activeTabBorderColor = $activeTabBorderColor ?? config('gcss.tabs.active_tab_border_color', 'border-blue-600');
        $this->panelPadding = $panelPadding ?? config('gcss.tabs.default_panel_padding', 'p-4');
        $this->panelBgColor = $panelBgColor ?? config('gcss.tabs.default_panel_bg_color', 'bg-white');
        $this->panelBorderColor = $panelBorderColor ?? config('gcss.tabs.default_panel_border_color', 'border-gray-200');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tabItemClasses = implode(' ', [
            'inline-flex items-center justify-center',
            'font-medium text-sm',
            'cursor-pointer',
            'transition-colors duration-200',
            $this->tabPadding,
        ]);

        $panelClasses = implode(' ', [
            $this->panelPadding,
            $this->panelBgColor,
            $this->panelBorderColor,
            'border-t',
        ]);

        return view('gcss::components.visual-tabs', [
            'tabItemClasses' => $tabItemClasses,
            'panelClasses' => $panelClasses,
        ]);
    }
}

