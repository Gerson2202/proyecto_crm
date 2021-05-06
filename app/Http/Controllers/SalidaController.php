<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Equipo;
use App\Models\EquipoSalida;
use App\Models\Material;
use App\Models\MaterialSalida;
use App\Models\MaterialUser;
use App\Models\Programation;
use App\Models\Salida;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SalidaController extends Controller
{
     // INICIO DE PERMISOS
     const PERMISSIONS=[
        
        'list'=>'salida.list',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['list'])->only(['salidaList','show']);
    }
    // FIN DE PERMISOS

    // IR A VISTA DE TECNICOS
    public function index()
    {
        $user=auth()->user('id');
        $userId =$user->id;   
        $ticket=Ticket::where('support_id',$userId)->where('active','1')->get();
        $programacion=Programation::where('user_id',$userId)->where('estado','1')->get();
        $equipos=Equipo::all();
        $actas=Acta::all();

        $cantidaTickets=Ticket::where('support_id',$userId)->where('active','1')->selectRaw('count(*) as cantidad')->first();
        $cantidaProgramacion=Programation::where('user_id',$userId)->where('estado','1')->selectRaw('count(*) as cantidad')->first();
         
        
         return view('tecnicos.index',compact('equipos','actas','ticket','programacion','cantidaTickets','cantidaProgramacion'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      
        //  return $request;
        // $arrayfilter=array_flilter($request->txtStocks);
    //   $consultab = $request->arrayStockHiden;
    // //   $array = explode(",", $consultab);
    //   foreach($consultab as $stock)
    //   {
    //     return  $stock;
    //   }

        $request->validate(
            [
                'documento'=>'max:2048'
            ]);

            
            $imagenes= $request->File('documento')->store('public/documentos/salidasEquipos');
            $url=Storage::url($imagenes);
            
            $salida=new Salida();
            $salida->fecha          =$request->fecha;
            $salida->destino        =$request->destino;
            $salida->descripcion    =$request->descripcion;
            $salida->documento      =$url;
            $salida->user_id        =$request->responsable;
            $salida->save();

            if($salida->save()){

                //SubCategorias
                foreach($request['equipo_id'] as $sub_cate){
                    
                    $Equipo_salida = array();
                    $Equipo_salida = new EquipoSalida();
                    $Equipo_salida->salida_id           =   $salida->id;   
                    $Equipo_salida->equipo_id           =   $sub_cate;
                    $Equipo_salida->save();

                    $equipo=Equipo::findOrFail($sub_cate);
                    $equipo->user_id=$request->responsable;
                    $equipo->destino="personal";
                    $equipo->save();
                }

                
            }
          
            // if($Equipo_salida->save()){
               // $materialSalida = new MaterialSalida();
            //     // $materialSalida->salida_id           =   $salida->id;  
            //     // arrayStockHiden

            //     foreach($request['txtMaterial_id'] as $material){
                    
            //         $materialSalida = array();
            //         $materialSalida = new MaterialSalida();
            //         $materialSalida->salida_id           =   $salida->id; 
            //         $materialSalida->material_id         =   $material;                                       
                    
            //         // $materialSalida->save();   
                    
            //     }
            //     foreach($request['arrayStockHiden'] as $stock){                        
                    
            //         $materialSalida->stock         =   $stock; 
            //         $materialSalida->save();   
                    
            //     }    
                
                        
                
            // }
          
            return redirect("/Crm/Inventario/salida/show/$salida->id");
            
    }
  
    public function salidaList(Salida $salida)
    {
        // $salida=Salida::all();
        return view('salidas.list');
    }
    
    public function show(Salida $salida,$id)
    {
        $salida=Salida::findOrfail($id);
        $equipoSalida=EquipoSalida::where('salida_id',$salida->id)->get();
        $materiales=Material::all();
        
       
        return view('salidas.show',compact('equipoSalida','salida','materiales'));
    }

   
    public function edit(Salida $salida)
    {
        //
    }

    public function update(Request $request, Salida $salida)
    {
        //
    }

    public function destroy(Salida $salida,$id)
    {
       Salida::FindOrFail($id)->delete();
       return response(true);
    }
    public function lista()
    {
        $salidas=Salida::all();
        return datatables()->of($salidas)->toJson();
    }

    // CONTROLADOR PARA CARGAR MATERIALES ALA SALIDA Y CARGAR AL USUARIO
    public function agregarMaterial(Request $request)
    {
        $material=$request->txtIdMaterial;
        $usuario=$request->txtIdUser;
        $salida=$request->txtIdSalida;
        // return $request;

        // Aca miramos si existe ya registro con ambos datos iguales
        $existenciaSalidaMaterial = DB::table('material_salida')
        ->select('salida_id','material_id')
        ->where('salida_id', '=', $salida)
        ->where('material_id', '=', $material)
        ->get();

        $existenciaMaterialUser = DB::table('material_user')
        ->select('user_id','material_id','id')
        ->where('user_id', '=', $usuario)
        ->where('material_id', '=', $material)
        ->get();

        // PREGUNTAMOS SI YA EXISTE EL MATERIAL EN ESA SALIDA PARA NO DEJARLO
        if(count($existenciaSalidaMaterial) >= 1) {
            return response(false);
        }else{
            $materialSalida= new MaterialSalida();
            $materialSalida->material_id=$request->txtIdMaterial;
            $materialSalida->salida_id=$request->txtIdSalida;
            $materialSalida->stock=$request->txtStock;
            $materialSalida->save();    

        }

        // PRIMERO PREGUNTAMOS SI EXISTE YA UN REGISTRO SI SI, ENTONCES COJEMOS EL ID DEL REGISTROP Y LE MODIFICAMOS EL STOCK
        // SUMANDOLE EL NUEVO VALOR QUE SE ENVIO POR REQUEST
        if($materialSalida->save()){

            if(count($existenciaMaterialUser) >= 1) {
                foreach($existenciaMaterialUser as $item)
                 {
                    //  return $item->id;
                     $modificar=MaterialUser::findOrFail($item->id);
                     $modificar->stock= $modificar->stock+$request->txtStock;
                     $modificar->save();
                 }
            }else{
                $materialUser=new MaterialUser();
                $materialUser->user_id=$usuario;
                $materialUser->stock=$request->txtStock;
                $materialUser->material_id=$material;
                $materialUser->save();     
            }
              
           
        }
        
        

        

      
         return response(true);

        //  // return $request;
        //  $materialSalida= new MaterialSalida();
        //  $materialSalida->material_id=$request->txtIdMaterial;
        //  $materialSalida->salida_id=$request->txtIdSalida;
        //  $materialSalida->stock=$request->txtStock;
        //  $materialSalida->save();
 
        //  if($materialSalida->save()){
        //      $material=$request->txtIdMaterial;
        //      $usuario=$request->txtIdUser;
             
        //      $existencia = DB::table('material_user')
        //      ->select('material_id')
        //      ->where('material_id', '=', $material)
        //      ->get();
             
        //      return $existencia;
             
 
        //      $materialUser=new MaterialUser();
        //      $materialUser->user_id=$request->txtIdUser;
        //      $materialUser->stock=$request->txtStock;
        //      $materialUser->material_id=$request->txtIdMaterial;
        //      $materialUser->save();            
        //  }
        //  return response(true);
    }
    public function materialesLista($id)
    {
        
        $materialesSalida=MaterialSalida::where('salida_id',$id)->get()->load('material');
        return datatables()->of($materialesSalida)->toJson();
    }

    public function eliminarMaterial($id,$ids,$idss,$idsss)
    {
        $idRegistro=$id;
        $idMaterial=$ids;
        $idUser=$idss;
        $stock=$idsss;
        

        $existenciaMaterialUser = DB::table('material_user')
        ->select('user_id','material_id','id')
        ->where('user_id', '=', $idUser)
        ->where('material_id', '=', $idMaterial)
        ->get();

        if(count($existenciaMaterialUser) >= 1) {
            foreach($existenciaMaterialUser as $item)
             {
                //  return $item->id;
                 $modificar=MaterialUser::findOrFail($item->id);
                 $modificar->stock=$modificar->stock-$stock;
                 $modificar->save();
             }
        }else{
               
        }
       
        // return $existenciaMaterialUser;
        MaterialSalida::findOrfail($id)->delete();
        return response(true);
    }

    public function consultaIdmaterial($id)
    {
        // return $id;
       $idmaterial=MaterialSalida::findOrfail($id);
       return response($idmaterial);
    }
    
}
