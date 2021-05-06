<?php

namespace App\Models;

use App\Models\Equipo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaEquipo extends Model
{
    protected $table='acta_equipo';
    use HasFactory;

    public function acta()
    {
        return $this->belongsTo('App\Models\Acta');
    }
    
    public function salida()
    {
        return $this->belongsTo('App\Models\Equipo','salida_id');
    } 

    public function ingreso()
    {
        return $this->belongsTo('App\Models\Equipo','ingreso_id');
    } 
   
   
//    public function getIngresoNombreAttribute()
//          {
//              if($this->ingreso_id)

//              return $this->ingreso->nombre;

//              return 'No cargo';
//        } 
     
  
//        public function getIngresoCodAttribute()
//    {

//        if($this->ingreso_id)

//        return $this->ingreso->id;

//        return 'sin id';
//     } 


   
//     public function getSalidaNombreAttribute()
// {
//      if($this->salida_id)

//      return $this->salida->nombre;

//      return 'No cargo de quipos';
// } 

// public function getsalidaCodAttribute()
// {
// if($this->salida_id)

// return $this->salida->id;

// return 'sin id';
// } 
    // public function equipoSalida()
    // {
    //     $equipoSalida=Equipo::find($this->id);
       
    //     return $equipoSalida->nombre;
    // }

    // public function equipoIngreso()
    // {
    //     $equipoIngreso=Equipo::find($this->id);
    //     return $equipoIngreso->nombre;
    // }
    // public function equipoSalida()
    //  {
    //     return $this->belongsTo('App\Models\Equipo','equipoSalida');
    //  }
    //  public function equipoIngreso()
    //  {
    //     return $this->belongsTo('App\Models\Equipo','equipoIngreso');
    //  }

}
