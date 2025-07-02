{{-- resources/views/components/visual-heading.blade.php --}}

{{-- El tag del encabezado será dinámico (h1, h2, etc.) --}}
<h{{ $level }} {{ $attributes->merge(['class' => $classes]) }}>
    {{-- Si se pasa contenido como prop, úsalo. Si no, usa el slot. --}}
    {{ $content ?? $slot }}
</h{{ $level }}>

