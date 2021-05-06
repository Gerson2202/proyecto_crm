<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable=['token','','responsable','fecha','destino','materiales','descripcion','documento'];
    use HasFactory;
    // relation uno a uno con user
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function equipos(){
        return $this->belongsToMany('App\Models\Equipo');
    }
}
