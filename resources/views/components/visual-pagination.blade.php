<?php
    $itemBaseClasses = 'relative inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-300 bg-white text-gray-700 leading-5 focus:z-10 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300';
    $disabledItemOpacity = 'opacity-50 cursor-not-allowed';
    $itemHoverBg = 'hover:bg-gray-50';
    $itemHoverText = 'hover:text-gray-700';
    $activeItemBgColor = 'bg-blue-600';
    $activeItemTextColor = 'text-white';
    $urlPrefix = '#'; // Placeholder, idealmente debería ser dinámico basado en la ruta
?>
<nav {{ $attributes->merge(['class' => 'flex items-center ' . $alignment]) }} aria-label="Pagination">
    <div class="relative z-0 inline-flex shadow-sm -space-x-px">
        {{-- Enlace a la página anterior --}}
        <a href="{{ $currentPage > 1 ? $urlPrefix . ($currentPage - 1) : '#' }}"
           class="{{ $itemBaseClasses }} {{ $currentPage <= 1 ? $disabledItemOpacity : ($itemHoverBg . ' ' . $itemHoverText) }}"
           @if($currentPage <= 1) aria-disabled="true" @endif>
            <span class="sr-only">Previous</span>
            <i class="fas fa-chevron-left h-5 w-5"></i>
        </a>

        {{-- Enlaces a las páginas --}}
        @for ($i = 1; $i <= $lastPage; $i++)
            <a href="{{ $urlPrefix . $i }}"
               class="{{ $itemBaseClasses }}
                   @if($i == $currentPage)
                       {{ $activeItemBgColor }} {{ $activeItemTextColor }}
                   @else
                       {{ $itemHoverBg }} {{ $itemHoverText }}
                   @endif"
               aria-current="{{ $i == $currentPage ? 'page' : 'false' }}">
                {{ $i }}
            </a>
        @endfor

        {{-- Enlace a la página siguiente --}}
        <a href="{{ $currentPage < $lastPage ? $urlPrefix . ($currentPage + 1) : '#' }}"
           class="{{ $itemBaseClasses }} {{ $currentPage >= $lastPage ? $disabledItemOpacity : ($itemHoverBg . ' ' . $itemHoverText) }}"
           @if($currentPage >= $lastPage) aria-disabled="true" @endif>
            <span class="sr-only">Next</span>
            <i class="fas fa-chevron-right h-5 w-5"></i>
        </a>
    </div>
</nav>

