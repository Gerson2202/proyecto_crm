<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteContrato;
use App\Models\ClientePlan;
use App\Models\Contrato;
use App\Models\Equipo;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientesImport;
use App\Models\User;

class ClienteController extends Controller
{
    const PERMISSIONS=[
        
        'index'=>'cliente.index',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index']);
    }

    public function index()
    {
        
        $nuevo = DB::table('clientes')->orderBy('id', 'desc')->get(); //all clientes
        $clientAct=Cliente::where('estado','activo')->count();// cantidad de clientes activos
        $clientInac=Cliente::where('estado','inactivo')->count(); // cantidad de clientes inactivos        
        $clientesnewcant=$nuevo->whereBetween('created_at', array(Carbon::now()->subMonth(), Carbon::now()))->count(); //clientes en el ultimo mes
        $clientesnew=$nuevo->whereBetween('created_at', array(Carbon::now()->subWeek(), Carbon::now())); 
        return view ('clientes.index',compact('nuevo','clientAct','clientInac','clientesnew','clientesnewcant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'ced'=>'unique:clientes',
            'correo'=>'unique:clientes'

        ]);
        
        $clienteNuevo=new Cliente;
        $clienteNuevo->ced=$request->ced;
        $clienteNuevo->nombre=$request->nombre;
        $clienteNuevo->telefono=$request->telefono;
        $clienteNuevo->correo=$request->correo;
        $clienteNuevo->estrato=$request->estrato;
        $clienteNuevo->municipio=$request->municipio;
        $clienteNuevo->calle=$request->calle;
        $clienteNuevo->fecha_inicio=$request->fecha_inicio;
        $clienteNuevo->fecha_final=$request->fecha_final;
        $clienteNuevo->tipo_servicio=$request->tipo_servicio;
        $clienteNuevo->reuso=$request->reuso;
        $clienteNuevo->tecnologia=$request->tecnologia;
        $clienteNuevo->canon=$request->canon;
        $clienteNuevo->estado="activo";
        $clienteNuevo->save();
        return  redirect("Crm/Clientes/ver/$clienteNuevo->id")->with('mensaje','!!NUEVO CLIENTE AGREGADO!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente,$id)
    {
        $cliente=Cliente::findOrfail($id);
        $clientePlan=ClientePlan::where('cliente_id',$cliente->id)->get();
        $clienteContrato=Contrato::where('cliente_id',$cliente->id)->get();
        $equipos=Equipo::where('cliente_id',$id)->get();
        
         return view('clientes.show',compact('cliente','clientePlan','clienteContrato','equipos'));
    }

    public function edit($id)
    {
        $cliente=Cliente::findOrfail($id);
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $nuevo=Cliente::findOrFail($id); //aca cambia cuando es update ya no es new sino lo que ves y ya no es necesario de agg los campos que faltan
        $nuevo->ced=$request->ced;
        $nuevo->nombre=$request->nombre;
        $nuevo->telefono=$request->telefono;
        $nuevo->correo=$request->correo;
        $nuevo->estrato=$request->estrato;
        $nuevo->municipio=$request->municipio;
        $nuevo->calle=$request->calle;
        $nuevo->fecha_inicio=$request->fecha_inicio;
        $nuevo->fecha_final=$request->fecha_final;
        $nuevo->tipo_servicio=$request->tipo_servicio;        
        $nuevo->reuso=$request->reuso;
        $nuevo->tecnologia=$request->tecnologia;
        $nuevo->canon=$request->canon;
        $nuevo->estado=$request->estado;
        $nuevo->save();
        return  redirect("Crm/Clientes/ver/$id")->with('mensaje','!!Datos Editados con Exito!!');
    }

    public function AggFile (Request $request,$id)
    {
           
        $request->validate([
            'file'=>'max:2048',
            ]);
            $documento= $request->File('file')->store('public/documentos/cliente/recivo');
            $url=Storage::url($documento);
            
        $nuevo=Cliente::findOrFail($id); //aca cambia cuando es update ya no es new sino lo que ves y ya no es necesario de agg los campos que faltan
        $nuevo->documento=$url;
        $nuevo->save();
        return  redirect("Crm/Clientes/ver/$id")->with('mensaje','!!Documento Guardado con exito!!');;
    }

    public function downloadFile($id)
    {
        $cliente=Cliente::findOrFail($id);
        // return response()->stream($cliente->documento); esta me fallo no se porque 
        return response()->download(public_path($cliente->documento));
    }                                               
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function listar()
    {
        $clientes= Cliente::all();
        return datatables()->of($clientes)->toJson();
    }
    
    public function quitarPlan(Request $request, $id)
    {
    

        $idCliente=$id;
        $idPlan=$id;

        ClientePlan::where('cliente_id',$idCliente)->where('plan_id',$idPlan)->delete();
        return redirect()->route('clientesShow',$idCliente)->with('mensaje','Plan descartado');
        
    }
    // IMPORTAR EXECEL
    
    public function clienteExecel(Request $request)
    {
        $request->validate([
            'file'=>'required|mimes:xlsx'
        ]);

        $file=$request->file('file');
        Excel::import(new ClientesImport, $file);
        return redirect()->route('clientesIndex')->with('mensaje','Datos Guardados');
        
    }

    // ENLAZAR USER
    public function enlazarUser(Request $request) 
    {
        $cliente=Cliente::findOrFail($request->cliente_id);
        $cliente->user_id=$request->user_id;
        $cliente->save();
        return response(true);
    }
}
