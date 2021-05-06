<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteContrato;
use App\Models\ClientePlan;
use App\Models\Contrato;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ContratoController extends Controller
{
    const PERMISSIONS=[
        
        'index'=>'Contrato.index',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index']);
    }
    public function index()
    {   
        $contrato=Contrato::all();
        $planes=Plan::all();
        $clientes=Cliente::all();
        
        // $clienteContrato=ClienteContrato::where('cliente_id',$contrato->id)->get();
        return view('contratos.index',compact('planes','clientes','contrato'));
    } 
    public function list()
    { 
        
        $contrato=Contrato::all()->load('cliente');
        return datatables()->of($contrato)->toJson();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
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
         
        $request->validate([
            'documento'=>'max:2048',
            'cod_contrato'=>'unique:contratos'
            ]);

            
            $imagenes= $request->File('file')->store('public/documentos/contratos');

            $url=Storage::url($imagenes);
            $contrato=new Contrato();
            $contrato->cod_contrato          =$request->cod_contrato;
            $contrato->tipo                  =$request->tipo;
            $contrato->fecha                 =$request->fecha;
            $contrato->documento             =$url;
            $contrato->cliente_id                 =$request->cliente_id;

            $contrato->save();

            if($contrato->save())
            {
                    $nuevoPlan = new ClientePlan();
                    $nuevoPlan->plan_id              =$request->plan_id;   
                    $nuevoPlan->cliente_id           =$request->cliente_id;
                    $nuevoPlan->save();
                
            }
          

            return back()->with('mensaje','Contrato agregado con EXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        //
    }

    public function edit(Contrato $contrato)
    {
        //
    }

  
    public function update(Request $request, Contrato $contrato)
    {
        //
    }

    public function destroy(Contrato $contrato,$id)
    {
        Contrato::FindOrFail($id)->delete();
        return response(true);
    }
    public function downloadFile ($id)
    {
      
        $contrato=Contrato::findOrFail($id);
        // return response()->stream($cliente->documento); esta me fallo no se porque 
        return response()->download(public_path($contrato->documento,'contratomaria.pdf'));
    }  

    // public function soporte($documento)
    //   {                                                             
                      
       
    //      $file= Storage::get($documento);                                                                     
    //      return response()->download($file, 'El_nombre_que_quieres_con_el_que_se_descargue_el_documento.pdf');
       
    //  }    
}
