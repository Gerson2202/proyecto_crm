<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePlan extends Model
{
    use HasFactory;
    protected $table='cliente_plan';
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
