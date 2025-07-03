{{-- resources/views/components/visual-sidebar.blade.php --}}

<aside {{ $attributes->merge(['class' => $classes]) }}>
    {{-- Slot para el logo/título del sidebar --}}
    @if(isset($header))
        <div class="mb-6">
            {{ $header }}
        </div>
    @endif

    {{-- Elementos de navegación principales --}}
    <nav class="flex-grow">
        <ul class="space-y-2">
            @foreach($links as $link)
                <li>
                    <a href="{{ $link['url'] ?? '#' }}" class="{{ $linkClasses }}">
                        @if(isset($link['icon']))
                            <i class="{{ $link['icon'] }} mr-2"></i>
                        @endif
                        {{ $link['text'] ?? '' }}
                    </a>
                </li>
            @endforeach
            {{ $slot }} {{-- Mantenemos el slot por si se necesita añadir algo extra --}}
        </ul>
    </nav>

    {{-- Slot para el footer del sidebar (ej. información de usuario, copyright) --}}
    @if(isset($footer))
        <div class="mt-auto pt-6 border-t border-gray-700">
            {{ $footer }}
        </div>
    @endif
</aside>