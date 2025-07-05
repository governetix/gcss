<?php

use Illuminate\Support\Facades\Route;
use Governetix\Gcss\View\Components\VisualButton;
use Governetix\Gcss\Models\GcssSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web']], function () {
    // Ruta para el dashboard principal del sistema de diseño
    Route::get('/styles', function () {
        $components = [
            'VisualButton' => VisualButton::$options,
            // Aquí puedes añadir la metadata de otros componentes
            // 'VisualHeading' => \Governetix\Gcss\View\Components\VisualHeading::$options,
            // 'VisualCard' => \Governetix\Gcss\View\Components\VisualCard::$options,
        ];

        $currentConfig = config('gcss');

        return view('gcss::admin.dashboard', compact('components', 'currentConfig'));
    })->name('styles');

    // Ruta para guardar la configuración del sistema de diseño
    Route::post('/styles/save', function (Request $request) {
        $settingsToSave = Arr::dot($request->except('_token'));

        foreach ($settingsToSave as $key => $value) {
            GcssSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        \Artisan::call('config:clear');

        return redirect()->route('admin.styles')->with('success', 'Configuración guardada exitosamente.');
    })->name('save-gcss-settings');
});

