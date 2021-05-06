<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialSalida extends Model
{
    use HasFactory;

    protected $table='material_salida';
   
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
    public function salida()
    {
        return $this->belongsTo('App\Models\Salida');
    }
}
