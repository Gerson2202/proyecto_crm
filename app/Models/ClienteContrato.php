<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteContrato extends Model
{
    use HasFactory;
    protected $table='cliente_contrato';
   
    public function contrato()
    {
        return $this->belongsTo('App\Models\Contrato');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
