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
use Governetix\Gcss\View\Components\VisualParagraph;
use Governetix\Gcss\View\Components\VisualList;
use Governetix\Gcss\View\Components\VisualBlockquote;
use Governetix\Gcss\View\Components\FormInput;
use Governetix\Gcss\View\Components\FormTextarea;
use Governetix\Gcss\View\Components\FormSelect;
use Governetix\Gcss\View\Components\FormCheckbox;
use Governetix\Gcss\View\Components\FormRadio;
use Governetix\Gcss\View\Components\FormLabel;
use Governetix\Gcss\View\Components\FormError;
use Governetix\Gcss\View\Components\VisualTable;
use Governetix\Gcss\View\Components\VisualKpi;
use Governetix\Gcss\View\Components\VisualChart;
use Governetix\Gcss\View\Components\VisualAlert;
use Governetix\Gcss\View\Components\VisualNotification;
use Governetix\Gcss\View\Components\VisualModal;
use Governetix\Gcss\View\Components\VisualTooltip;
use Governetix\Gcss\View\Components\VisualSpinner;
use Governetix\Gcss\View\Components\VisualEmptyState;
use Governetix\Gcss\View\Components\VisualHeroSection;
use Governetix\Gcss\View\Components\VisualCtaSection;
use Governetix\Gcss\View\Components\VisualMapSection;
use Governetix\Gcss\View\Components\VisualFeatureGrid;
use Governetix\Gcss\View\Components\VisualTestimonialSlider;
use Illuminate\Support\Facades\Gate;
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
        // Fusionar la configuración por defecto del paquete con la del usuario
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
        // Los valores de la BD tienen la más alta prioridad sobre los del archivo gcss.php.
        try {
            if (Schema::hasTable('gcss_settings')) {
                $settings = GcssSetting::all()->pluck('value', 'key');

                if ($settings->isNotEmpty()) {
                    foreach ($settings as $key => $value) {
                        // El cast 'array' en el modelo GcssSetting ya decodifica el JSON automáticamente.
                        // Así que $value ya debería ser un array o el tipo original si no era JSON.
                        config()->set("gcss.{$key}", $value);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::warning('GCSS: No se pudieron cargar las configuraciones de la base de datos. ' . $e->getMessage());
        }

        // Aplicar el tema activo. Esto debe ocurrir DESPUÉS de cargar los settings de la BD,
        // para que los settings de la BD puedan ser sobrescritos por el tema,
        // O si el tema es 'default', no sobrescriba los settings de la BD.
        $activeThemeName = config('gcss.active_theme', 'default');
        $themeConfig = config("gcss.themes.{$activeThemeName}");

        if ($themeConfig) { // Siempre aplicamos el tema, incluso el 'default'
            // Obtener la configuración actual de gcss
            $gcssConfig = config('gcss');

            // Función auxiliar para fusionar arrays recursivamente, dando prioridad a los valores de la fuente
            $mergeRecursive = function (array $target, array $source): array {
                foreach ($source as $key => $value) {
                    if (is_array($value) && isset($target[$key]) && is_array($target[$key])) {
                        $target[$key] = $this->mergeRecursive($target[$key], $value);
                    } else {
                        $target[$key] = $value;
                    }
                }
                return $target;
            };

            // Aplicar los valores del tema a la configuración de gcss
            // Esto sobrescribirá los colores base y otras propiedades globales del tema.
            // NOTA: Aquí estamos sobrescribiendo la configuración completa con el tema.
            // Si queremos que los settings de la BD tengan prioridad sobre el tema,
            // la lógica sería más compleja, aplicando el tema primero, y luego los settings de la BD.
            // Por ahora, el tema sobrescribe todo lo que define.
            $gcssConfig = $mergeRecursive($gcssConfig, $themeConfig);

            // Guardar la configuración fusionada de nuevo en el runtime de Laravel
            config()->set('gcss', $gcssConfig);
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
        Blade::component('gcss-paragraph', VisualParagraph::class);
        Blade::component('gcss-list', VisualList::class);
        Blade::component('gcss-blockquote', VisualBlockquote::class);
        Blade::component('gcss-form-input', FormInput::class);
        Blade::component('gcss-form-textarea', FormTextarea::class);
        Blade::component('gcss-form-select', FormSelect::class);
        Blade::component('gcss-form-checkbox', FormCheckbox::class);
        Blade::component('gcss-form-radio', FormRadio::class);
        Blade::component('gcss-form-label', FormLabel::class);
        Blade::component('gcss-form-error', FormError::class);
        Blade::component('gcss-table', VisualTable::class);
        Blade::component('gcss-kpi', VisualKpi::class);
        Blade::component('gcss-chart', VisualChart::class);
        Blade::component('gcss-alert', VisualAlert::class);
        Blade::component('gcss-notification', VisualNotification::class);
        Blade::component('gcss-modal', VisualModal::class);
        Blade::component('gcss-tooltip', VisualTooltip::class);
        Blade::component('gcss-spinner', VisualSpinner::class);
        Blade::component('gcss-empty-state', VisualEmptyState::class);
        Blade::component('gcss-hero-section', VisualHeroSection::class);
        Blade::component('gcss-cta-section', VisualCtaSection::class);
        Blade::component('gcss-map-section', VisualMapSection::class);
        Blade::component('gcss-feature-grid', VisualFeatureGrid::class);
        Blade::component('gcss-testimonial-slider', VisualTestimonialSlider::class);

        Gate::define('manage-gcss-settings', function ($user) {
            return $user->hasRole('admin');
        });
    }

    /**
     * Recursively merges two arrays, giving precedence to the source array.
     *
     * @param array $target
     * @param array $source
     * @return array
     */
    protected function mergeRecursive(array $target, array $source): array
    {
        foreach ($source as $key => $value) {
            if (is_array($value) && isset($target[$key]) && is_array($target[$key])) {
                $target[$key] = $this->mergeRecursive($target[$key], $value);
            } else {
                $target[$key] = $value;
            }
        }
        return $target;
    }
}

