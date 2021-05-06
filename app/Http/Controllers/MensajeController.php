<?php

namespace App\Http\Controllers;

use App\Events\EnviarMensaje;
use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user('id');
        $userId =$user->id;

        $mensaje= new Mensaje();
        $mensaje->mensaje=$request->txtMensaje;
        $mensaje->user_id=$userId;
        $mensaje->ticket_id=$request->txtId;

       
        $mensaje->save();
        event(new EnviarMensaje($mensaje));
        return response(TRUE);
        // event(new \App\Events\EnviarMensaje($this->$mensaje));
        

       

    }

 
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function listar($id){
        $mensaje=Mensaje::with('user:id,name')->where('ticket_id',$id)->get();
        // $mensaje= Mensaje::where('ticket_id',$id)->get();
        return $mensaje->toJson();  
    }

    public function mensajesEliminar($id)
    {
        Mensaje::where('ticket_id',$id)->delete();
        return response(true);
    }

}
