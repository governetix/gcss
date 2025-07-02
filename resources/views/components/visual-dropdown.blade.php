{{-- resources/views/components/visual-dropdown.blade.php --}}

<div x-data="{ open: false }" @click.away="open = false" class="{{ $containerClasses }}">
    {{-- Trigger del Dropdown --}}
    <div @click="open = !open">
        @if($triggerType === 'button')
            <x-gcss-visual-button>
                @if($triggerIcon)<i class="{{ $triggerIcon }} @if($triggerText) mr-2 @endif"></i>@endif
                {{ $triggerText ?? 'Opciones' }}
                <i class="fas fa-chevron-down ml-2 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
            </x-gcss-visual-button>
        @else {{-- default to link --}}
            <a href="#" class="inline-flex items-center text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                @if($triggerIcon)<i class="{{ $triggerIcon }} @if($triggerText) mr-2 @endif"></i>@endif
                {{ $triggerText ?? 'Opciones' }}
                <i class="fas fa-chevron-down ml-2 text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
            </a>
        @endif
    </div>

    {{-- Menú del Dropdown --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="{{ $menuClasses }}"
         style="display: none;"> {{-- Oculto por defecto para x-show --}}
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            {{ $slot }} {{-- Aquí irá el contenido de los ítems del dropdown --}}
        </div>
    </div>
</div>

{{-- Script para Alpine.js (si no lo tienes globalmente) --}}
{{-- Si ya usas Alpine.js en tu app.js, puedes omitir esto. --}}
<script>
    document.addEventListener('alpine:init', () => {
        // Alpine.js ya está inicializado si llegamos aquí
        // No es necesario añadir código adicional si ya tienes Alpine en tu app.js
    });
</script>

