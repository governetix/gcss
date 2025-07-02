<?php

return [
    'colors' => [
        'primary' => 'blue',
        'secondary' => 'gray',
        'danger' => 'red',
        'success' => 'green',
        'warning' => 'yellow',
        'info' => 'sky', // Un color adicional para información
    ],
    'sizes' => [
        'sm' => 'sm', // small: py-1 px-2 text-sm
        'md' => 'md', // medium: py-2 px-4 text-base
        'lg' => 'lg', // large: py-3 px-6 text-lg
    ],
    'fonts' => [], // Por ahora lo dejamos vacío, pero aquí irán las configuraciones de fuentes
    'buttons' => [
        'default_type' => 'primary', // Tipo de botón por defecto
        'default_size' => 'md',      // Tamaño de botón por defecto
        'default_rounded' => 'rounded-md', // Redondeado por defecto
        'types' => [
            'primary' => [
                'bg' => 'bg-blue-600 hover:bg-blue-700',
                'text' => 'text-white',
                'border' => '', // Sin borde por defecto
                'shadow' => 'shadow-md',
            ],
            'secondary' => [
                'bg' => 'bg-gray-200 hover:bg-gray-300',
                'text' => 'text-gray-800',
                'border' => 'border border-gray-300',
                'shadow' => 'shadow-sm',
            ],
            'danger' => [
                'bg' => 'bg-red-600 hover:bg-red-700',
                'text' => 'text-white',
                'border' => '',
                'shadow' => 'shadow-md',
            ],
            'outline-primary' => [ // Nuevo tipo: botón con borde primario
                'bg' => 'bg-transparent hover:bg-blue-50',
                'text' => 'text-blue-600',
                'border' => 'border border-blue-600',
                'shadow' => 'shadow-sm',
            ],
            // Puedes añadir más tipos aquí (ej. 'success', 'warning', 'info')
        ],
        'sizes' => [
            'sm' => 'py-1 px-2 text-sm',
            'md' => 'py-2 px-4 text-base',
            'lg' => 'py-3 px-6 text-lg',
        ],
    ],
    'cards' => [
        'default_padding' => 'p-6',
        'default_shadow' => 'shadow-md',
        'default_rounded' => 'rounded-lg',
        'default_bg_color' => 'bg-white',
        'default_border' => '',
        'default_text_color' => 'text-gray-900', // Color de texto por defecto para el contenido de la tarjeta
        'icon_positions' => [
            'left' => 'mr-2', // Margen a la derecha si el ícono está a la izquierda del texto
            'right' => 'ml-2', // Margen a la izquierda si el ícono está a la derecha del texto
            'top-center' => 'absolute top-4 left-1/2 -translate-x-1/2', // Posicionamiento absoluto, centrado arriba
            'bottom-right' => 'absolute bottom-4 right-4', // Posicionamiento absoluto, abajo a la derecha
            'overlay-top-right' => 'absolute top-4 right-4 text-2xl', // Ícono más grande, en la esquina superior derecha
        ],
        'icon_circle_defaults' => [ // Nuevas configuraciones por defecto para el círculo del ícono
            'bg' => 'bg-blue-600',
            'text' => 'text-white',
            'size' => 'p-3 text-xl', // Padding y tamaño de texto para el ícono
            'rounded' => 'rounded-full', // Por defecto, un círculo perfecto
            'shadow' => 'shadow-md',
            'border' => '', // Sin borde por defecto para el círculo
        ],
        'icon_circle_positions' => [ // Posiciones para el ícono en círculo sobre el borde
            // top-offset, right-offset, transform-x, transform-y
            'top-right-outside' => 'absolute -top-4 -right-4 transform translate-x-1/2 -translate-y-1/2',
            'top-left-outside' => 'absolute -top-4 -left-4 transform -translate-x-1/2 -translate-y-1/2',
            'top-center-outside' => 'absolute -top-4 left-1/2 -translate-x-1/2 -translate-y-1/2',
            'bottom-right-outside' => 'absolute -bottom-4 -right-4 transform translate-x-1/2 translate-y-1/2',
            'bottom-left-outside' => 'absolute -bottom-4 -left-4 transform -translate-x-1/2 translate-y-1/2',
            'bottom-center-outside' => 'absolute -bottom-4 left-1/2 -translate-x-1/2 translate-y-1/2',
        ],
    ],
    'sections' => [
        'default_padding' => 'py-12 px-4 sm:px-6 lg:px-8', // Padding vertical y horizontal responsivo
        'default_bg_color' => 'bg-white', // Color de fondo por defecto
        'default_text_color' => 'text-gray-900', // Color de texto por defecto
        'default_shadow' => '', // Sin sombra por defecto
        'default_rounded' => '', // Sin redondeo por defecto
        'default_full_width' => false, // No es de ancho completo por defecto (usa max-width)
    ],
    'flex_grid' => [
        'default_display' => 'flex', // Por defecto 'flex'
        'default_gap' => 'gap-4',    // Gap por defecto
        'flex_defaults' => [
            'direction' => 'flex-row',
            'justify' => 'justify-start',
            'align' => 'items-start',
            'wrap' => 'flex-wrap',
        ],
        'grid_defaults' => [
            'cols' => 'grid-cols-1', // Por defecto una columna
            'rows' => '',            // Sin filas explícitas por defecto
            'auto_flow' => 'grid-flow-row',
        ],
    ],
    'dividers' => [
        'default_height' => 'h-px', // Altura por defecto (1px)
        'default_color' => 'bg-gray-200', // Color de fondo por defecto
        'default_margin' => 'my-8', // Margen vertical por defecto
        'default_full_width' => true, // Por defecto ocupa todo el ancho disponible
        'default_line_style' => 'border-solid', // Nuevo: Estilo de línea por defecto
        'icon_box_defaults' => [ // Nuevo: Estilos por defecto para la caja de ícono/texto
            'bg' => 'bg-white',
            'text' => 'text-gray-500',
            'padding' => 'px-3 py-1',
            'rounded' => 'rounded-md',
            'border' => 'border border-gray-300',
            'shadow' => 'shadow-sm',
            'icon_size' => 'text-lg',
            'icon_color' => 'text-gray-500',
        ],
    ],
    'info_boxes' => [
        'default_type' => 'info', // Tipo por defecto (info, success, warning, danger)
        'default_padding' => 'p-4',
        'default_rounded' => 'rounded-md',
        'default_shadow' => 'shadow-sm',
        'types' => [
            'info' => [
                'bg' => 'bg-blue-100',
                'text' => 'text-blue-800',
                'border' => 'border border-blue-400',
                'icon' => 'fas fa-info-circle',
                'icon_color' => 'text-blue-500',
            ],
            'success' => [
                'bg' => 'bg-green-100',
                'text' => 'text-green-800',
                'border' => 'border border-green-400',
                'icon' => 'fas fa-check-circle',
                'icon_color' => 'text-green-500',
            ],
            'warning' => [
                'bg' => 'bg-yellow-100',
                'text' => 'text-yellow-800',
                'border' => 'border border-yellow-400',
                'icon' => 'fas fa-exclamation-triangle',
                'icon_color' => 'text-yellow-500',
            ],
            'danger' => [
                'bg' => 'bg-red-100',
                'text' => 'text-red-800',
                'border' => 'border border-red-400',
                'icon' => 'fas fa-times-circle',
                'icon_color' => 'text-red-500',
            ],
        ],
    ],
    'dropdowns' => [
        'default_trigger_type' => 'button', // 'button' o 'link'
        'default_position' => 'bottom-left', // bottom-left, bottom-right, top-left, top-right
        'default_offset' => 'mt-2', // Margen entre el trigger y el menú
        'menu_defaults' => [
            'bg' => 'bg-white',
            'shadow' => 'shadow-lg',
            'rounded' => 'rounded-md',
            'border' => 'border border-gray-200',
            'padding' => 'py-1', // Padding del menú en sí
        ],
        'item_defaults' => [
            'text' => 'text-gray-700',
            'hover_bg' => 'hover:bg-gray-100',
            'hover_text' => 'hover:text-gray-900',
            'padding' => 'px-4 py-2',
        ],
    ],
];

