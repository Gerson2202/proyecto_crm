<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaMaterial extends Model
{
    use HasFactory;

    protected $table='acta_material';
    use HasFactory;

    public function acta()
    {
        return $this->belongsTo('App\Models\Acta');
    }
    
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    } 

   
   
}
