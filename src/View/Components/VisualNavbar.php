<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualNavbar extends Component
{
    public $bgColor;
    public $textColor;
    public $padding;
    public $shadow;
    public $height;
    public $linkTextColor;
    public $linkHoverTextColor;
    public $linkPadding;
    public $linkRounded;
    public $links;

    /**
     * Create a new component instance.
     *
     * @param string $bgColor Clases de Tailwind para el color de fondo.
     * @param string $textColor Clases de Tailwind para el color del texto.
     * @param string $padding Clases de Tailwind para el padding.
     * @param string $shadow Clases de Tailwind para la sombra.
     * @param string $height Clases de Tailwind para la altura de la navbar.
     * @param string $linkTextColor Clases de Tailwind para el color del texto de los enlaces.
     * @param string $linkHoverTextColor Clases de Tailwind para el color del texto de los enlaces al pasar el mouse.
     * @param string $linkPadding Clases de Tailwind para el padding de los enlaces.
     * @param string $linkRounded Clases de Tailwind para el redondeo de los enlaces.
     * @param array $links Array de enlaces para la navegación (ej. [['url' => '/', 'text' => 'Inicio', 'icon' => 'fas fa-home']]).
     * @return void
     */
    public function __construct(
        $bgColor = null,
        $textColor = null,
        $padding = null,
        $shadow = null,
        $height = null,
        $linkTextColor = null,
        $linkHoverTextColor = null,
        $linkPadding = null,
        $linkRounded = null,
        $links = []
    ) {
        $this->bgColor = $bgColor ?? config('gcss.navbar.default_bg_color', 'bg-white');
        $this->textColor = $textColor ?? config('gcss.typography.default_text_color', 'text-gray-900');
        $this->padding = $padding ?? config('gcss.navbar.default_padding', 'py-4 px-4 sm:px-6 lg:px-8');
        $this->shadow = $shadow ?? config('gcss.navbar.default_shadow', 'shadow-md');
        $this->height = $height ?? config('gcss.navbar.default_height', 'h-16');
        $this->linkTextColor = $linkTextColor ?? config('gcss.navbar.default_link_text_color', 'text-gray-700');
        $this->linkHoverTextColor = $linkHoverTextColor ?? config('gcss.navbar.default_link_hover_text_color', 'hover:text-blue-600');
        $this->linkPadding = $linkPadding ?? config('gcss.navbar.default_link_padding', 'px-3 py-2');
        $this->linkRounded = $linkRounded ?? config('gcss.navbar.default_link_rounded', 'rounded-md');
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
            'flex items-center justify-between',
            'w-full fixed top-0 z-40',
            $this->bgColor,
            $this->textColor,
            $this->padding,
            $this->shadow,
            $this->height,
        ]);

        $internalLinkClasses = implode(' ', [
            $this->linkTextColor,
            $this->linkHoverTextColor,
            $this->linkPadding,
            $this->linkRounded,
            'font-medium',
            'transition-colors duration-200',
        ]);

        return view('gcss::components.visual-navbar', [
            'classes' => $classes,
            'linkClasses' => $internalLinkClasses,
        ]);
    }
}

