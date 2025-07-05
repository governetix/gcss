<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag; // Asegúrate de que esta línea esté aquí

class VisualSidebar extends Component
{
    public $class;
    public $links; // Añadido: Propiedad para los enlaces
    public $attributes;

    public function __construct($class = '', $links = [])
    {
        $this->class = (string) $class;
        $this->links = $links; // Inicializar la propiedad links

        if (!($this->attributes instanceof ComponentAttributeBag)) {
            $this->attributes = new ComponentAttributeBag();
        }
    }

    public function render()
    {
        // El Blade ya maneja la fusión de atributos.
        // Aquí pasamos la clase que ya procesamos y los atributos tal cual.
        return view('gcss::components.visual-sidebar', [
            'class' => $this->class,
            // Pasamos $this->attributes a la vista, excluyendo 'class' para evitar duplicidad si $class ya está ahí.
            'attributes' => $this->attributes->except(['class', 'links']), 
        ]);
    }
}