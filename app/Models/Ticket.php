<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
   
    protected  $fillable= ['asunto','tipo','mensaje','active','file','user_id','cliente_id','project_id','level_id','support_id'];
    
    
    public function userSuport(){
        return $this->belongsTo('App\Models\User','support_id');
    }
    public function userHecho(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
    public function nivel(){
        return $this->belongsTo('App\Models\Level');
    }

    public function proyecto(){
        return $this->belongsTo('App\Models\Project');
    }


    public function medio(){
        return $this->belongsTo('App\Models\MedioAtencion');
    }
    public function peticion(){
        return $this->belongsTo('App\Models\Peticion');
    }
    public function tipologia(){
        return $this->belongsTo('App\Models\Tipologia');
    }
    public function comentario(){
        return $this->belongsTo('App\Models\Comentario');
    }


}





