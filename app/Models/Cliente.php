<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'ced', 'nombre', 'telefono','correo', 'municipio', 'calle','estrato','tipo_servicio', 'fecha_inicio', 'fecha_final','reuso', 'tecnologia', 'canon','estado', 'nombre', 
    ];

//    relcion uno auno con salida
    public function salida(){
    return $this->hasMany('App\Models\Salida');
    }
    // relation muhcos a muhcos con planes//
    public function plan(){
        return $this->belongsToMany('App\Models\Plan');
    }




    
    public function contratos(){
        return $this->hasMany('App\Models\Contrato');
    }

    public function equipos(){
        return $this->hasMany('App\Models\Equipo');
    }

    // uno a uno inverso
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
