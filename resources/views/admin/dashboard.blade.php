<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GCSS Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <x-gcss-heading level="1" class="mb-6">Panel de Administración GCSS</x-gcss-heading>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <x-gcss-info-box type="success" class="mb-4">
                <p>{{ session('success') }}</p>
            </x-gcss-info-box>
        @endif

        <x-gcss-tabs :tabs="[
            ['id' => 'general', 'label' => 'General', 'icon' => 'fas fa-sliders-h'],
            ['id' => 'config', 'label' => 'Configuración de Elementos', 'icon' => 'fas fa-cogs'],
            ['id' => 'showroom', 'label' => 'Showroom', 'icon' => 'fas fa-eye'],
        ]" active-tab="config"> {{-- Cambiado a 'config' para empezar --}}
            <x-slot name="panel_general">
                <x-gcss-section bg-color="bg-white" shadow="shadow-md" rounded="rounded-lg" class="mb-8">
                    <x-gcss-heading level="2" class="mb-4">Configuración General (Tipografía y Temas)</x-gcss-heading>

                    <form action="{{ route('admin.save-gcss-settings') }}" method="POST" x-data="{
                        activeTheme: '{{ config('gcss.active_theme') ?? 'default' }}'
                    }">
                        @csrf
                        <div class="mb-6">
                            <label for="active-theme" class="block text-sm font-medium text-gray-700">Seleccionar Tema:</label>
                            <select x-model="activeTheme" name="active_theme" id="active-theme" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                @foreach(config('gcss.themes') as $themeName => $themeConfig)
                                    <option value="{{ $themeName }}">{{ ucfirst(str_replace('_', ' ', $themeName)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            <x-gcss-visual-button type="primary" native-type="submit">
                                Aplicar Tema y Guardar
                            </x-gcss-visual-button>
                        </div>
                    </form>

                    <x-gcss-heading level="3" class="mt-8 mb-4">Paletas de Colores (WCAG)</x-gcss-heading>
                    <p class="mb-4 text-gray-600">Estas paletas cumplen con los estándares de accesibilidad WCAG para contraste.</p>

                    @foreach(config('gcss.themes') as $themeName => $themeConfig)
                        <x-gcss-card padding="p-4" bg-color="bg-gray-50" class="mb-4">
                            <x-gcss-heading level="4" class="mb-2">{{ ucfirst(str_replace('_', ' ', $themeName)) }}</x-gcss-heading>
                            <div class="flex flex-wrap gap-2">
                                @php
                                    $colorMap = config('gcss.tailwind_colors_hex');
                                @endphp
                                @foreach($themeConfig as $key => $value)
                                    @if(str_ends_with($key, '_color_class'))
                                        @php
                                            $baseColor = $value;
                                            $tailwindClass = 'bg-' . $baseColor . '-600'; // Asumimos shade 600 para preview
                                            if ($baseColor === 'white') $tailwindClass = 'bg-white border border-gray-200';
                                            if ($baseColor === 'black') $tailwindClass = 'bg-black';

                                            $textColor = (str_contains($tailwindClass, 'white') || str_contains($tailwindClass, 'gray-50') || str_contains($tailwindClass, 'gray-100')) ? 'text-gray-800' : 'text-white';
                                        @endphp
                                        <div class="w-16 h-16 {{ $tailwindClass }} {{ $textColor }} flex items-center justify-center rounded-md text-xs">
                                            {{ ucfirst($baseColor) }}
                                        </div>
                                    @endif
                                @endforeach
                                @php
                                    $baseBgClass = $themeConfig['bg_color_class'] ?? 'bg-white';
                                    $baseTextColorClass = $themeConfig['text_color_class'] ?? 'text-gray-900';
                                    $darkBgClass = $themeConfig['dark_mode_bg_class'] ?? 'bg-gray-900';
                                    $darkTextColorClass = 'text-gray-100'; // Default for dark mode text
                                @endphp
                                <div class="w-16 h-16 {{ $baseBgClass }} {{ $baseTextColorClass }} flex items-center justify-center rounded-md text-xs border border-gray-200">
                                    Base BG
                                </div>
                                <div class="w-16 h-16 {{ $darkBgClass }} {{ $darkTextColorClass }} flex items-center justify-center rounded-md text-xs">
                                    Dark BG
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">
                                Modo Noche: `{{ $themeConfig['dark_mode_bg_class'] ?? 'bg-gray-900' }}`, `{{ $themeConfig['dark_mode_text_class'] ?? 'text-gray-100' }}`
                            </p>
                        </x-gcss-card>
                    @endforeach

                    {{-- Aquí se configurará la tipografía global --}}
                    <x-gcss-heading level="3" class="mt-8 mb-4">Configuración de Tipografía Global</x-gcss-heading>
                    <p>Aquí puedes ajustar la fuente, tamaño base, colores de texto para headings, párrafos, etc.</p>
                    <pre class="bg-gray-100 p-4 rounded-md overflow-auto text-sm mt-4">{{ json_encode(config('gcss.typography'), JSON_PRETTY_PRINT) }}</pre>

                </x-gcss-section>
            </x-slot>

            <x-slot name="panel_config">
                <x-gcss-section bg-color="bg-white" shadow="shadow-md" rounded="rounded-lg" class="mb-8">
                    <x-gcss-heading level="2" class="mb-4">Configuración de Elementos</x-gcss-heading>
                    <p class="mb-4">Modifica los valores por defecto de tus componentes.</p>

                    {{-- Formulario para VisualButton --}}
                    @if(isset($components['VisualButton']))
                        <x-gcss-heading level="3" class="mt-8 mb-4">Componente: VisualButton</x-gcss-heading>
                        <form action="{{ route('admin.save-gcss-settings') }}" method="POST" x-data="{
                            // Función para convertir clase Tailwind a HEX
                            tailwindToHex: function(tailwindClass) {
                                if (!tailwindClass) return '#000000';
                                let cleanClass = tailwindClass.replace(/(bg-|text-|border-|hover:)/g, '');
                                const parts = cleanClass.split('-');
                                let baseColor = parts[0];
                                let shade = parts[1] || 'default';

                                const colorMap = {{ Js::from(config('gcss.tailwind_colors_hex', [])) }};

                                if (baseColor === 'transparent') return '#00000000';
                                if (baseColor === 'white') return '#ffffff';
                                if (baseColor === 'black') return '#000000';

                                return colorMap[baseColor] ? (colorMap[baseColor][shade] || '#000000') : '#000000';
                            },

                            // Inicializar valores de Alpine.js con los valores actuales de la configuración
                            buttonType: '{{ config('gcss.components.gcss-visual-button.type') ?? 'primary' }}',
                            buttonSize: '{{ config('gcss.components.gcss-visual-button.size') ?? 'md' }}',
                            buttonRounded: '{{ config('gcss.components.gcss-visual-button.rounded') ?? 'rounded-md' }}',
                            buttonBgColor: '{{ config('gcss.components.gcss-visual-button.bg_color') ?? 'bg-blue-600' }}',
                            buttonTextColor: '{{ config('gcss.components.gcss-visual-button.text_color') ?? 'text-white' }}',
                            buttonBorderWidth: '{{ config('gcss.components.gcss-visual-button.border_width') ?? 'border-0' }}',
                            buttonBorderStyle: '{{ config('gcss.components.gcss-visual-button.border_style') ?? 'border-solid' }}',
                            buttonBorderColor: '{{ config('gcss.components.gcss-visual-button.border_color') ?? 'border-transparent' }}',
                            buttonShadow: '{{ config('gcss.components.gcss-visual-button.shadow') ?? 'shadow-md' }}',
                            buttonHoverBgColor: '{{ config('gcss.components.gcss-visual-button.hover_bg_color') ?? 'hover:bg-blue-700' }}',
                            buttonHoverTextColor: '{{ config('gcss.components.gcss-visual-button.hover_text_color') ?? 'hover:text-white' }}',
                            buttonHoverBorderColor: '{{ config('gcss.components.gcss-visual-button.hover_border_color') ?? 'hover:border-transparent' }}',
                            buttonText: 'Ejemplo de Botón'
                        }">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                                <div>
                                    <label for="button-type" class="block text-sm font-medium text-gray-700">Tipo (Predefinido):</label>
                                    <select x-model="buttonType" name="components.gcss-visual-button.type" id="button-type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach($components['VisualButton']['type'] as $option)
                                            <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-size" class="block text-sm font-medium text-gray-700">Tamaño:</label>
                                    <select x-model="buttonSize" name="components.gcss-visual-button.size" id="button-size" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach($components['VisualButton']['size'] as $option)
                                            <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-rounded" class="block text-sm font-medium text-gray-700">Redondeado:</label>
                                    <select x-model="buttonRounded" name="components.gcss-visual-button.rounded" id="button-rounded" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach($components['VisualButton']['rounded'] as $option)
                                            <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Nuevos campos de configuración - Usando SELECT para clases de Tailwind --}}
                                <div>
                                    <label for="button-bg-color" class="block text-sm font-medium text-gray-700">Color de Fondo:</label>
                                    <select x-model="buttonBgColor" name="components.gcss-visual-button.bg_color" id="button-bg-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.bg', []) as $option)
                                            <option value="{{ $option }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') || '{{ $option }}'.includes('transparent') ? '#000' : '#fff'}`">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-text-color" class="block text-sm font-medium text-gray-700">Color de Texto:</label>
                                    <select x-model="buttonTextColor" name="components.gcss-visual-button.text_color" id="button-text-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.text', []) as $option)
                                            <option value="{{ $option }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') ? '#000' : '#fff'}`">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-border-width" class="block text-sm font-medium text-gray-700">Ancho de Borde:</label>
                                    <select x-model="buttonBorderWidth" name="components.gcss-visual-button.border_width" id="button-border-width" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.buttons.border_widths') as $option)
                                            <option value="{{ $option }}">{{ ucfirst(str_replace('border-', '', $option)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-border-style" class="block text-sm font-medium text-gray-700">Estilo de Borde:</label>
                                    <select x-model="buttonBorderStyle" name="components.gcss-visual-button.border_style" id="button-border-style" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.buttons.border_styles') as $option)
                                            <option value="{{ $option }}">{{ ucfirst(str_replace('border-', '', $option)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-border-color" class="block text-sm font-medium text-gray-700">Color de Borde:</label>
                                    <select x-model="buttonBorderColor" name="components.gcss-visual-button.border_color" id="button-border-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.border', []) as $option)
                                            <option value="{{ $option }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') || '{{ $option }}'.includes('transparent') ? '#000' : '#fff'}`">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-shadow" class="block text-sm font-medium text-gray-700">Sombra:</label>
                                    <select x-model="buttonShadow" name="components.gcss-visual-button.shadow" id="button-shadow" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.buttons.shadows') ?? [] as $option)
                                            <option value="{{ $option }}">{{ ucfirst(str_replace('shadow-', '', $option)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Hover States --}}
                                <div>
                                    <label for="button-hover-bg-color" class="block text-sm font-medium text-gray-700">Hover BG Color:</label>
                                    <select x-model="buttonHoverBgColor" name="components.gcss-visual-button.hover_bg_color" id="button-hover-bg-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.bg', []) as $option)
                                            <option value="hover:{{ str_replace('bg-', '', $option) }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') || '{{ $option }}'.includes('transparent') ? '#000' : '#fff'}`">hover:{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-hover-text-color" class="block text-sm font-medium text-gray-700">Hover Text Color:</label>
                                    <select x-model="buttonHoverTextColor" name="components.gcss-visual-button.hover_text_color" id="button-hover-text-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.text', []) as $option)
                                            <option value="hover:{{ str_replace('text-', '', $option) }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') ? '#000' : '#fff'}`">hover:{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="button-hover-border-color" class="block text-sm font-medium text-gray-700">Hover Border Color:</label>
                                    <select x-model="buttonHoverBorderColor" name="components.gcss-visual-button.hover_border_color" id="button-hover-border-color" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        @foreach(config('gcss.tailwind_color_classes.border', []) as $option)
                                            <option value="hover:{{ str_replace('border-', '', $option) }}" :style="`background-color: ${tailwindToHex('{{ $option }}')}; color: ${tailwindToHex('{{ $option }}').startsWith('#000') || tailwindToHex('{{ $option }}').startsWith('#fff') || '{{ $option }}'.includes('transparent') ? '#000' : '#fff'}`">hover:{{ $option }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-gcss-heading level="4" class="mb-3">Previsualización:</x-gcss-heading>
                            <div class="text-center p-4 border border-gray-200 rounded-md bg-white mb-6">
                                <x-gcss-visual-button
                                    :type="buttonType"
                                    :size="buttonSize"
                                    :rounded="buttonRounded"
                                    :bg-color="buttonBgColor"
                                    :text-color="buttonTextColor"
                                    :border-width="buttonBorderWidth"
                                    :border-style="buttonBorderStyle"
                                    :border-color="buttonBorderColor"
                                    :shadow="buttonShadow"
                                    :hover-bg-color="buttonHoverBgColor"
                                    :hover-text-color="buttonHoverTextColor"
                                    :hover-border-color="buttonHoverBorderColor"
                                    text="{{ 'Ejemplo de Botón' }}"
                                    icon="{{ 'fas fa-magic' }}"
                                />
                            </div>

                            <div class="text-right">
                                <x-gcss-visual-button type="primary" native-type="submit">
                                    Guardar Configuración de Botón
                                </x-gcss-visual-button>
                            </div>
                        </form>
                    @else
                        <x-gcss-info-box type="warning">
                            <p>No se encontró la metadata para VisualButton. Asegúrate de que el componente tenga una propiedad estática `$options` definida.</p>
                        </x-gcss-info-box>
                    @endif

                    {{-- Aquí se añadirían formularios para otros componentes --}}

                </x-gcss-section>
            </x-slot>

            <x-slot name="panel_showroom">
                <x-gcss-section bg-color="bg-white" shadow="shadow-md" rounded="rounded-lg" class="mb-8">
                    <x-gcss-heading level="2" class="mb-4">Showroom de Componentes</x-gcss-heading>
                    <p>Aquí podrás seleccionar un componente, cambiar sus opciones y ver el código para usarlo.</p>
                    <div class="bg-gray-50 p-4 rounded-md mt-4">
                        <x-gcss-heading level="3" class="mb-2">Selecciona un Componente:</x-gcss-heading>
                        <select id="component-selector" name="component_selector" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">-- Seleccionar --</option>
                            @foreach($components as $componentName => $componentOptions)
                                <option value="{{ $componentName }}">{{ $componentName }}</option>
                            @endforeach
                        </select>
                        <p class="mt-4 text-gray-600">El showroom interactivo se construirá aquí.</p>
                    </div>
                </x-gcss-section>
            </x-slot>
        </x-gcss-tabs>

        {{-- Sección de Paletas de Colores WCAG (se moverá a la pestaña General más adelante) --}}
        <x-gcss-section bg-color="bg-white" shadow="shadow-md" rounded="rounded-lg" class="mb-8">
            <x-gcss-heading level="2" class="mb-4">Paletas de Colores (WCAG)</x-gcss-heading>
            <p class="mb-4 text-gray-600">Estas paletas cumplen con los estándares de accesibilidad WCAG para contraste.</p>

            @foreach(config('gcss.themes') as $themeName => $themeConfig)
                <x-gcss-card padding="p-4" bg-color="bg-gray-50" class="mb-4">
                    <x-gcss-heading level="4" class="mb-2">{{ ucfirst(str_replace('_', ' ', $themeName)) }}</x-gcss-heading>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $colorMap = config('gcss.tailwind_colors_hex');
                        @endphp
                        @foreach($themeConfig as $key => $value)
                            @if(str_ends_with($key, '_color_class'))
                                @php
                                    $baseColor = $value;
                                    $tailwindClass = 'bg-' . $baseColor . '-600'; // Asumimos shade 600 para preview
                                    if ($baseColor === 'white') $tailwindClass = 'bg-white border border-gray-200';
                                    if ($baseColor === 'black') $tailwindClass = 'bg-black';

                                    $textColor = (str_contains($tailwindClass, 'white') || str_contains($tailwindClass, 'gray-50') || str_contains($tailwindClass, 'gray-100')) ? 'text-gray-800' : 'text-white';
                                @endphp
                                <div class="w-16 h-16 {{ $tailwindClass }} {{ $textColor }} flex items-center justify-center rounded-md text-xs">
                                    {{ ucfirst($baseColor) }}
                                </div>
                            @endif
                        @endforeach
                        @php
                            $baseBgClass = $themeConfig['bg_color_class'] ?? 'bg-white';
                            $baseTextColorClass = $themeConfig['text_color_class'] ?? 'text-gray-900';
                            $darkBgClass = 'bg-gray-900'; // Default for dark mode bg
                            $darkTextColorClass = 'text-gray-100'; // Default for dark mode text
                        @endphp
                        <div class="w-16 h-16 {{ $baseBgClass }} {{ $baseTextColorClass }} flex items-center justify-center rounded-md text-xs border border-gray-200">
                            Base BG
                        </div>
                        <div class="w-16 h-16 {{ $darkBgClass }} {{ $darkTextColorClass }} flex items-center justify-center rounded-md text-xs">
                            Dark BG
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">
                        Modo Noche: `{{ $themeConfig['dark_mode_bg_class'] ?? 'bg-gray-900' }}`, `{{ $themeConfig['dark_mode_text_class'] ?? 'text-gray-100' }}`
                    </p>
                </x-gcss-card>
            @endforeach

            <x-gcss-heading level="3" class="mt-8 mb-4">Configuración de Tipografía Global</x-gcss-heading>
            <p>Aquí puedes ajustar la fuente, tamaño base, colores de texto para headings, párrafos, etc.</p>
            <pre class="bg-gray-100 p-4 rounded-md overflow-auto text-sm mt-4">{{ json_encode(config('gcss.typography'), JSON_PRETTY_PRINT) }}</pre>

        </x-gcss-section>

    </div>
</body>
</html>

