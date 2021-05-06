<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Comentario;
use App\Models\File;
use App\Models\MedioAtencion;
use App\Models\Peticion;
use App\Models\Ticket;
use App\Models\Tikect;
use App\Models\Tipologia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TikectController extends Controller
{
    // INICIO DE PERMISOS
    const PERMISSIONS=[
        
        'index'=>'tickets.index',
        'create'=>'tickets.create',
        'indexInforme'=>'tickets.informe',
        'ticketDelet'=>'tickets.eliminar',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['index'])->only(['index','show']);
        $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['store','edit']);
        $this->middleware('permission:'.self::PERMISSIONS['indexInforme'])->only('indexInforme');
        $this->middleware('permission:'.self::PERMISSIONS['ticketDelet'])->only('destroy');
    }
    // FIN DE PERMISOS

    public function index()
    {   
        $clientes=Cliente::all();
        $tipologia=Tipologia::all();
        $medio_atencion=MedioAtencion::all();
        $peticion=Peticion::all();
        $users=User::all();
        $comentarios=Comentario::all();
        return view('tikects.index',compact('clientes','tipologia','medio_atencion','peticion','users','comentarios'));
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       
         $user=auth()->user('id');         
         
         
         $userId =$user->id;

         if ($request->txtFile!=null) {
          $fotos= $request->File('txtFile')->store('public/documentos/imgTickets');   
          $url=Storage::url($fotos);
          $Ticket=new Ticket();  

          if ($request->checkLevel!=null) {
            $Ticket->level_id                 =2;
          } else {
            $Ticket->level_id                 =1;
          }
            
          $Ticket->asunto                 =$request->txtAsunto;
          $Ticket->tipologia_id           =$request->txtTipologia;
          $Ticket->peticion_id            =$request->txtPeticion;
          $Ticket->medio_id               =$request->txtMedio;
          $Ticket->mensaje                =$request->txtMensaje;
          $Ticket->file                   =$url;
          $Ticket->cliente_id             =$request->txtNombreCliente;
          $Ticket->user_id                =$userId;          
          $Ticket->project_id             = 1;
          $Ticket->save();
        }else{

            $Ticket=new Ticket();    
            if ($request->checkLevel!=null) {
                $Ticket->level_id                 =2;
              } else {
                $Ticket->level_id                 =1;
              }     
            $Ticket->asunto                 =$request->txtAsunto;
            $Ticket->tipologia_id           =$request->txtTipologia;
            $Ticket->peticion_id            =$request->txtPeticion;
            $Ticket->medio_id               =$request->txtMedio;
            $Ticket->mensaje                =$request->txtMensaje;            
            $Ticket->cliente_id             =$request->txtNombreCliente;
            $Ticket->user_id                =$userId;          
            $Ticket->project_id             = 1;
            $Ticket->save();
         
        }    
         return response()->json(["ok"=>true]);
    }

    public function show($id)
    {
        $ticket= Ticket::findOrFail($id);
        $comentarios=Comentario::all();
        return view('tikects.show',compact('ticket','comentarios'));
        // return view::make('user.show');
    }

  
    public function edit()
    {
        //
    }

    
    public function update(Request $request)
    {
        //
    }

  
    public function destroy($id)
    {
       Ticket::findOrFail($id)->delete();
       return response(true);
    }
    //LISTAR TICKETS SIN ASIGNAR
    public function ticketNuevoListar()
    {

        $Ticket= Ticket::where('support_id',null)->get();
        return datatables()->of($Ticket)->toJson();
        
    }
    
    // ATENDER EL TICKET
    public function ticketAtender($id)
    {
        $user=auth()->user('id');
        $userId =$user->id;   

        $tikect= Ticket::findOrFail($id);
        $tikect->support_id=$userId;
        $tikect->save();
        return response()->json(["ok"=>true]);  
        
    }
    //PARA VER LOS TICKETS ASIGNADOS AMI
    public function ticketAsignadoListar()
    {
        $user=auth()->user('id');
        $userId =$user->id; 
        $tikect= Ticket::where('support_id',$userId);
        return datatables()->of($tikect)->toJson();  
        

    }
    public function ticketListarAll(){
        $tikect= Ticket::all();
        return datatables()->of($tikect)->toJson();  
    }

    // para mostrar detalle 
    public function infoTicket($id){
        $tikect=Ticket::with('userSuport:id,name','userHecho:id,name',
        'cliente:id,nombre','tipologia:id,nombre','medio:id,nombre','peticion:id,nombre','comentario:id,contenido')->findOrFail($id);
        // $tikect= Ticket::findOrfail($id);
        return  $tikect->toJson();
    }

    
    public function ticketCambiarEstado($id)
    {

        // return view('clientes.index';)
        $ticket=Ticket::findOrFail($id);        
        if ($ticket->active<2) {
            $ticket->active=2;
        } else {                       
            $ticket->active=1;
        }
        
        $ticket->save();    
        return back()->with('mensaje','cambio gurdado con exito')->with('mensaje','Se ah modificado el estado del Ticket');  
        // return response(true);
        

    }
    // INDEXINFORME
    public function indexInforme()
    {
        $tickets=Ticket::all();
        return view('tikects.informe',compact('tickets'));
    }

    public function indexListarInforme()
    {
        // PORQUE NORMALISE LAS TABLAS  PETICIONES , MEDIO Y TIPOLOGIA
        // $tikect=Ticket::with('tipologia:id,nombre','medio:id,nombre','peticion:id,nombre')->all();
        $tikect=Ticket::all()->load('peticion')->load('medio')->load('tipologia');
        return datatables()->of($tikect)->toJson(); 
    }
    // FUNCION PARA ASIGNAR TICKET A UN USUARIO EN ESPECIAL
    public function ticketAsignar(Request $request ,$id,$ids)
    {
        $idUser=$ids;
        $idTicket=$id;
        
         $tikect= Ticket::findOrFail($idTicket);
         $tikect->support_id=$idUser;
         $tikect->save();
        return response()->json(["ok"=>true]);  
        
    }

    // SUBIR IMAGENES MULTIPLES
    public function subirImagenes(Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);

        $imagenes=$request->file('file')->store('public/documentos/imagenesTA');
        $url=Storage::url($imagenes);
        File::create([
            'url'=>$url,
            'ticket_id'=>$request->idTicket,
        ]);
    }
    public function ticketsImagenesList($id)
    {
        $imagenes=File::where('ticket_id',$id)->get();
        return datatables()->of($imagenes)->toJson();
    }

    // ELIMINAR IMAGEN DE TIKEET
    public function eliminarImg($id)
    {
        File::findOrFail($id)->delete();
        return response(true);
    }
}

