<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\ActaEquipo;
use App\Models\ActaMaterial;
use App\Models\Contrato;
use App\Models\Equipo;
use App\Models\File;
use App\Models\Material;
use App\Models\MaterialUser;
use App\Models\Programation;
use App\Models\Salida;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TecnicoController extends Controller
{
    // INICIO DE PERMISOS
    const PERMISSIONS=[
        
        'index'=>'soporte.index',
        'create'=>'soporte.create',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index'])->only(['index','show']);
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only('store');
    }
    // FIN DE PERMISOS

    public function index()
    {
        
        $user=auth()->user('id');
        $userId =$user->id;   //id de usuario logiado
        $ticket=Ticket::where('support_id',$userId)->where('active','1')->get();//tickest del usuario activas
        $equipos=Equipo::all();//todos los qeuipos
        $actas=Acta::all();//todas las actas
        $cantidaTickets=Ticket::where('support_id',$userId)->where('active','1')->selectRaw('count(*) as cantidad')->first();
        $usuario=User::findOrFail($userId)->load('programations');// todas las programaciones de usuario
        $programacion =$usuario->programations->where('estado','1')->sortBy('hora_inicial');//programaciones del usuario activas
        $cantidaProgramacion =$usuario->programations->where('estado','1')->count();//cantidad de programaciones del usuario activas
       $users=User::all();
        // para podega
        $materiales=MaterialUser::where('user_id',$userId)->get();        
        $equipos=Equipo::where('user_id',$userId)->get();

        $nuevo = DB::table('users')->orderBy('id', 'desc')->get();
        return view('tecnicos.index',compact('equipos','actas','ticket','cantidaTickets','programacion','cantidaProgramacion','materiales','equipos','users'));
         
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

    //  CREACION DE ACTA POR PARTE DE PERSONAL DE SOPORTE
    public function store(Request $request)
    {
        
        $salida=new Acta();
        $salida->user_id                =auth()->user()->id;
        $salida->fecha                  =$request->fecha;
        $salida->direccion              =$request->direccion;
        $salida->cliente                =$request->cliente;
        $salida->actividad              =$request->actividad; 
        $salida->municipio              =$request->municipio;   
        $salida->observaciones          =$request->observaciones;
       
        $salida->save();
        

        if($salida->save()){

            if($request->equipo_ingreso!=null){
                foreach($request['equipo_ingreso'] as $sub_cate)
                {
                    
                    $Equipo_salida = array();
                    $Equipo_salida = new ActaEquipo();
                    $Equipo_salida->ingreso_id             =   $sub_cate;
                    $Equipo_salida->acta_id               =   $salida->id;
                    $Equipo_salida->save();

                    // cambiamos estado de equipo
                    $equipo=Equipo::findOrFail($sub_cate);
                    $equipo->user_id=null;
                    $equipo->destino="cliente";
                    $equipo->save();
                }
            }
            else
            {
               
                    $Equipo_salida = new ActaEquipo();
                    $Equipo_salida->ingreso_id             =   null;
                    $Equipo_salida->acta_id                    =   $salida->id;
                    $Equipo_salida->save();
                
            }
           

            if($request->equipo_salida!=null){
                foreach($request['equipo_salida'] as $sub_cate){
                
                    $Equipo_salida = array();
                    $Equipo_salida = new ActaEquipo();
                    $Equipo_salida->salida_id             =   $sub_cate;
                    $Equipo_salida->acta_id                     =   $salida->id;
                    $Equipo_salida->save();

                    // cambiamos estado de equipo
                    $equipo=Equipo::findOrFail($sub_cate);
                    $equipo->user_id=auth()->user()->id;
                    $equipo->destino="personal,retirado de cliente";
                    $equipo->save();
                }
            }
            else
            {
                
                    $Equipo_salida = new ActaEquipo();
                    $Equipo_salida->salida_id             =   null;
                    $Equipo_salida->acta_id                    =   $salida->id;
                    $Equipo_salida->save();
                    
                   
            }
           


           
           
        }
        // return back()->with('mensaje','Acta registrada con Exito');
        // return view('tecnicos.show',$salida->id);
        return redirect()->route('showActaSalida',$salida->id);
    }   

    /**
     * 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(acta $acta,$id)
    {
        $acta=Acta::findOrfail($id);
        $materiales=Material::All();
      
        $actaEquipos = ActaEquipo::with('ingreso')->whereActaId($acta->id)->get();
        
        
        return view('tecnicos.show',compact('acta','actaEquipos','materiales'));
        
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
        //
    }
    public function list()
    {
        $actas=Acta::all()->load('user');
        return datatables()->of($actas)->toJson();
    }
    // METH SUBIR IMAGENES

    public function subirImagenes(Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);

        $imagenes=$request->file('file')->store('public/documentos/imagenesActa');
        $url=Storage::url($imagenes);
        File::create([
            'url'=>$url,
            'acta_id'=>$request->idActa,
        ]);
    }
    public function actaImgList($id){
        $imagenes=File::where('acta_id',$id)->get();
        return datatables()->of($imagenes)->toJson();
    }

    public function eliminarImg($id)
    {
        File::findOrFail($id)->delete();
        return response(true);
    }

    // AGREGAR MATERIAL AL ACTA
    public function agregarMaterialActa(Request $request)
    {
        $material=$request->txtIdMaterial;
        $usuario=$request->txtIdUser;
        $acta=$request->txtIdActa;
        // return $request;

        // Aca miramos si existe ya registro con ambos datos iguales
        $existenciaActaMaterial = DB::table('acta_material')
        ->select('acta_id','material_id')
        ->where('acta_id', '=', $acta)
        ->where('material_id', '=', $material)
        ->get();

        $existenciaMaterialUser = DB::table('material_user')
        ->select('user_id','material_id','id')
        ->where('user_id', '=', $usuario)
        ->where('material_id', '=', $material)
        ->get();

        if(count($existenciaMaterialUser)>= 1 && count($existenciaActaMaterial) < 1) {
            foreach($existenciaMaterialUser as $item)
             {
                //  return $item->id;
                 $modificar=MaterialUser::findOrFail($item->id);
                 if ($modificar->stock>=$request->txtStock) {
                    $modificar->stock= $modificar->stock-$request->txtStock;
                    $modificar->save();
                 } else {
                    return false;
                 }
                 
                 
             }
        }
        // PREGUNTAMOS SI YA EXISTE EL MATERIAL EN ESA SALIDA PARA NO DEJARLO
           
        
        if($modificar->save()){

            if(count($existenciaActaMaterial) >= 1) {
            
            }else{
                $materialActa=new ActaMaterial();
                $materialActa->acta_id=$request->txtIdActa;
                $materialActa->stock=$request->txtStock;
                $materialActa->material_id=$request->txtIdMaterial;
                $materialActa->save(); 
    
            }  
              
           
        }
        
      
        return response(true);

    }   

    // LISTAR MATERIALES 
    public function listarMateriales($id)
    {
        $materialesActa=ActaMaterial::where('acta_id',$id)->get()->load('material');
        return datatables()->of($materialesActa)->toJson();
    }   

    public function prestarEquipo(Request $request)
    {
        $equipo=Equipo::findOrFail($request->idEquipo);
        $equipo->user_id=$request->idUser;
        $equipo->save();

        return response(true);
    }
}
