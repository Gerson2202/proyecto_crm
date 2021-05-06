<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // muhcos a muchos con clientess
    public function clientes(){
        return $this->belongsToMany('App\Models\Cliente');
    }
}
