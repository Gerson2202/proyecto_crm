<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    protected $fillable=['token','id_plan','descripcion','cant_megas','vel_subida','vel_bajada','canon','globaal'];

    use HasFactory;
    // use SoftDeletes;
    // muhcos a muchos con clientess
    public function clientes(){
        return $this->belongsToMany('App\Models\Cliente');
    }
}
