<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Factura;
use App\Models\Material;
use App\Models\Nodo;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Imports\EquipoImport;
use App\Models\Tipoequipo;
use Maatwebsite\Excel\Facades\Excel;

class EquipoController extends Controller
{
    const PERMISSIONS=[
        
        'index'=>'inventario.index',
        'show'=>'equipos.create',
        'update'=>'equipos.update',
        'asignar'=>'equipos.asignar',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index'])->only(['index','create','store']);
        $this->middleware('permission:'.self::PERMISSIONS['show'])->only(['equiposList','show']);
         $this->middleware('permission:'.self::PERMISSIONS['update'])->only('update');
         $this->middleware('permission:'.self::PERMISSIONS['asignar'])->only('equipoAsignar');
    }

    public function index()
    {
        
        $users=User::all();
        $equipos=Equipo::all();
        $cantidadBodega=Equipo::where('destino',"bodega")->selectRaw('count(*) as cantidad')->first();// consulta de cantidad de equipos en bodega
        $totalEquipos=Equipo::all()->count(); //consulta de cantidad de quipos totales
        $cantidadnodos=Nodo::all()->count();
        $materiales=Material::all();
     

        $equiposBodega=Equipo::where('destino',"bodega")->get();
        // return $totalEquipos;
        return view('equipos.index',compact('users','equipos','equiposBodega','cantidadBodega','totalEquipos','cantidadnodos','materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $facturas=Factura::all();
        $tipos=Tipoequipo::all();
        return view('equipos.create',compact('facturas','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
       
        if ($request->serial!=null) {
            $request->validate([
                // 'img'=>'image|max:2048',
                'mac'=>'unique:equipos',
                'codigo'=>'unique:equipos',
                'serial'=>'unique:equipos'
            ]);
        } else{
            $request->validate([
                // 'img'=>'image|max:2048',
                'mac'=>'unique:equipos',
                'codigo'=>'unique:equipos'
            ]);
        }
                
        // $fotos= $request->File('img')->store('public/documentos/imgEquipos');
        // $url=Storage::url($fotos);

        $nuevo=Equipo::create([
            'tipoequipo'=>$request->selectNombre,
            'codigo'=>$request->codigo,
            
            'serial'=>$request->serial,
            'mac'=>$request->mac,
            'estado'=>$request->estado,
            'observacion'=>$request->observacion,
            'fecha'=>$request->fecha,
            'destino'=>$request->destino,
            'factura_id'=>$request->factura_id,
            // 'img'=>$url                                                                                                                                                                             
        ]);
        return redirect("Crm/Inventario/equipos/$nuevo->id")->with('mensaje','Equipo agregado'); 

    }

   
    
    public function equiposList()
    {
        $nuvoEquipo=Equipo::all();
        return view('equipos.list',compact('nuvoEquipo'));
    }

    public function show(Equipo $equipo,$id)
    {
        $facturas=Factura::all();
        $equipo=Equipo::findOrfail($id);
        // toco acceder por clientes a equipos
        $clientes=Cliente::all();
        $nodos=Nodo::all();
        $sedes=Sede::all();
        $tipos=Tipoequipo::all();
        return view('equipos.show',compact('equipo','facturas','clientes','nodos','sedes','tipos'));
    }

    
    public function edit(Equipo $equipo)
    {
        //
    }

   
    public function update(Request $request, Equipo $equipo,$id)
    {
        
       $nuevo=Equipo::findOrFail($id);
       $nuevo->tipoequipo_id=$request->tipoequipo_id;
       $nuevo->codigo=$request->codigo;
       
       $nuevo->serial=$request->serial;
       $nuevo->mac=$request->mac;
       $nuevo->estado=$request->estado;
       $nuevo->observacion=$request->observacion;
       $nuevo->destino=$request->destino;
       $nuevo->fecha=$nuevo->fecha;
       $nuevo->factura_id=$request->factura_id;       
       $nuevo->save();
       return  redirect("Crm/Inventario/equipos/$id")->with('mensaje','Cambios Guardados!');
    }

   
    public function destroy(Equipo $equipo)
    {
        //
    }
    // asignar a cliente con direcciones
    public function equipoAsignar(Request $request,$id)
    {
        // return $request;
        $nuevo=Equipo::findOrFail($id);                  
        $nuevo->ip=$request->ip;
        $nuevo->winbox=$request->winbox;
        $nuevo->ssid=$request->ssid;
        $nuevo->otro=$request->otro;
        $nuevo->save();
        

       

         if ($request->nodo_id!=null) {
            //  $nuevo->ip=$request->ip;
            //  $nuevo->winbox=$request->winbox;
            //  $nuevo->ssid=$request->ssid;
            //  $nuevo->otro=$request->otro;
             $nuevo->cliente_id=null;
             $nuevo->nodo_id=$request->nodo_id;
             $nuevo->destino= "nodo";
             $nuevo->save();
             }
        if ($request->cliente_id!=null) {
            // $nuevo->ip=$request->ip;
            // $nuevo->winbox=$request->winbox;
            // $nuevo->ssid=$request->ssid;
            // $nuevo->otro=$request->otro;
            $nuevo->cliente_id=$request->cliente_id;
            $nuevo->nodo_id=null;
            $nuevo->destino= "cliente";
            $nuevo->save();
        }
        
        return  redirect("Crm/Inventario/equipos/$id")->with('mensaje','Asignacion Exitosa');   

    }
    public function equipoAsignarSede(Request $request, $id)
    {
        $asignar=Equipo::findOrFail($id);
        $asignar->sede_id=$request->nombre;
        $asignar->save();
        return redirect()->back()->with('mensaje',"Asignacion Exitosa");

    }

     // IMPORTAR EXECEL
    
     public function equiposexecel(Request $request)
     {
         $file=$request->file('file');
         Excel::import(new EquipoImport, $file);
         return redirect()->route('equiposIndex')->with('mensaje','Datos Guardados');
         
     }

     public function listarAjax()
    {
        $equipos=Equipo::all();
        return datatables()->of($equipos)->toJson();
     }

}
