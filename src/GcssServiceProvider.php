<?php

namespace Governetix\Gcss;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Lang;
use Governetix\Gcss\View\Components\VisualHeading;
use Governetix\Gcss\View\Components\VisualCard;
use Governetix\Gcss\View\Components\VisualSection;
use Governetix\Gcss\View\Components\VisualFlexGrid;
use Governetix\Gcss\View\Components\VisualDivider;
use Governetix\Gcss\View\Components\VisualInfoBox;
use Governetix\Gcss\View\Components\VisualDropdown;
use Governetix\Gcss\View\Components\VisualNavbar; // Importar el nuevo componente VisualNavbar
use Governetix\Gcss\View\Components\VisualSidebar; // Importar el nuevo componente VisualSidebar

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
        // Cargar las vistas del paquete, con el namespace 'gcss'
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'gcss');

        // Registrar el namespace de traducción directamente
        Lang::addNamespace('gcss', __DIR__.'/../resources/lang');

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
        Blade::component('gcss-navbar', VisualNavbar::class); // <--- ¡Registrar el nuevo componente!
        Blade::component('gcss-sidebar', VisualSidebar::class); // <--- ¡Registrar el nuevo componente!
    }
}

