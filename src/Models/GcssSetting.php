<?php

namespace Governetix\Gcss\Models;

use Illuminate\Database\Eloquent\Model;

class GcssSetting extends Model
{
    protected $table = 'gcss_settings';
    protected $fillable = ['key', 'value'];
    public $timestamps = false; // Asegúrate de que tu migración no cree estas columnas si no las quieres.

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'value' => 'array', // ¡Esto es lo nuevo!
    ];
}

