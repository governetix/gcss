{{-- resources/views/components/visual-sidebar.blade.php --}}

<?php
    $componentClass = (string) ($class ?? '');
    $existingClass = (string) ($attributes->get('class') ?? '');
    $combinedClass = trim($existingClass . ' ' . $componentClass);
    $linkClasses = 'flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
?>
<aside {{ $attributes }} class="{{ $combinedClass }}">
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