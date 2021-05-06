<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model

{
    protected $fillable=['token','id_contrato','cliente_id','fecha','documento'];
    use HasFactory;

        // relations uno a muchos  conj clientes
        public function cliente(){
            return $this->belongsTo('App\Models\Cliente');
        }

    
}
