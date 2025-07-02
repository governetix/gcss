{{-- resources/views/components/visual-flex-grid.blade.php --}}

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>