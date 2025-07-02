{{-- resources/views/components/visual-divider.blade.php --}}

@php
    // Las clases de línea se aplicarán a los divs que simulan la línea horizontal
    $lineClasses = implode(' ', [
        $height,
        $color,
        'flex-grow',
        'rounded-full', // Para que los extremos de la línea sean redondeados
        $lineStyle, // border-solid, border-dashed, border-dotted, etc.
        'border-t', // Aplicar el borde superior para simular la línea
    ]);
@endphp

<div {{ $attributes->merge(['class' => 'relative flex items-center ' . $margin]) }}>
    <div class="{{ $lineClasses }}"></div>

    @if($box)
        <div class="{{ $boxClasses }} mx-4">
            @if($icon)
                <i class="{{ $icon }} {{ $iconColor }} {{ $iconSize }} @if($text) mr-2 @endif"></i>
            @endif
            @if($text)
                <span class="font-medium">{{ $text }}</span>
            @endif
        </div>
    @elseif($icon || $text) {{-- Si no hay caja, pero hay ícono o texto --}}
        <span class="px-4 {{ $boxText }}">
            @if($icon)
                <i class="{{ $icon }} {{ $iconColor }} {{ $iconSize }} @if($text) mr-2 @endif"></i>
            @endif
            @if($text)
                <span class="font-medium">{{ $text }}</span>
            @endif
        </span>
    @endif

    <div class="{{ $lineClasses }}"></div>
</div>