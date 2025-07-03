<?php

namespace Governetix\Gcss\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use ReflectionClass;
use Governetix\Gcss\Models\GcssSetting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class GcssDesignAdminController extends Controller
{
    /**
     * Muestra el panel de administración del diseño.
     */
    public function dashboard()
    {
        $components = $this->discoverComponents();
        // Cargar configuraciones desde la BD. Si no existen, se usa un array vacío.
        $settings = GcssSetting::pluck('value', 'key')->all();
        $themes = config('gcss.themes', []);

        return view('gcss::admin.dashboard', compact('components', 'settings', 'themes'));
    }

    /**
     * Guarda las configuraciones de diseño en la base de datos.
     */
    public function saveSettings(Request $request)
    {
        $validated = $request->validate([
            'settings' => 'required|array',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            GcssSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Limpiar la caché de configuración para que los cambios se apliquen inmediatamente
        Artisan::call('config:cache');

        return back()->with('success', '¡Configuración guardada con éxito!');
    }

    /**
     * Descubre los componentes Blade y sus propiedades usando Reflection.
     */
    private function discoverComponents()
    {
        $componentPath = base_path('packages/governetix/gcss/src/View/Components');
        if (!File::isDirectory($componentPath)) {
            return [];
        }

        $files = File::files($componentPath);
        $components = [];

        foreach ($files as $file) {
            $className = 'Governetix\\Gcss\\View\\Components\\' . $file->getFilenameWithoutExtension();

            if (!class_exists($className)) {
                continue;
            }

            $reflection = new ReflectionClass($className);
            if (!$reflection->isInstantiable()) {
                continue;
            }

            $constructor = $reflection->getConstructor();
            $props = [];

            if ($constructor) {
                foreach ($constructor->getParameters() as $param) {
                    $propName = $param->getName();
                    $type = $param->getType();
                    $typeName = 'mixed'; // Valor por defecto

                    if ($type instanceof \ReflectionNamedType) {
                        $typeName = $type->getName();
                    } elseif ($type instanceof \ReflectionUnionType) {
                        // Para tipos de unión (ej. string|null), tomamos el primer tipo que no sea 'null'
                        foreach ($type->getTypes() as $unionType) {
                            if ($unionType->getName() !== 'null') {
                                $typeName = $unionType->getName();
                                break;
                            }
                        }
                    }

                    // Mapear el tipo de PHP a un tipo de input HTML para el formulario
                    $input_type = 'text';
                    if (in_array($typeName, ['int', 'float', 'integer'])) {
                        $input_type = 'number';
                    } elseif (in_array($typeName, ['bool', 'boolean'])) {
                        $input_type = 'checkbox';
                    }

                    // Extraer opciones si el componente tiene una lista predefinida (convención)
                    $options = [];
                    if (property_exists($className, 'options') && isset($className::$options[$propName])) {
                        $options = $className::$options[$propName];
                        $input_type = 'select';
                    }

                    $props[$propName] = [
                        'input_type' => $input_type,
                        'default' => $param->isDefaultValueAvailable() ? $param->getDefaultValue() : null,
                        'options' => $options,
                        'php_type' => $typeName,
                    ];
                }
            }

            $kebabCaseName = strtolower(preg_replace('/(?<!^)[A-Z]/', '-\0', $file->getFilenameWithoutExtension()));
            $componentName = 'gcss-' . $kebabCaseName;

            $components[] = [
                'name' => $componentName,
                'class' => $className,
                'props' => $props,
            ];
        }

        return $components;
    }
}
