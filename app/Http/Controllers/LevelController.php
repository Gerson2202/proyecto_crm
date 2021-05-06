<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
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
        $lvl=Level::create([
            "name"=>$nuevo["txtNombreNivel"],
            "project_id"=>$nuevo["txtProyectId"]
        ]);
        return response()->json(["ok"=>true]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::find($id)->delete();
        return response()->json(["ok"=>true]);
    }

    public function tabla(Request $request)
    {
        //FORMA NORMAL 
        $niveless=Level::all();

        return datatables()->of( $niveless)->toJson();
       // 
        // $niveles=Level::where('project_id', $idProyecto)->get();
        // return datatables()->of( $niveless)->toJson();
       
        // $sedes = Level::select(['name','id'])->where('project_id',$idProyecto);
        //  $niveles=Level::where('project_id', $idProyecto)->get();
        // dd ($niveless);
        // return datatables()->of( $niveless)->toJson();
        // return DataTables::of($sedes)->make(true);

        //  FORMA 2 CON FILTRO NO FUNCIONA
        // $idProyecto = $request->get('idProyecto');
        // $niveles=Level::where('project_id', $idProyecto)->get();
        // return datatables()->of( $niveles)->toJson();
    }
    public function buscar($id)
    {
        $level=Level::where('project_id', $id)->get();
        return $level;

    }
}
