<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        
          $nuevo= $request->all();
        //   dd($nuevo);
           $proyecto=Project::create([
                "nombre"=>$nuevo["txtNombre"],
                "descripcion"=>$nuevo["txtDescripcion"],
                "start"=>$nuevo["txtFecha"]
            ]);
              return response()->json(["ok"=>true]);
            //  return response ()->json($proyecto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Project::FindOrfail($id);

        $datos->nombre=$request->txtNombreEdit;
        $datos->descripcion=$request->txtDescripcionEdit;
        $datos->start=$request->txtFechaEdit;
        $datos->save();
        
          return response()->json(["ok"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return response()->json(["ok"=>true]);
    }
    public function listar(Request $request)
    {

        
         $proyectos=Project::select('nombre','descripcion','start','id')->get();
         return datatables()->of( $proyectos)->toJson();
    }

    public function listarEdit($id){
        // $nieles=Level::where('$id','project_id')->get();     
        // $proyecto=Project::with('user:id,name','cliente:id,nombre')->findOrFail($id);   
        // solo esto
        $proyecto=Project::findOrFail($id);
        return ($proyecto)->toJson();

        // $proyecto=Project::findOrFail($id);
        // $niveles=Level::where('project_id',$id)->get();
        // $datos=[$proyecto,$niveles];
        // return $datos;

        


    }
}
