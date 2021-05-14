<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable=['token','nombre','codigo','img','serial','mac','estado','observacion','fecha','factura_id','destino','ip','subRed','pEnlace','otro','cliente_id'];
    //relations con factura
    public function factura()
    {
        return $this->belongsTo('App\Models\Factura');
    }
    public function actas(){
       return $this->belongsToMany('App\Models\Acta')->using('App\Models\ActaEquipo');;
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function nodo()
    {
        return $this->belongsTo('App\Models\Nodo');
    }

    public function sede()
    {
        return $this->belongsTo('App\Models\Sede');
    }
    public function tipoequipo()
    {
        return $this->belongsTo('App\Models\Tipoequipo');
    }
    // public function actaEquipo()
    // {
    //     return $this->hasMany('App\Models\ActaEquipo');
    // }
}
