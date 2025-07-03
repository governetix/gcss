<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;

class VisualPagination extends Component
{
    public $currentPage;
    public $lastPage;
    public $total;
    public $perPage;
    public $urlPrefix;
    public $alignment;
    public $itemPadding;
    public $itemRounded;
    public $itemTextColor;
    public $itemBgColor;
    public $itemBorder;
    public $itemHoverBg;
    public $itemHoverText;
    public $activeItemBgColor;
    public $activeItemTextColor;
    public $disabledItemOpacity;

    /**
     * Create a new component instance.
     *
     * @param int $currentPage La página actual.
     * @param int $lastPage La última página disponible.
     * @param int $total El número total de ítems.
     * @param int $perPage El número de ítems por página.
     * @param string $urlPrefix Prefijo de URL para los enlaces de paginación (ej. '/search?query=laravel&page=').
     * @param string $alignment Alineación de la paginación ('justify-start', 'justify-center', 'justify-end').
     * @param string $itemPadding Clases de Tailwind para el padding de cada ítem de paginación.
     * @param string $itemRounded Clases de Tailwind para el redondeo de cada ítem.
     * @param string $itemTextColor Clases de Tailwind para el color del texto de los ítems.
     * @param string $itemBgColor Clases de Tailwind para el color de fondo de los ítems.
     * @param string $itemBorder Clases de Tailwind para el borde de los ítems.
     * @param string $itemHoverBg Clases de Tailwind para el color de fondo al pasar el mouse por los ítems.
     * @param string $itemHoverText Clases de Tailwind para el color del texto al pasar el mouse por los ítems.
     * @param string $activeItemBgColor Clases de Tailwind para el color de fondo del ítem activo.
     * @param string $activeItemTextColor Clases de Tailwind para el color del texto del ítem activo.
     * @param string $disabledItemOpacity Clases de Tailwind para la opacidad de los ítems deshabilitados.
     * @return void
     */
    public function __construct(
        $currentPage,
        $lastPage,
        $total = null,
        $perPage = null,
        $urlPrefix = null,
        $alignment = null,
        $itemPadding = null,
        $itemRounded = null,
        $itemTextColor = null,
        $itemBgColor = null,
        $itemBorder = null,
        $itemHoverBg = null,
        $itemHoverText = null,
        $activeItemBgColor = null,
        $activeItemTextColor = null,
        $disabledItemOpacity = null
    ) {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->total = $total;
        $this->perPage = $perPage;
        $this->urlPrefix = $urlPrefix ?? request()->url() . '?page=';

        $this->alignment = $alignment ?? config('gcss.pagination.default_alignment', 'justify-center');
        $this->itemPadding = $itemPadding ?? config('gcss.pagination.default_item_padding', 'px-3 py-2');
        $this->itemRounded = $itemRounded ?? config('gcss.pagination.default_item_rounded', 'rounded-md');
        $this->itemTextColor = $itemTextColor ?? config('gcss.typography.default_text_color', 'text-gray-700');
        $this->itemBgColor = $itemBgColor ?? config('gcss.pagination.default_item_bg_color', 'bg-white');
        $this->itemBorder = $itemBorder ?? config('gcss.pagination.default_item_border', 'border border-gray-300');
        $this->itemHoverBg = $itemHoverBg ?? config('gcss.pagination.default_item_hover_bg', 'hover:bg-gray-100');
        $this->itemHoverText = $itemHoverText ?? config('gcss.pagination.default_item_hover_text', 'hover:text-gray-900');
        $this->activeItemBgColor = $activeItemBgColor ?? config('gcss.pagination.active_item_bg_color', 'bg-blue-600');
        $this->activeItemTextColor = $activeItemTextColor ?? config('gcss.pagination.active_item_text_color', 'text-white');
        $this->disabledItemOpacity = $disabledItemOpacity ?? config('gcss.pagination.disabled_item_opacity', 'opacity-50 cursor-not-allowed');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $itemBaseClasses = implode(' ', [
            'inline-flex items-center',
            'font-medium',
            'transition-colors duration-200',
            $this->itemPadding,
            $this->itemRounded,
            $this->itemTextColor,
            $this->itemBgColor,
            $this->itemBorder,
        ]);

        return view('gcss::components.visual-pagination', [
            'itemBaseClasses' => $itemBaseClasses,
        ]);
    }
}

