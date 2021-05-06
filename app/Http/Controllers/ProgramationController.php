<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EquipoSalida;
use App\Models\Programation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class ProgramationController extends Controller
{
    // INICIO DE PERMISOS
    const PERMISSIONS=[
        
        'index'=>'programacion.index',
        'create'=>'programacion.create',
        'edit'=>'programacion.edit',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index'])->only('index');
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only('store');
        $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['update','delete','update','cambioEstado']);
    }
    // FIN DE PERMISOS
    public function index()
    {
            $usuario=User::all();
            $clientes=Cliente::all();
            $programacion=Programation::all();           
            $equipoSalida=EquipoSalida::all();

            // $programacion = DB::table('programations')
            //  ->orderBy('id', 'desc')
            // ->get();
            
            return view('programacion.index',compact('clientes','usuario','programacion','equipoSalida'));
       
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
     * 
     */

     public function listar()
     {
         $agenda=Programation::all();
         $usersAll=User::all();
         $nueva_agenda=[];
         foreach($agenda as $value){
            $nueva_agenda[]=[
               
                "start"=>$value->fecha." ".$value->hora_inicial,
                "end"=>$value->fecha." ".$value->hora_final,
                "title"=>$value->titulo,
                
                "backgroundColor"=>$value->estado == 1 ? "#1f7904" : "#7b0205",
                // "backgroundColor"=>$value->cliente_id == null ? "#cccc07" : "#1f7904",
                
                // lo que quiero tener en el cuadro aca datos.
                "extendedProps"=>[
                    "id"=>$value->id,
                    "fecha"=>$value->fecha,
                    "hora_inicial"=>$value->hora_inicial,
                    "hora_final"=>$value->hora_final,
                    "cliente_id"=>$value->cliente_id,                    
                    "descripcion"=>$value->descripcion,
                    "direccion"=>$value->direccion,
                    "tareas"=>$value->tareas,
                    "estado"=>$value->estado,
                    "user_id"=>$value->users, //usuarios en seleccionados
                    "userAll"=>$usersAll,
                    
                // "user_id"=> $value->usuario_id
                ]
            ];
         }
         return response()->json($nueva_agenda);
     }
    public function validar ($fecha,$hora_inicial,$hora_final)
    {
        $programation=Programation::select()
        ->whereDate('fecha',$fecha)
        ->whereBetween('hora_inicial',[$hora_inicial, $hora_final])
        ->orWhereBetween('hora_final',[$hora_inicial, $hora_final])
        ->first(); 
        return $programation ==null ? true : false ;

    }

    public function store(Request $request)
    {
    //    return $request;
        // $nuevo= $request->all();
        
        //     $programation=Programation::create([
        //         "titulo"=>$nuevo["titulo"],
        //         "fecha"=>$nuevo["fecha"],
        //         "hora_inicial"=>$nuevo["hora_inicial"],
        //         "hora_final"=>$nuevo["hora_final"],
        //         "user_id"=>$nuevo["user_id"],
        //         "cliente_id"=>$nuevo["cliente_id"],
        //         "descripcion"=>$nuevo["descripcion"],
        //         "direccion"=>$nuevo["direccion"]
        //     ]); 
        //     return response()->json(["ok"=>true]);
            // return response ()->json($programation);

            // lo nuevo
            $nuevo= new Programation();
            $nuevo->titulo=$request->titulo;
            $nuevo->fecha=$request->fecha;
            $nuevo->hora_inicial=$request->hora_inicial;
            $nuevo->hora_final=$request->hora_final;
            $nuevo->cliente_id=$request->cliente_id;
            $nuevo->descripcion=$request->descripcion;
            $nuevo->direccion=$request->direccion;
            $nuevo->tareas=$request->tareas;
            $nuevo->save();
            $nuevo->users()->sync($request->user_id);
            return response()->json(["ok"=>true]);
        
    }

   
    public function show(Programation $programation)
    {
        //
    }

   
    public function edit(Programation $programation)
    {
        //
    }

    public function update(Request $request,$id)
    {
        
        
            $nuevo=Programation::findOrFail($id); 
            $nuevo->titulo=$request->txtTitulo;
            $nuevo->fecha=$request->txtFecha;
            $nuevo->hora_inicial=$request->txtHora_inicial;
            $nuevo->hora_final=$request->txtHora_final;
            // $nuevo->user_id=$request->user_id;
            $nuevo->cliente_id=$request->txtCliente_id;
            $nuevo->descripcion=$request->txtDescripcion;
            $nuevo->cliente_id=$request->txtCliente_id;

            $nuevo->descripcion=$request->txtDescripcion;
            $nuevo->direccion=$request->txtDireccion;
            $nuevo->estado=$request->txtEstado;     
            $nuevo->tareas=$request->txtTareas;

            $nuevo->save();
            $nuevo->users()->sync($request->txtUser_id);
            return response()->json(["ok"=>true]);
       
       
        
           
        
            // $programation=Programation::findOrFail($id)([
            //     "titulo"=>$datos["titulo"],
            //     "fecha"=>$datos["fecha"],
            //     "hora_inicial"=>$datos["hora_inicial"],
            //     "hora_final"=>$datos["hora_final"],
            //     "user_id"=>$datos["user_id"],
            //     "cliente_id"=>$datos["cliente_id"],
            //     "descripcion"=>$datos["descripcion"],
            //     "direccion"=>$datos["direccion"],
            //     "estado"=>$datos["estado"]
            // ]);

        // return response ()->json($programation);
            
    }    
    public function destroy(Programation $programation)
    {
        //
    }
    public function delete($id)
    {
       
        Programation::find($id)->delete();

        return response()->json(["ok"=>true]);

    }
    
    
    public function programacionDatatable(Request $request)
    {
        //  $programacion=Programation::select('titulo','fecha')->get();
        $programacion=Programation::whereNotNull('cliente_id')->get();
         return datatables()->of( $programacion)->toJson();
    }

    // Traer datos para mostrar en el modal solo show
    public function programacionShowAjax($id)
    {    

        //  $programacion=Programation::findOrFail($id);
        //  $nombreUser=[$programacion->user->name];
        //  $nombreCliente=[$programacion->cliente->nombre];
        //  $datos=[$programacion,$nombreCliente,$nombreUser];
        //   return $datos;
        
        // response()->json(["ok"=>true]);
        //CON ESTA FORMA ADEMAS PASAMOS LA RELACION QUE LLEVA 
         $programacion=Programation::with('cliente:id,nombre')->findOrFail($id)->load('users');
         return $programacion;
    }

    
    public function cambioEstado($id)
    {       
        
            $programacion=Programation::findOrFail($id);        
            if ($programacion->estado<2) {

                $programacion->estado=2;
                $programacion->save();
            } else {
                $programacion->estado=1;
                $programacion->save();
            }
                 
           
            return response()->json(["ok"=>true]);      
            
    }
    //para la datable de Soporte me trae los qu me pertenecen
    public function programacionListarAsiganadas()
    {    
         $user=auth()->user('id');
         $userId =$user->id; 
        //  $programacion=Programation::with('user:id,name','cliente:id,nombre')->where('user_id',$userId)->get();

         $usuario=User::findOrFail($userId)->load('programations');
         $programacion =$usuario->programations->load('cliente');
         return datatables()->of($programacion)->toJson();
    }

    // PROGRAMACIONES EN COLA , LOS QUE TENGASN NULL EL CLIENTE
    public function listarCola()
    {
        $programacion=Programation::where('cliente_id',null)->get();
        return datatables()->of($programacion)->toJson();
    }
}
