<?php

namespace Governetix\Gcss\View\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag; // Asegúrate de que esta línea esté aquí

class VisualSidebar extends Component
{
    public $class;
    // Agrega la propiedad para los atributos
    public $attributes; // Esta línea es nueva, para declarar la propiedad

    public function __construct($class = '')
    {
        $this->class = (string) $class;

        // ¡Esta es la inicialización defensiva que faltaba!
        // Asegura que $this->attributes siempre sea un ComponentAttributeBag
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