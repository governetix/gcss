{{-- resources/views/components/visual-section.blade.php --}}

<section {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</section>

