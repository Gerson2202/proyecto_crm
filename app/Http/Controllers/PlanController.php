<?php

namespace App\Http\Controllers;

use App\Imports\PlanesImport;
use App\Models\Plan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PlanController extends Controller
{
    const PERMISSIONS=[
        
        'index'=>'Planes.index',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index']);
    }
    public function index()
    {
        $nuevo=Plan::all();
        return view('planes.index',compact('nuevo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(plan $plan,$id)

    {
        
        return view('planes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'id_plan'=>'unique:plans'
        ]);
         $clientePlan=new Plan();
         $clientePlan->id_plan=$request->id_plan;
         $clientePlan->descripcion=$request->descripcion;
         $clientePlan->cant_megas=$request->cant_megas;
         $clientePlan->vel_subida=$request->vel_subida;
         $clientePlan->vel_bajada=$request->vel_bajada;
         $clientePlan->fecha_inicio=$request->fecha_inicio;
         $clientePlan->canon=$request->canon;
         $clientePlan->globaal=$request->global;
     
         $clientePlan->save();
         session()->flash('exito','Plan agregado con exito');
         return back()->with('mensaje','!!PLAN AGREGADO CON EXITO!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan,$id)
    {
        $plan=Plan::findOrfail($id);
        return view('planes.create',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $clientePlan=Plan::findOrFail($id); //aca cambia cuando es update ya no es new sino lo que ves y ya no es necesario de agg los campos que faltan
        $clientePlan->id_plan=$request->id_plan;
         $clientePlan->descripcion=$request->descripcion;
         $clientePlan->cant_megas=$request->cant_megas;
         $clientePlan->vel_subida=$request->vel_subida;
         $clientePlan->vel_bajada=$request->vel_bajada;
         $clientePlan->fecha_inicio=$clientePlan->fecha_inicio;
         $clientePlan->canon=$request->canon;
         $clientePlan->globaal=$request->globaal;   
         $clientePlan->save();
         return  redirect("Crm/Planes/edit/$id")->with('mensaje','!!Plan editado con Exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    
    public function delet($id){
        Plan::findOrFail($id)->delete();
        // $nuevo=Plan::all();
        return redirect()->route('planesIndex')->with('mensaje','Plan eliminado con Exito');  
            // FORMA PARA SOLUCIONAR QUE NO ME ESTABA LEYENDO LA VARIABLE NUEVO AL ENTRAR AL INDEX
       }
    public function destroy(Plan $plan)
    {
        //
    }
    public function updateAjax(Request $request){
        print_r($_POST);
        exit;
    }

     // IMPORTAR EXECEL
    
     public function planesExcel(Request $request)
     {
        $request->validate([
            'file'=>'required|mimes:xlsx'
        ]);

         $file=$request->file('file');
         Excel::import(new PlanesImport, $file);
         return redirect()->route('planesIndex')->with('mensaje','Datos Guardados');
         
     }
    
}
