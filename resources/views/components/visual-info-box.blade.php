{{-- resources/views/components/visual-info-box.blade.php --}}

<div {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <div class="flex-shrink-0 {{ $iconColor }} mr-3">
            <i class="{{ $icon }} text-xl"></i>
        </div>
    @endif
    <div class="flex-grow">
        @if($title)
            <x-gcss-heading level="4" class="font-semibold mb-1">{{ $title }}</x-gcss-heading>
        @endif
        {{ $slot }}
    </div>
</div>

