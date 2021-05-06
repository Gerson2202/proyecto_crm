<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoSalida extends Model
{
    protected $table='equipo_salida';
    protected $fillable=['token','salida_id','equipo_id'];

    public function equipo()
    {
        return $this->belongsTo('App\Models\Equipo');
    }
    public function salida()
    {
        return $this->belongsTo('App\Models\Salida');
    }
    use HasFactory;
}
