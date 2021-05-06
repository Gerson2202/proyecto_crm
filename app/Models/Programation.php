<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programation extends Model
{
    use HasFactory;

    protected $fillable=['titulo','fecha','hora_inicial','hora_final','user_id','cliente_id','descripcion','direccion','tareas','estado'];

    // public function user(){
    //     return $this->belongsTo('App\Models\User');
    // }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    // public function getEstadoAttribute()
    // {
    //     $estado=Programation::all();

        
    //         if ($estado->estado=2) {
    //             return 'abierto';
    //         } else {
    //             if ($estado->estado=2) {
    //                 return 'cerrado';
    //             } 
              
    //         }
            
    // }
}


