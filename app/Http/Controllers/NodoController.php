<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Nodo;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    
      const PERMISSIONS=[
        
        'index'=>'nodo.index',
        'store'=>'nodo.crear',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index']);
        $this->middleware('permission:'.self::PERMISSIONS['store']);
        $this->middleware('permission:'.self::PERMISSIONS['store'])->only(['store','destroy']);
    }
    public function index()
    {
       $nodo=Nodo::all()->load('equipo');
       $equipos=Equipo::where('destino','NODO')->where('nodo_id',null)->get(); //filtramos que este para nodo y que no este asigando
        $equiposAll=Equipo::where('destino','NODO')->get();
       
       return view('nodos.index',compact('nodo','equipos','equiposAll'));
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

    public function store(Request $request)
    {
        // return $request;
        $nuevo=new Nodo();
        $nuevo->nombre=$request->txtNombre;
        $nuevo->direccion=$request->txtUbicacion;
        $nuevo->coordenadas=$request->txtCoordenadas;
        $nuevo->descripcion=$request->txtDescripcion;
        $nuevo->save();
        if ($nuevo->save()) {
            if($request->selectEquipos!=null)
            {
                 foreach($request['selectEquipos'] as $equipo){
                    
                // $Equipo = array();
                $Equipo = Equipo::findOrFail($equipo);
                $Equipo->nodo_id           = $nuevo->id;
                $Equipo->save();
            }
            }
           
        }         
        

      
        return redirect()->route('nodoIndex')->with('mensaje','Nodo agregado');
    }

    public function show(Nodo $nodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nodo  $nodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Nodo $nodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nodo  $nodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $nuevo=Nodo::FindOrFail($id);
        $nuevo->nombre=$request->txtNombreEdit;
        $nuevo->direccion=$request->txtUbicacionEdit;
        $nuevo->coordenadas=$request->txtCoordenadasEdit;
        $nuevo->descripcion=$request->txtDescripcionEdit;
        $nuevo->save();
        if ($nuevo->save()) {
            if ($request->SelectEquiposEdit!=null) {
                foreach($request['SelectEquiposEdit'] as $equipo){
                    
                    $Equipo = array();
                    $Equipo = Equipo::findOrFail($equipo);
                    $Equipo->nodo_id           = $id;
                    $Equipo->save();
                }
            
            } else {
                return response(true);
            }
            
           
        }   
        
        // LO QUE HACE ES QUE SOLO GUARDA EL QUE VA EN EL SELECT PERO
        //  LOS DEMAS NO LOS TOCA OSEA SIGUEN GUARDADOS HASTA QUE LO AIGNEN A OTRO
        return response(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nodo  $nodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nodo $nodo,$id)
    {
    
        Nodo::findOrFail($id)->delete();
        return response(true);
        // return redirect()->route('nodoIndex');
    }
}
