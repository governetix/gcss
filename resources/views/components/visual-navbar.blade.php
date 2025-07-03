{{-- resources/views/components/visual-navbar.blade.php --}}

<nav {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex items-center justify-between w-full max-w-7xl mx-auto">
        {{-- Slot para el logo o título de la izquierda --}}
        <div class="flex-shrink-0">
            {{ $logo ?? 'Logo' }}
        </div>

        {{-- Elementos de navegación principales (para desktop) --}}
        <div class="hidden md:flex space-x-4">
            @foreach($links as $link)
                <a href="{{ $link['url'] ?? '#' }}" class="{{ $linkClasses }}">
                    @if(isset($link['icon']))
                        <i class="{{ $link['icon'] }} mr-2"></i>
                    @endif
                    {{ $link['text'] ?? '' }}
                </a>
            @endforeach
            {{ $slot }} {{-- Mantenemos el slot por si se necesita añadir algo extra --}}
        </div>

        {{-- Slot para elementos de la derecha (ej. botones de usuario, búsqueda) --}}
        <div class="hidden md:flex items-center space-x-4">
            {{ $right_content ?? '' }}
        </div>

        {{-- Botón de hamburguesa para móviles --}}
        <div class="md:hidden flex items-center">
            {{ $mobile_toggle ?? '' }} {{-- Puedes poner aquí un botón o un slot para el toggle --}}
        </div>
    </div>
</nav>