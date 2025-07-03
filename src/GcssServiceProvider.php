<?php

namespace Governetix\Gcss;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Governetix\Gcss\View\Components\VisualHeading;
use Governetix\Gcss\View\Components\VisualCard;
use Governetix\Gcss\View\Components\VisualSection;
use Governetix\Gcss\View\Components\VisualFlexGrid;
use Governetix\Gcss\View\Components\VisualDivider;
use Governetix\Gcss\View\Components\VisualInfoBox;
use Governetix\Gcss\View\Components\VisualDropdown;
use Governetix\Gcss\View\Components\VisualNavbar;
use Governetix\Gcss\View\Components\VisualSidebar;
use Governetix\Gcss\View\Components\VisualPagination;
use Governetix\Gcss\View\Components\VisualTabs;
use Governetix\Gcss\Models\GcssSetting;

class GcssServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/gcss.php', 'gcss'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Cargar configuraciones desde la BD y fusionarlas.
        // Esto debe ocurrir DESPUÉS de mergeConfigFrom para que los valores de la BD tengan prioridad.
        try {
            if (Schema::hasTable('gcss_settings')) {
                $settings = GcssSetting::all()->pluck('value', 'key');

                if ($settings->isNotEmpty()) {
                    foreach ($settings as $key => $value) {
                        // CORRECCIÓN: Eliminada la comilla simple extra aquí
                        $decodedValue = is_string($value) && (str_starts_with($value, '{') || str_starts_with($value, '[')) ? json_decode($value, true) : $value;
                        config()->set("gcss.{$key}", $decodedValue);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::warning('GCSS: No se pudieron cargar las configuraciones de la base de datos. ' . $e->getMessage());
        }

        // Aplicar el tema activo (esto sobrescribe los valores si el tema es diferente a 'default')
        $activeThemeName = config('gcss.active_theme', 'default');
        $themeConfig = config("gcss.themes.{$activeThemeName}");

        if ($activeThemeName !== 'default' && $themeConfig) {
            // Actualizar los colores base de Tailwind según el tema
            foreach ([
                'primary', 'secondary', 'info', 'success', 'warning', 'danger',
            ] as $colorKey) {
                $configKey = "{$colorKey}_color_class";
                if (isset($themeConfig[$configKey])) {
                    config()->set("gcss.colors.{$colorKey}", $themeConfig[$configKey]);
                }
            }

            // Actualizar otras propiedades globales del tema
            config()->set('gcss.typography.default_text_color', $themeConfig['text_color_class'] ?? 'text-gray-900');
            config()->set('gcss.sections.default_bg_color', $themeConfig['bg_color_class'] ?? 'bg-white');
            config()->set('gcss.sections.default_text_color', $themeConfig['text_color_class'] ?? 'text-gray-900');

            // Lógica para actualizar las clases de los componentes a los nuevos colores del tema
            // Esto es un ejemplo simplificado. Para un sistema completo, podrías tener una clase
            // de "ThemeManager" que reconstruya todas las clases de Tailwind basadas en el tema activo.

            // Botones
            $defaultButtonBg = 'bg-' . config('gcss.colors.primary') . '-600';
            $defaultButtonText = 'text-' . config('gcss.typography.default_text_color');
            $defaultButtonHoverBg = 'hover:bg-' . config('gcss.colors.primary') . '-700';
            $defaultButtonHoverText = 'hover:text-' . config('gcss.typography.default_text_color');

            config()->set('gcss.buttons.default_bg_color', $defaultButtonBg);
            config()->set('gcss.buttons.default_text_color', $defaultButtonText);
            config()->set('gcss.buttons.default_hover_bg_color', $defaultButtonHoverBg);
            config()->set('gcss.buttons.default_hover_text_color', $defaultButtonHoverText);

            // Actualizar los tipos de botón predefinidos para usar los colores del tema
            $buttonTypes = config('gcss.buttons.types');
            foreach ($buttonTypes as $typeKey => &$typeConfig) {
                // Esto es una simplificación. Un mapeo más inteligente podría ser necesario.
                if ($typeKey === 'primary') {
                    $typeConfig['bg'] = 'bg-' . config('gcss.colors.primary') . '-600';
                    $typeConfig['text'] = 'text-white';
                    $typeConfig['hover_bg'] = 'hover:bg-' . config('gcss.colors.primary') . '-700';
                    $typeConfig['hover_text'] = 'hover:text-white';
                } elseif ($typeKey === 'secondary') {
                    $typeConfig['bg'] = 'bg-' . config('gcss.colors.secondary') . '-200';
                    $typeConfig['text'] = 'text-' . config('gcss.colors.secondary') . '-800';
                    $typeConfig['hover_bg'] = 'hover:bg-' . config('gcss.colors.secondary') . '-300';
                    $typeConfig['hover_text'] = 'hover:text-' . config('gcss.colors.secondary') . '-900';
                }
                // ... y así para otros tipos si es necesario
            }
            config()->set('gcss.buttons.types', $buttonTypes);

            // Replicar lógica similar para otros componentes que usan colores temáticos
            // Info Boxes
            $infoBoxTypes = config('gcss.info_boxes.types');
            foreach ($infoBoxTypes as $typeKey => &$typeConfig) {
                $baseColor = config('gcss.colors.' . str_replace(['info', 'success', 'warning', 'danger'], ['blue', 'green', 'yellow', 'red'], $typeKey));
                if ($baseColor) {
                    $typeConfig['bg'] = 'bg-' . $baseColor . '-100';
                    $typeConfig['text'] = 'text-' . $baseColor . '-800';
                    $typeConfig['border'] = 'border-border-' . $baseColor . '-400';
                    $typeConfig['icon_color'] = 'text-' . $baseColor . '-500';
                }
            }
            config()->set('gcss.info_boxes.types', $infoBoxTypes);

            // Navbar
            config()->set('gcss.navbar.default_bg_color', 'bg-' . config('gcss.colors.primary') . '-600');
            config()->set('gcss.navbar.default_text_color', 'text-white');
            config()->set('gcss.navbar.default_link_hover_text_color', 'hover:text-' . config('gcss.colors.secondary') . '-300');

            // Sidebar
            config()->set('gcss.sidebar.default_bg_color', 'bg-' . config('gcss.colors.secondary') . '-800');
            config()->set('gcss.sidebar.default_link_hover_bg', 'hover:bg-' . config('gcss.colors.secondary') . '-700');
            config()->set('gcss.sidebar.default_text_color', 'text-white');

            // Pagination
            config()->set('gcss.pagination.active_item_bg_color', 'bg-' . config('gcss.colors.primary') . '-600');
            config()->set('gcss.pagination.active_item_text_color', 'text-white');
            config()->set('gcss.pagination.default_item_text_color', config('gcss.typography.default_text_color'));

            // Tabs
            config()->set('gcss.tabs.active_tab_text_color', 'text-' . config('gcss.colors.primary') . '-600');
            config()->set('gcss.tabs.active_tab_border_color', 'border-' . config('gcss.colors.primary') . '-600');
            config()->set('gcss.tabs.default_tab_text_color', config('gcss.typography.default_text_color'));

            // Typography
            $typographyHeadings = config('gcss.typography.headings');
            foreach ($typographyHeadings as $level => &$headingConfig) {
                $headingConfig['text_color'] = config('gcss.typography.default_text_color');
            }
            config()->set('gcss.typography.headings', $typographyHeadings);
            config()->set('gcss.typography.paragraph.text_color', config('gcss.typography.default_text_color'));
            config()->set('gcss.typography.blockquote.text_color', config('gcss.typography.default_text_color'));
            config()->set('gcss.typography.blockquote.border_left', 'border-l-4 border-' . config('gcss.colors.secondary') . '-300');
        }


        // Cargar las rutas del paquete
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Cargar las migraciones del paquete
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        // Cargar las vistas del paquete, con el namespace 'gcss'
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gcss');

        // Cargar las traducciones del paquete
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gcss');

        // Publicar la configuración del paquete
        $this->publishes([
            __DIR__.'/../config/gcss.php' => config_path('gcss.php'),
        ], 'gcss-config');

        // Publicar los assets (CSS y JS) del paquete
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/gcss'),
        ], 'gcss-assets');

        // Publicar las vistas (componentes Blade) del paquete
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/gcss'),
        ], 'gcss-views');

        // Publicar los archivos de idioma del paquete
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gcss'),
        ], 'gcss-lang');

        // Etiqueta para publicar todo el contenido del paquete
        $this->publishes([
            __DIR__.'/../config/gcss.php' => config_path('gcss.php'),
            __DIR__.'/../public' => public_path('vendor/gcss'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/gcss'),
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gcss'),
        ], 'gcss-all');

        // Registrar los componentes Blade
        Blade::component('gcss-visual-button', \Governetix\Gcss\View\Components\VisualButton::class);
        Blade::component('gcss-heading', VisualHeading::class);
        Blade::component('gcss-card', VisualCard::class);
        Blade::component('gcss-section', VisualSection::class);
        Blade::component('gcss-flex-grid', VisualFlexGrid::class);
        Blade::component('gcss-divider', VisualDivider::class);
        Blade::component('gcss-info-box', VisualInfoBox::class);
        Blade::component('gcss-dropdown', VisualDropdown::class);
        Blade::component('gcss-navbar', VisualNavbar::class);
        Blade::component('gcss-sidebar', VisualSidebar::class);
        Blade::component('gcss-pagination', VisualPagination::class);
        Blade::component('gcss-tabs', VisualTabs::class);
    }
}

