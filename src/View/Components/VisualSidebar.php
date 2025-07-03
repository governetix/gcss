<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualSidebar extends Component
{
    public $bgColor;
    public $textColor;
    public $width;
    public $padding;
    public $shadow;
    public $linkTextColor;
    public $linkHoverBg;
    public $linkHoverTextColor;
    public $linkPadding;
    public $linkRounded;
    public $fixed;
    public $links; // Nuevo: Array de enlaces para el sidebar

    /**
     * Create a new component instance.
     *
     * @param string $bgColor Clases de Tailwind para el color de fondo.
     * @param string $textColor Clases de Tailwind para el color del texto.
     * @param string $width Clases de Tailwind para el ancho del sidebar.
     * @param string $padding Clases de Tailwind para el padding.
     * @param string $shadow Clases de Tailwind para la sombra.
     * @param string $linkTextColor Clases de Tailwind para el color del texto de los enlaces.
     * @param string $linkHoverBg Clases de Tailwind para el color de fondo al pasar el mouse por los enlaces.
     * @param string $linkHoverTextColor Clases de Tailwind para el color del texto de los enlaces al pasar el mouse.
     * @param string $linkPadding Clases de Tailwind para el padding de los enlaces.
     * @param string $linkRounded Clases de Tailwind para el redondeo de los enlaces.
     * @param bool $fixed Si el sidebar debe ser fixed (útil para toggles móviles).
     * @param array $links Array de enlaces para el sidebar (ej. [['url' => '/', 'text' => 'Dashboard', 'icon' => 'fas fa-tachometer-alt']]).
     * @return void
     */
    public function __construct(
        $bgColor = null,
        $textColor = null,
        $width = null,
        $padding = null,
        $shadow = null,
        $linkTextColor = null,
        $linkHoverBg = null,
        $linkHoverTextColor = null,
        $linkPadding = null,
        $linkRounded = null,
        $fixed = false,
        $links = [] // Inicializamos como un array vacío por defecto
    ) {
        $this->bgColor = $bgColor ?? config('gcss.sidebar.default_bg_color', 'bg-gray-800');
        $this->textColor = $textColor ?? config('gcss.sidebar.default_text_color', 'text-white');
        $this->width = $width ?? config('gcss.sidebar.default_width', 'w-64');
        $this->padding = $padding ?? config('gcss.sidebar.default_padding', 'py-4 px-3');
        $this->shadow = $shadow ?? config('gcss.sidebar.default_shadow', 'shadow-lg');
        $this->linkTextColor = $linkTextColor ?? config('gcss.sidebar.default_link_text_color', 'text-gray-300');
        $this->linkHoverBg = $linkHoverBg ?? config('gcss.sidebar.default_link_hover_bg', 'hover:bg-gray-700');
        $this->linkHoverTextColor = $linkHoverTextColor ?? config('gcss.sidebar.default_link_hover_text_color', 'hover:text-white');
        $this->linkPadding = $linkPadding ?? config('gcss.sidebar.default_link_padding', 'py-2 px-3');
        $this->linkRounded = $linkRounded ?? config('gcss.sidebar.default_link_rounded', 'rounded-md');
        $this->fixed = $fixed;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $classes = implode(' ', [
            $this->bgColor,
            $this->textColor,
            $this->width,
            $this->padding,
            $this->shadow,
            'flex flex-col', // Para que los elementos internos se apilen verticalmente
            $this->fixed ? 'fixed top-0 left-0 h-full z-30' : '', // Posicionamiento fixed si se indica
        ]);

        // Clases para los enlaces internos del sidebar
        $internalLinkClasses = implode(' ', [
            'flex items-center', // Para íconos y texto
            $this->linkTextColor,
            $this->linkHoverBg,
            $this->linkHoverTextColor,
            $this->linkPadding,
            $this->linkRounded,
            'font-medium',
            'transition-colors duration-200',
        ]);

        return view('gcss::components.visual-sidebar', [
            'classes' => $classes,
            'linkClasses' => $internalLinkClasses, // Pasamos estas clases a la vista para que las use internamente
        ]);
    }
}

