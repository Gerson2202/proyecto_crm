<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function equipos(){
        // return $this->belongsToMany('App\Models\Equipo')->withPivot('salida_id', 'ingreso_id');
        return $this->belongsToMany('App\Models\Equipo')->using('App\Models\ActaEquipo');
    }
    use HasFactory;
}
