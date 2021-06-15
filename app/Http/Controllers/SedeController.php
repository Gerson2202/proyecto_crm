<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $nuevo=new Sede();
        $nuevo->nombre=$request->txtNombre;
        $nuevo->save();
        return response(true);
    }

  
    public function show(Sede $sede)
    {
        //
    }

    
    public function edit(Request $request,$id)
    {
        $update=Sede::FindOrFail($id);
        $update->nombre=$request->nombre;
        $update->save();
        return response(true);
    }

  
    public function update(Request $request, Sede $sede)
    {
        //
    }

   
    public function destroy($id)
    {
        Sede::findOrFail($id)->delete();
        return response(true);
    }
    public function listar(Sede $sede)
    {
        $sedes=Sede::all();
        return datatables()->of($sedes)->toJson();
    }
}
