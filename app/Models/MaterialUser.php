<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialUser extends Model
{
    use HasFactory;
    protected $table='material_user';
   
    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
