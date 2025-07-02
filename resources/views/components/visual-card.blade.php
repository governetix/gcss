{{-- resources/views/components/visual-card.blade.php --}}

<div
    {{ $attributes->merge([
        'class' => $classes . ($bgImage ? ' ' . $bgImageClasses : ''),
        'style' => $inlineStyle,
    ]) }}
>
    @if($bgImage)
        {{-- Capa de superposición para mejorar la legibilidad del texto sobre la imagen --}}
        <div class="absolute inset-0 bg-black opacity-30 {{ $rounded }}"></div>
    @endif

    {{-- Círculo de ícono posicionado sobre el borde --}}
    @if($icon && $iconCircle && $iconCircleClasses)
        <div class="{{ $iconCircleClasses }}">
            <i class="{{ $icon }}"></i>
        </div>
    @endif

    {{-- Contenido de la tarjeta --}}
    <div class="relative z-10"> {{-- z-10 para que el contenido esté sobre la imagen y el overlay --}}
        @if($icon && !$iconCircle && in_array($iconPosition, ['top-center', 'bottom-right', 'overlay-top-right']))
            {{-- Íconos con posicionamiento absoluto (sin círculo) --}}
            <i class="{{ $icon }} {{ config('gcss.cards.icon_positions.' . $iconPosition) }}"></i>
        @endif

        {{-- Contenido principal de la tarjeta --}}
        {{ $slot }}

        @if($icon && !$iconCircle && in_array($iconPosition, ['left', 'right']))
            {{-- Íconos en línea con el contenido (si se usa slot, el usuario puede ponerlo donde quiera) --}}
            {{-- Aquí se asume que el slot contendrá el texto principal y el ícono se añadirá al lado --}}
            {{-- Si no hay slot y se pasa texto, se podría manejar aquí, pero es más flexible dejarlo al slot --}}
        @endif
    </div>
</div>

