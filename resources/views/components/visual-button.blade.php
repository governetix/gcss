{{-- resources/views/components/visual-button.blade.php --}}

<button {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        {{-- Aquí puedes integrar Font Awesome, Lucide React o cualquier librería de íconos --}}
        {{-- Por ejemplo, si usas Font Awesome: --}}
        <i class="{{ $icon }} @if($text || $slot->isNotEmpty()) mr-2 @endif"></i>
    @endif
    {{-- Si se pasa texto como prop, úsalo. Si no, usa el slot. Si no hay ninguno, usa la traducción por defecto. --}}
    {{ $text ?? ($slot->isNotEmpty() ? $slot : __('gcss::button_default_text')) }}
</button>
