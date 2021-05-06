<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = ['mensaje','user_id','ticket_id'];

    public function ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    } 

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 
}
