<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class FacturaController extends Controller
{
    // INICIO DE PERMISOS
    const PERMISSIONS=[
        
        'list'=>'factura.list',
    ];
    public function __construct()
    {
        $this->middleware('permission:'.self::PERMISSIONS['list'])->only(['listFacturas','show']);
    }
    // FIN DE PERMISOS

    public function listFacturas()

    {   
        $facturas=Factura::all();
        return view('facturas.list',compact('facturas'));
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
        // return $request;
        $request->validate([
            // 'documento'=>'required',
            // 'documento'=>'max:2048',
            'codigo'=>'unique:facturas'

        ]);
        if ( $request->documento!=null) {
            $documentos= $request->File('documento')->store('public/documentos/facturasEquipos');

            $url=Storage::url($documentos);
            
             $nuevo=Factura::create([
                 'codigo'=>$request->codigo,
                 'proveedor'=>$request->proveedor,
                 'fecha'=>$request->fecha,
                 'descripcion'=>$request->descripcion,
                 'documento'=>$url                                                                                                                                                                             
             ]);
             

            return response($nuevo);      
        } else {
            $nuevo=Factura::create([
                'codigo'=>$request->codigo,
                'proveedor'=>$request->proveedor,
                'fecha'=>$request->fecha,
                'descripcion'=>$request->descripcion  
                                                                                                                                                                                           
            ]);
            

            return response($nuevo);  
        }
        

            
                                                                                                       
            //  return back()->with('mensaje','Factura Agragada Con EXITO'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    // ver imagen de factura
    public function show(Factura $factura,$id)
    {   
        $factura=Factura::findOrfail($id);
       return view('facturas.show',compact('factura'));
    }
    
    public function edit(Factura $factura)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // return $request;
              // EL DOCUMENTO ES OPCIONAL
           
       
        if( $request->documento!=null) {
            // $request->validate([
            //     'codigo'=>'unique:facturas'
            // ]);  
            $documentos= $request->File('documento')->store('public/documentos/facturasEquipos');

             $url=Storage::url($documentos);            
             $nuevo=Factura::FindOrFail($id);
            //  $nuevo->codigo=$request->codigo;            
             $nuevo->proveedor=$request->proveedor;
             $nuevo->fecha=$request->fecha;
             $nuevo->descripcion=$request->descripcion;
             $nuevo->documento=$url;  
             $nuevo->save();
             return redirect()->route('listFacturas')->with('mensaje','Cambios Guardados!');     
        } else {             
            $nuevo=Factura::FindOrFail($id);
            // $nuevo->codigo=$request->codigo;            
            $nuevo->proveedor=$request->proveedor;
            $nuevo->fecha=$request->fecha;
            $nuevo->descripcion=$request->descripcion;
            $nuevo->save();

            return redirect()->route('listFacturas')->with('mensaje','Cambios Guardados!');     
        }
        

    }

    public function destroy(Factura $factura,$id)
    {
      Factura::FindOrFail($id)->delete();
      return response(true);
    }
 
    public function downloadFile ($id)
    {
    $facturas=Factura::findOrFail($id);
    // return response()->stream($cliente->documento); esta me fallo no se porque 
    return response()->download(public_path($facturas->documento));
    } 


}
