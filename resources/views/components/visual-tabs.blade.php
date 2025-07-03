{{-- resources/views/components/visual-tabs.blade.php --}}

<div x-data="{ activeTab: '{{ $activeTab }}' }">
    {{-- Navegación de Pestañas --}}
    <div class="flex border-b {{ $tabBorderColor }} {{ $alignment }}">
        @foreach($tabs as $tab)
            <button
                @click="activeTab = '{{ $tab['id'] }}'"
                class="{{ $tabItemClasses }}
                    @if(isset($tab['icon']))
                        {{-- Si hay ícono, añadir margen --}}
                    @endif
                    @if($tab['id'] == $activeTab)
                        {{ $activeTabTextColor }} border-b-2 {{ $activeTabBorderColor }}
                    @else
                        {{ $tabTextColor }} {{ $tabHoverTextColor }}
                    @endif"
                :class="{
                    '{{ $activeTabTextColor }} border-b-2 {{ $activeTabBorderColor }}': activeTab === '{{ $tab['id'] }}',
                    '{{ $tabTextColor }} {{ $tabHoverTextColor }}': activeTab !== '{{ $tab['id'] }}'
                }"
                role="tab"
                aria-controls="panel-{{ $tab['id'] }}"
                aria-selected="{{ $tab['id'] == $activeTab ? 'true' : 'false' }}"
            >
                @if(isset($tab['icon']))
                    <i class="{{ $tab['icon'] }} mr-2"></i>
                @endif
                {{ $tab['label'] }}
            </button>
        @endforeach
    </div>

    {{-- Contenido de los Paneles --}}
    <div class="{{ $panelClasses }}">
        @foreach($tabs as $tab)
            <div x-show="activeTab === '{{ $tab['id'] }}'"
                 id="panel-{{ $tab['id'] }}"
                 role="tabpanel"
                 aria-labelledby="tab-{{ $tab['id'] }}"
                 style="display: none;"> {{-- Oculto por defecto para x-show --}}
                {{ ${'panel_' . $tab['id']} ?? '' }} {{-- Renderiza el slot dinámico para cada panel --}}
            </div>
        @endforeach
    </div>
</div>

