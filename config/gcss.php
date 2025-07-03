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
    // Mapeo de colores de Tailwind a valores HEX para usar en selectores de color del dashboard
    'tailwind_colors_hex' => [
        'blue' => [
            '50' => '#eff6ff', '100' => '#dbeafe', '200' => '#bfdbfe', '300' => '#93c5fd', '400' => '#60a5fa',
            '500' => '#3b82f6', '600' => '#2563eb', '700' => '#1d4ed8', '800' => '#1e40af', '900' => '#1e3a8a',
        ],
        'gray' => [
            '50' => '#f9fafb', '100' => '#f3f4f6', '200' => '#e5e7eb', '300' => '#d1d5db', '400' => '#9ca3af',
            '500' => '#6b7280', '600' => '#4b5563', '700' => '#374151', '800' => '#1f2937', '900' => '#111827',
        ],
        'red' => [
            '50' => '#fef2f2', '100' => '#fee2e2', '200' => '#fecaca', '300' => '#fca5a5', '400' => '#f87171',
            '500' => '#ef4444', '600' => '#dc2626', '700' => '#b91c1c', '800' => '#991b1b', '900' => '#7f1d1d',
        ],
        'green' => [
            '50' => '#f0fdf4', '100' => '#dcfce7', '200' => '#bbf7d0', '300' => '#86efad', '400' => '#4ade80',
            '500' => '#22c55e', '600' => '#16a34a', '700' => '#15803d', '800' => '#166534', '900' => '#14532d',
        ],
        'yellow' => [
            '50' => '#fefce8', '100' => '#fef9c3', '200' => '#fef08a', '300' => '#fde047', '400' => '#facc15',
            '500' => '#eab308', '600' => '#ca8a04', '700' => '#a16207', '800' => '#854d09', '900' => '#713f12',
        ],
        'sky' => [
            '50' => '#f0f9ff', '100' => '#e0f2fe', '200' => '#bae6fd', '300' => '#7dd3fc', '400' => '#38bdf8',
            '500' => '#0ea5e9', '600' => '#0284c7', '700' => '#0369a1', '800' => '#075985', '900' => '#0c4a6e',
        ],
        'purple' => [
            '50' => '#f5f3ff', '100' => '#ede9fe', '200' => '#ddd6fe', '300' => '#c4b5fd', '400' => '#a78bfa',
            '500' => '#8b5cf6', '600' => '#7c3aed', '700' => '#6d28d9', '800' => '#5b21b6', '900' => '#4c1d95',
        ],
        'indigo' => [
            '50' => '#eef2ff', '100' => '#e0e7ff', '200' => '#c7d2fe', '300' => '#a5b4fc', '400' => '#818cf8',
            '500' => '#6366f1', '600' => '#4f46e5', '700' => '#4338ca', '800' => '#3730a3', '900' => '#312e81',
        ],
        'emerald' => [
            '50' => '#ecfdf5', '100' => '#d1fae5', '200' => '#a7f3d0', '300' => '#6ee7b7', '400' => '#34d399',
            '500' => '#10b981', '600' => '#059669', '700' => '#047857', '800' => '#065f46', '900' => '#064e3b',
        ],
        'orange' => [
            '50' => '#fff7ed', '100' => '#ffedd5', '200' => '#fed7aa', '300' => '#fdba74', '400' => '#fb923c',
            '500' => '#f97316', '600' => '#ea580c', '700' => '#d9480f', '800' => '#c2410c', '900' => '#a7340c',
        ],
        'teal' => [
            '50' => '#f0fdfa', '100' => '#ccfbf1', '200' => '#99f6e4', '300' => '#5eead4', '400' => '#2dd4bf',
            '500' => '#14b8a6', '600' => '#0d9488', '700' => '#0f766e', '800' => '#115e59', '900' => '#134e4a',
        ],
        'lime' => [
            '50' => '#f7fee7', '100' => '#ecfccf', '200' => '#d9f99d', '300' => '#bef264', '400' => '#a3e635',
            '500' => '#84cc16', '600' => '#65a30d', '700' => '#4d7c0f', '800' => '#3f6212', '900' => '#365314',
        ],
        'amber' => [
            '50' => '#fffbeb', '100' => '#fef3c7', '200' => '#fde68a', '300' => '#fcd34d', '400' => '#fbbf24',
            '500' => '#f59e0b', '600' => '#d97706', '700' => '#b45309', '800' => '#92400e', '900' => '#78350f',
        ],
        'stone' => [
            '50' => '#fafaf9', '100' => '#f5f5f4', '200' => '#e7e5e4', '300' => '#d6d3d1', '400' => '#a8a29e',
            '500' => '#78716c', '600' => '#57534e', '700' => '#44403c', '800' => '#292524', '900' => '#1c1917',
        ],
        'pink' => [
            '50' => '#fdf2f8', '100' => '#fce7f3', '200' => '#fbcfe8', '300' => '#f9a8d4', '400' => '#f472b6',
            '500' => '#ec4899', '600' => '#db2777', '700' => '#be185d', '800' => '#9d174d', '900' => '#831843',
        ],
        'fuchsia' => [
            '50' => '#fdf4ff', '100' => '#fae8ff', '200' => '#f5d0fe', '300' => '#f0abfc', '400' => '#e879f9',
            '500' => '#d946ef', '600' => '#c026d3', '700' => '#a21caf', '800' => '#86198f', '900' => '#701a75',
        ],
        'zinc' => [
            '50' => '#fafafa', '100' => '#f4f4f5', '200' => '#e4e4e7', '300' => '#d4d4d8', '400' => '#a1a1aa',
            '500' => '#71717a', '600' => '#52525b', '700' => '#3f3f46', '800' => '#27272a', '900' => '#18181b',
        ],
        'slate' => [
            '50' => '#f8fafc', '100' => '#f1f5f9', '200' => '#e2e8f0', '300' => '#cbd5e1', '400' => '#94a3b8',
            '500' => '#64748b', '600' => '#475569', '700' => '#334155', '800' => '#1e293b', '900' => '#0f172a',
        ],
        'white' => ['default' => '#ffffff'],
        'black' => ['default' => '#000000'],
        'transparent' => ['default' => '#00000000'], // Para bordes transparentes
    ],
    // Lista de todas las clases de color de Tailwind disponibles para el dashboard
    'tailwind_color_classes' => [
        'bg' => [
            'bg-transparent', 'bg-white', 'bg-black',
            'bg-gray-50', 'bg-gray-100', 'bg-gray-200', 'bg-gray-300', 'bg-gray-400', 'bg-gray-500', 'bg-gray-600', 'bg-gray-700', 'bg-gray-800', 'bg-gray-900',
            'bg-red-50', 'bg-red-100', 'bg-red-200', 'bg-red-300', 'bg-red-400', 'bg-red-500', 'bg-red-600', 'bg-red-700', 'bg-red-800', 'bg-red-900',
            'bg-blue-50', 'bg-blue-100', 'bg-blue-200', 'bg-blue-300', 'bg-blue-400', 'bg-blue-500', 'bg-blue-600', 'bg-blue-700', 'bg-blue-800', 'bg-blue-900',
            'bg-green-50', 'bg-green-100', 'bg-green-200', 'bg-green-300', 'bg-green-400', 'bg-green-500', 'bg-green-600', 'bg-green-700', 'bg-green-800', 'bg-green-900',
            'bg-yellow-50', 'bg-yellow-100', 'bg-yellow-200', 'bg-yellow-300', 'bg-yellow-400', 'bg-yellow-500', 'bg-yellow-600', 'bg-yellow-700', 'bg-yellow-800', 'bg-yellow-900',
            'bg-indigo-50', 'bg-indigo-100', 'bg-indigo-200', 'bg-indigo-300', 'bg-indigo-400', 'bg-indigo-500', 'bg-indigo-600', 'bg-indigo-700', 'bg-indigo-800', 'bg-indigo-900',
            'bg-purple-50', 'bg-purple-100', 'bg-purple-200', 'bg-purple-300', 'bg-purple-400', 'bg-purple-500', 'bg-purple-600', 'bg-purple-700', 'bg-purple-800', 'bg-purple-900',
            'bg-pink-50', 'bg-pink-100', 'bg-pink-200', 'bg-pink-300', 'bg-pink-400', 'bg-pink-500', 'bg-pink-600', 'bg-pink-700', 'bg-pink-800', 'bg-pink-900',
            'bg-fuchsia-50', 'bg-fuchsia-100', 'bg-fuchsia-200', 'bg-fuchsia-300', 'bg-fuchsia-400', 'bg-fuchsia-500', 'bg-fuchsia-600', 'bg-fuchsia-700', 'bg-fuchsia-800', 'bg-fuchsia-900',
            'bg-emerald-50', 'bg-emerald-100', 'bg-emerald-200', 'bg-emerald-300', 'bg-emerald-400', 'bg-emerald-500', 'bg-emerald-600', 'bg-emerald-700', 'bg-emerald-800', 'bg-emerald-900',
            'bg-teal-50', 'bg-teal-100', 'bg-teal-200', 'bg-teal-300', 'bg-teal-400', 'bg-teal-500', 'bg-teal-600', 'bg-teal-700', 'bg-teal-800', 'bg-teal-900',
            'bg-cyan-50', 'bg-cyan-100', 'bg-cyan-200', 'bg-cyan-300', 'bg-cyan-400', 'bg-cyan-500', 'bg-cyan-600', 'bg-cyan-700', 'bg-cyan-800', 'bg-cyan-900',
            'bg-lime-50', 'bg-lime-100', 'bg-lime-200', 'bg-lime-300', 'bg-lime-400', 'bg-lime-500', 'bg-lime-600', 'bg-lime-700', 'bg-lime-800', 'bg-lime-900',
            'bg-orange-50', 'bg-orange-100', 'bg-orange-200', 'bg-orange-300', 'bg-orange-400', 'bg-orange-500', 'bg-orange-600', 'bg-orange-700', 'bg-orange-800', 'bg-orange-900',
            'bg-amber-50', 'bg-amber-100', 'bg-amber-200', 'bg-amber-300', 'bg-amber-400', 'bg-amber-500', 'bg-amber-600', 'bg-amber-700', 'bg-amber-800', 'bg-amber-900',
            'bg-violet-50', 'bg-violet-100', 'bg-violet-200', 'bg-violet-300', 'bg-violet-400', 'bg-violet-500', 'bg-violet-600', 'bg-violet-700', 'bg-violet-800', 'bg-violet-900',
            'bg-rose-50', 'bg-rose-100', 'bg-rose-200', 'bg-rose-300', 'bg-rose-400', 'bg-rose-500', 'bg-rose-600', 'bg-rose-700', 'bg-rose-800', 'bg-rose-900',
            'bg-stone-50', 'bg-stone-100', 'bg-stone-200', 'bg-stone-300', 'bg-stone-400', 'bg-stone-500', 'bg-stone-600', 'bg-stone-700', 'bg-stone-800', 'bg-stone-900',
            'bg-zinc-50', 'bg-zinc-100', 'bg-zinc-200', 'bg-zinc-300', 'bg-zinc-400', 'bg-zinc-500', 'bg-zinc-600', 'bg-zinc-700', 'bg-zinc-800', 'bg-zinc-900',
            'bg-neutral-50', 'bg-neutral-100', 'bg-neutral-200', 'bg-neutral-300', 'bg-neutral-400', 'bg-neutral-500', 'bg-neutral-600', 'bg-neutral-700', 'bg-neutral-800', 'bg-neutral-900',
            'bg-slate-50', 'bg-slate-100', 'bg-slate-200', 'bg-slate-300', 'bg-slate-400', 'bg-slate-500', 'bg-slate-600', 'bg-slate-700', 'bg-slate-800', 'bg-slate-900',
        ],
        'text' => [
            'text-white', 'text-black',
            'text-gray-50', 'text-gray-100', 'text-gray-200', 'text-gray-300', 'text-gray-400', 'text-gray-500', 'text-gray-600', 'text-gray-700', 'text-gray-800', 'text-gray-900',
            'text-red-50', 'text-red-100', 'text-red-200', 'text-red-300', 'text-red-400', 'text-red-500', 'text-red-600', 'text-red-700', 'text-red-800', 'text-red-900',
            'text-blue-50', 'text-blue-100', 'text-blue-200', 'text-blue-300', 'text-blue-400', 'text-blue-500', 'text-blue-600', 'text-blue-700', 'text-blue-800', 'text-blue-900',
            'text-green-50', 'text-green-100', 'text-green-200', 'text-green-300', 'text-green-400', 'text-green-500', 'text-green-600', 'text-green-700', 'text-green-800', 'text-green-900',
            'text-yellow-50', 'text-yellow-100', 'text-yellow-200', 'text-yellow-300', 'text-yellow-400', 'text-yellow-500', 'text-yellow-600', 'text-yellow-700', 'text-yellow-800', 'text-yellow-900',
            'text-indigo-50', 'text-indigo-100', 'text-indigo-200', 'text-indigo-300', 'text-indigo-400', 'text-indigo-500', 'text-indigo-600', 'text-indigo-700', 'text-indigo-800', 'text-indigo-900',
            'text-purple-50', 'text-purple-100', 'text-purple-200', 'text-purple-300', 'text-purple-400', 'text-purple-500', 'text-purple-600', 'text-purple-700', 'text-purple-800', 'text-purple-900',
            'text-pink-50', 'text-pink-100', 'text-pink-200', 'text-pink-300', 'text-pink-400', 'text-pink-500', 'text-pink-600', 'text-pink-700', 'text-pink-800', 'text-pink-900',
            'text-fuchsia-50', 'text-fuchsia-100', 'text-fuchsia-200', 'text-fuchsia-300', 'text-fuchsia-400', 'text-fuchsia-500', 'text-fuchsia-600', 'text-fuchsia-700', 'text-fuchsia-800', 'text-fuchsia-900',
            'text-emerald-50', 'text-emerald-100', 'text-emerald-200', 'text-emerald-300', 'text-emerald-400', 'text-emerald-500', 'text-emerald-600', 'text-emerald-700', 'text-emerald-800', 'text-emerald-900',
            'text-teal-50', 'text-teal-100', 'text-teal-200', 'text-teal-300', 'text-teal-400', 'text-teal-500', 'text-teal-600', 'text-teal-700', 'text-teal-800', 'text-teal-900',
            'text-cyan-50', 'text-cyan-100', 'text-cyan-200', 'text-cyan-300', 'text-cyan-400', 'text-cyan-500', 'text-cyan-600', 'text-cyan-700', 'text-cyan-800', 'text-cyan-900',
            'text-lime-50', 'text-lime-100', 'text-lime-200', 'text-lime-300', 'text-lime-400', 'text-lime-500', 'text-lime-600', 'text-lime-700', 'text-lime-800', 'text-lime-900',
            'text-orange-50', 'text-orange-100', 'text-orange-200', 'text-orange-300', 'text-orange-400', 'text-orange-500', 'text-orange-600', 'text-orange-700', 'text-orange-800', 'text-orange-900',
            'text-amber-50', 'text-amber-100', 'text-amber-200', 'text-amber-300', 'text-amber-400', 'text-amber-500', 'text-amber-600', 'text-amber-700', 'text-amber-800', 'text-amber-900',
            'text-violet-50', 'text-violet-100', 'text-violet-200', 'text-violet-300', 'text-violet-400', 'text-violet-500', 'text-violet-600', 'text-violet-700', 'text-violet-800', 'text-violet-900',
            'text-rose-50', 'text-rose-100', 'text-rose-200', 'text-rose-300', 'text-rose-400', 'text-rose-500', 'text-rose-600', 'text-rose-700', 'text-rose-800', 'text-rose-900',
            'text-stone-50', 'text-stone-100', 'text-stone-200', 'text-stone-300', 'text-stone-400', 'text-stone-500', 'text-stone-600', 'text-stone-700', 'text-stone-800', 'text-stone-900',
            'text-zinc-50', 'text-zinc-100', 'text-zinc-200', 'text-zinc-300', 'text-zinc-400', 'text-zinc-500', 'text-zinc-600', 'text-zinc-700', 'text-zinc-800', 'text-zinc-900',
            'text-neutral-50', 'text-neutral-100', 'text-neutral-200', 'text-neutral-300', 'text-neutral-400', 'text-neutral-500', 'text-neutral-600', 'text-neutral-700', 'text-neutral-800', 'text-neutral-900',
            'text-slate-50', 'text-slate-100', 'text-slate-200', 'text-slate-300', 'text-slate-400', 'text-slate-500', 'text-slate-600', 'text-slate-700', 'text-slate-800', 'text-slate-900',
        ],
        'border' => [
            'border-transparent', 'border-white', 'border-black',
            'border-gray-50', 'border-gray-100', 'border-gray-200', 'border-gray-300', 'border-gray-400', 'border-gray-500', 'border-gray-600', 'border-gray-700', 'border-gray-800', 'border-gray-900',
            'border-red-50', 'border-red-100', 'border-red-200', 'border-red-300', 'border-red-400', 'border-red-500', 'border-red-600', 'border-red-700', 'border-red-800', 'border-red-900',
            'border-blue-50', 'border-blue-100', 'border-blue-200', 'border-blue-300', 'border-blue-400', 'border-blue-500', 'border-blue-600', 'border-blue-700', 'border-blue-800', 'border-blue-900',
            'border-green-50', 'border-green-100', 'border-green-200', 'border-green-300', 'border-green-400', 'border-green-500', 'border-green-600', 'border-green-700', 'border-green-800', 'border-green-900',
            'border-yellow-50', 'border-yellow-100', 'border-yellow-200', 'border-yellow-300', 'border-yellow-400', 'border-yellow-500', 'border-yellow-600', 'border-yellow-700', 'border-yellow-800', 'border-yellow-900',
            'border-indigo-50', 'border-indigo-100', 'border-indigo-200', 'border-indigo-300', 'border-indigo-400', 'border-indigo-500', 'border-indigo-600', 'border-indigo-700', 'border-indigo-800', 'border-indigo-900',
            'border-purple-50', 'border-purple-100', 'border-purple-200', 'border-purple-300', 'border-purple-400', 'border-purple-500', 'border-purple-600', 'border-purple-700', 'border-purple-800', 'border-purple-900',
            'border-pink-50', 'border-pink-100', 'border-pink-200', 'border-pink-300', 'border-pink-400', 'border-pink-500', 'border-pink-600', 'border-pink-700', 'border-pink-800', 'border-pink-900',
            'border-fuchsia-50', 'border-fuchsia-100', 'border-fuchsia-200', 'border-fuchsia-300', 'border-fuchsia-400', 'border-fuchsia-500', 'border-fuchsia-600', 'border-fuchsia-700', 'border-fuchsia-800', 'border-fuchsia-900',
            'border-emerald-50', 'border-emerald-100', 'border-emerald-200', 'border-emerald-300', 'border-emerald-400', 'border-emerald-500', 'border-emerald-600', 'border-emerald-700', 'border-emerald-800', 'border-emerald-900',
            'border-teal-50', 'border-teal-100', 'border-teal-200', 'border-teal-300', 'border-teal-400', 'border-teal-500', 'border-teal-600', 'border-teal-700', 'border-teal-800', 'border-teal-900',
            'border-cyan-50', 'border-cyan-100', 'border-cyan-200', 'border-cyan-300', 'border-cyan-400', 'border-cyan-500', 'border-cyan-600', 'border-cyan-700', 'border-cyan-800', 'border-cyan-900',
            'border-lime-50', 'border-lime-100', 'border-lime-200', 'border-lime-300', 'border-lime-400', 'border-lime-500', 'border-lime-600', 'border-lime-700', 'border-lime-800', 'border-lime-900',
            'border-orange-50', 'border-orange-100', 'border-orange-200', 'border-orange-300', 'border-orange-400', 'border-orange-500', 'border-orange-600', 'border-orange-700', 'border-orange-800', 'border-orange-900',
            'border-amber-50', 'border-amber-100', 'border-amber-200', 'border-amber-300', 'border-amber-400', 'border-amber-500', 'border-amber-600', 'border-amber-700', 'border-amber-800', 'border-amber-900',
            'border-violet-50', 'border-violet-100', 'border-violet-200', 'border-violet-300', 'border-violet-400', 'border-violet-500', 'border-violet-600', 'border-violet-700', 'border-violet-800', 'border-violet-900',
            'border-rose-50', 'border-rose-100', 'border-rose-200', 'border-rose-300', 'border-rose-400', 'border-rose-500', 'border-rose-600', 'border-rose-700', 'border-rose-800', 'border-rose-900',
            'border-stone-50', 'border-stone-100', 'border-stone-200', 'border-stone-300', 'border-stone-400', 'border-stone-500', 'border-stone-600', 'border-stone-700', 'border-stone-800', 'border-stone-900',
            'border-zinc-50', 'border-zinc-100', 'border-zinc-200', 'border-zinc-300', 'border-zinc-400', 'border-zinc-500', 'border-zinc-600', 'border-zinc-700', 'border-zinc-800', 'border-zinc-900',
            'border-neutral-50', 'border-neutral-100', 'border-neutral-200', 'border-neutral-300', 'border-neutral-400', 'border-neutral-500', 'border-neutral-600', 'border-neutral-700', 'border-neutral-800', 'border-neutral-900',
            'border-slate-50', 'border-slate-100', 'border-slate-200', 'border-slate-300', 'border-slate-400', 'border-slate-500', 'border-slate-600', 'border-slate-700', 'border-slate-800', 'border-slate-900',
        ],
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
        'default_bg_color' => 'bg-blue-600', // Nuevo: color de fondo por defecto
        'default_text_color' => 'text-white', // Nuevo: color de texto por defecto
        'default_border_width' => 'border-0', // Nuevo: ancho de borde por defecto (0 para sin borde)
        'default_border_style' => 'border-solid', // Nuevo: estilo de borde por defecto
        'default_border_color' => 'border-transparent', // Nuevo: color de borde por defecto
        'default_shadow' => 'shadow-md', // Nuevo: sombra por defecto
        'default_hover_bg_color' => 'hover:bg-blue-700', // Nuevo: hover bg por defecto
        'default_hover_text_color' => 'hover:text-white', // Nuevo: hover text por defecto
        'default_hover_border_color' => 'hover:border-transparent', // Nuevo: hover border por defecto
        'base_classes' => '', // Clases base que se aplican a todos los botones
        'types' => [
            'primary' => [
                'bg' => 'bg-blue-600',
                'text' => 'text-white',
                'border' => '',
                'shadow' => 'shadow-md',
                'hover_bg' => 'hover:bg-blue-700',
                'hover_text' => 'hover:text-white',
                'hover_border' => '',
            ],
            'secondary' => [
                'bg' => 'bg-gray-200',
                'text' => 'text-gray-800',
                'border' => 'border border-gray-300',
                'shadow' => 'shadow-sm',
                'hover_bg' => 'hover:bg-gray-300',
                'hover_text' => 'hover:text-gray-900',
                'hover_border' => 'hover:border-gray-400',
            ],
            'danger' => [
                'bg' => 'bg-red-600',
                'text' => 'text-white',
                'border' => '',
                'shadow' => 'shadow-md',
                'hover_bg' => 'hover:bg-red-700',
                'hover_text' => 'hover:text-white',
                'hover_border' => '',
            ],
            'outline-primary' => [
                'bg' => 'bg-transparent',
                'text' => 'text-blue-600',
                'border' => 'border border-blue-600',
                'shadow' => 'shadow-sm',
                'hover_bg' => 'hover:bg-blue-50',
                'hover_text' => 'hover:text-blue-700',
                'hover_border' => 'hover:border-blue-700',
            ],
            // Puedes añadir más tipos aquí (ej. 'success', 'warning', 'info')
        ],
        'sizes' => [
            'sm' => 'py-1 px-2 text-sm',
            'md' => 'py-2 px-4 text-base',
            'lg' => 'py-3 px-6 text-lg',
        ],
        'border_widths' => [ // Nuevas opciones para ancho de borde
            'border-0', 'border', 'border-2', 'border-4', 'border-8'
        ],
        'border_styles' => [ // Nuevas opciones para estilo de borde
            'border-solid', 'border-dashed', 'border-dotted', 'border-double', 'border-hidden', 'border-none'
        ],
        'shadows' => [ // Añadido para el dropdown de sombra
            'shadow-none', 'shadow-sm', 'shadow-md', 'shadow-lg', 'shadow-xl', 'shadow-2xl', 'shadow-inner'
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
            'bottom-left-outside' => 'absolute -bottom-4 -left-4 transform -translate-x-1/2 -translate-y-1/2',
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
    'navbar' => [
        'default_bg_color' => 'bg-white',
        'default_text_color' => 'text-gray-900',
        'default_padding' => 'py-4 px-4 sm:px-6 lg:px-8',
        'default_shadow' => 'shadow-md',
        'default_height' => 'h-16',
        'default_link_text_color' => 'text-gray-700',
        'default_link_hover_text_color' => 'hover:text-blue-600',
        'default_link_padding' => 'px-3 py-2',
        'default_link_rounded' => 'rounded-md',
    ],
    'sidebar' => [
        'default_bg_color' => 'bg-gray-800',
        'default_text_color' => 'text-white',
        'default_width' => 'w-64',
        'default_padding' => 'py-4 px-3',
        'default_shadow' => 'shadow-lg',
        'default_link_text_color' => 'text-gray-300',
        'default_link_hover_bg' => 'hover:bg-gray-700',
        'default_link_hover_text_color' => 'hover:text-white',
        'default_link_padding' => 'py-2 px-3',
        'default_link_rounded' => 'rounded-md',
    ],
    'pagination' => [
        'default_alignment' => 'justify-center', // justify-start, justify-center, justify-end
        'default_item_padding' => 'px-3 py-2',
        'default_item_rounded' => 'rounded-md',
        'default_item_text_color' => 'text-gray-700',
        'default_item_bg_color' => 'bg-white',
        'default_item_border' => 'border border-gray-300',
        'default_item_hover_bg' => 'hover:bg-gray-100',
        'default_item_hover_text' => 'hover:text-gray-900',
        'active_item_bg_color' => 'bg-blue-600',
        'active_item_text_color' => 'text-white',
        'disabled_item_opacity' => 'opacity-50 cursor-not-allowed',
    ],
    'tabs' => [
        'default_alignment' => 'justify-start', // justify-start, justify-center, justify-end
        'default_tab_padding' => 'px-4 py-2',
        'default_tab_text_color' => 'text-gray-700',
        'default_tab_hover_text_color' => 'hover:text-blue-600',
        'default_tab_border_color' => 'border-gray-200',
        'active_tab_text_color' => 'text-blue-600',
        'active_tab_border_color' => 'border-blue-600',
        'default_panel_padding' => 'p-4',
        'default_panel_bg_color' => 'bg-white',
        'default_panel_border_color' => 'border-gray-200',
    ],
    // Nueva sección para la configuración de componentes, usada para el dashboard/showroom
    'components' => [
        'gcss-visual-button' => [
            'type' => 'primary',
            'size' => 'md',
            'rounded' => 'rounded-md',
            'bg_color' => 'bg-blue-600', // Nuevo
            'text_color' => 'text-white', // Nuevo
            'border_width' => 'border-0', // Nuevo
            'border_style' => 'border-solid', // Nuevo
            'border_color' => 'border-transparent', // Nuevo
            'shadow' => 'shadow-md', // Nuevo
            'hover_bg_color' => 'hover:bg-blue-700', // Nuevo
            'hover_text_color' => 'hover:text-white', // Nuevo
            'hover_border_color' => 'hover:border-transparent', // Nuevo
        ],
        // Aquí se añadirían las configuraciones por defecto de otros componentes
        // 'gcss-heading' => ['level' => 1],
        // 'gcss-card' => ['padding' => 'p-6'],
    ],
    'typography' => [
        'default_font_family' => 'font-sans', // Tailwind default font-sans
        'default_text_color' => 'text-gray-900',
        'headings' => [
            'h1' => [
                'font_size' => 'text-5xl',
                'font_weight' => 'font-extrabold',
                'line_height' => 'leading-tight',
                'text_color' => 'text-gray-900',
            ],
            'h2' => [
                'font_size' => 'text-4xl',
                'font_weight' => 'font-bold',
                'line_height' => 'leading-tight',
                'text_color' => 'text-gray-900',
            ],
            'h3' => [
                'font_size' => 'text-3xl',
                'font_weight' => 'font-semibold',
                'line_height' => 'leading-snug',
                'text_color' => 'text-gray-900',
            ],
            'h4' => [
                'font_size' => 'text-2xl',
                'font_weight' => 'font-medium',
                'line_height' => 'leading-normal',
                'text_color' => 'text-gray-900',
            ],
            'h5' => [
                'font_size' => 'text-xl',
                'font_weight' => 'font-medium',
                'line_height' => 'leading-relaxed',
                'text_color' => 'text-gray-900',
            ],
            'h6' => [
                'font_size' => 'text-lg',
                'font_weight' => 'font-medium',
                'line_height' => 'leading-relaxed',
                'text_color' => 'text-gray-900',
            ],
        ],
        'paragraph' => [
            'font_size' => 'text-base',
            'font_weight' => 'font-normal',
            'line_height' => 'leading-relaxed',
            'text_color' => 'text-gray-700',
        ],
        'blockquote' => [
            'font_size' => 'text-xl',
            'font_weight' => 'font-medium',
            'line_height' => 'leading-relaxed',
            'text_color' => 'text-gray-600',
            'border_left' => 'border-l-4 border-gray-300',
            'padding_left' => 'pl-4',
        ],
    ],
    'themes' => [
        'default' => [
            'primary_color_class' => 'blue', // Usará 'bg-blue-600', 'text-blue-600', etc.
            'secondary_color_class' => 'gray',
            'info_color_class' => 'sky',
            'success_color_class' => 'green',
            'warning_color_class' => 'yellow',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-gray-900',
            'bg_color_class' => 'bg-white',
            'border_color_class' => 'border-gray-200',
            'dark_mode_bg_class' => 'bg-gray-900',
            'dark_mode_text_class' => 'text-gray-100',
        ],
        'corporate_blue' => [
            'primary_color_class' => 'blue', // Tailwind's blue
            'secondary_color_class' => 'indigo',
            'info_color_class' => 'sky',
            'success_color_class' => 'emerald',
            'warning_color_class' => 'orange',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-gray-800',
            'bg_color_class' => 'bg-white',
            'border_color_class' => 'border-blue-300',
            'dark_mode_bg_class' => 'bg-gray-900',
            'dark_mode_text_class' => 'text-gray-100',
        ],
        'professional_green' => [
            'primary_color_class' => 'green', // Tailwind's green
            'secondary_color_class' => 'gray',
            'info_color_class' => 'teal',
            'success_color_class' => 'lime',
            'warning_color_class' => 'amber',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-gray-700',
            'bg_color_class' => 'bg-gray-50',
            'border_color_class' => 'border-green-200',
            'dark_mode_bg_class' => 'bg-gray-900',
            'dark_mode_text_class' => 'text-gray-100',
        ],
        'warm_elegant' => [
            'primary_color_class' => 'yellow', // Tailwind's yellow
            'secondary_color_class' => 'stone',
            'info_color_class' => 'orange',
            'success_color_class' => 'lime',
            'warning_color_class' => 'amber',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-stone-800',
            'bg_color_class' => 'bg-amber-50',
            'border_color_class' => 'border-stone-300',
            'dark_mode_bg_class' => 'bg-stone-900',
            'dark_mode_text_class' => 'text-stone-100',
        ],
        'modern_vibrant' => [
            'primary_color_class' => 'purple', // Tailwind's purple
            'secondary_color_class' => 'pink',
            'info_color_class' => 'fuchsia',
            'success_color_class' => 'emerald',
            'warning_color_class' => 'yellow',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-gray-900',
            'bg_color_class' => 'bg-white',
            'border_color_class' => 'border-purple-300',
            'dark_mode_bg_class' => 'bg-gray-900',
            'dark_mode_text_class' => 'text-gray-100',
        ],
        'minimalist_clear' => [
            'primary_color_class' => 'gray', // Tailwind's gray
            'secondary_color_class' => 'zinc',
            'info_color_class' => 'slate',
            'success_color_class' => 'green',
            'warning_color_class' => 'orange',
            'danger_color_class' => 'red',
            'text_color_class' => 'text-gray-700',
            'bg_color_class' => 'bg-white',
            'border_color_class' => 'border-gray-300',
            'dark_mode_bg_class' => 'bg-gray-900',
            'dark_mode_text_class' => 'text-gray-100',
        ],
    ],
    'active_theme' => 'default', // Nuevo: Tema activo por defecto
];

