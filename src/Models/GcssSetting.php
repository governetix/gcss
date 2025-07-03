<?php

namespace Governetix\Gcss\Models;

use Illuminate\Database\Eloquent\Model;

class GcssSetting extends Model
{
    protected $table = 'gcss_settings'; // Nombre de la tabla
    protected $fillable = ['key', 'value']; // Campos que se pueden asignar masivamente
    public $timestamps = false; // Si no usas timestamps en esta tabla
}

