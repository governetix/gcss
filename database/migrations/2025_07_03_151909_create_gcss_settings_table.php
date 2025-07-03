<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gcss_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // Clave de la configuración (ej. 'buttons.default_type')
            $table->json('value'); // Valor de la configuración (JSON para arrays/objetos, o string para simples)
            // No timestamps, ya que solo almacenamos configuraciones estáticas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gcss_settings');
    }
};

