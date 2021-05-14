<?php

namespace App\Http\Controllers;

use App\Models\Tipoequipo;
use Illuminate\Http\Request;

class TipoequipoController extends Controller
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
        $nuevo= new Tipoequipo();
        $nuevo->nombre=$request->nombre;
        $nuevo->save();
        return response(true);
    }

    
    public function show(Tipoequipo $tipoequipo)
    {
        //
    }

    public function edit(Tipoequipo $tipoequipo)
    {
        //
    }

    public function update(Request $request, Tipoequipo $tipoequipo)
    {
       

    }


    public function destroy($id)
    {
        Tipoequipo::findOrFail($id)->delete();
        return response(true);
    }

    public function listar(Tipoequipo $tipoequipo)
    {
        $tipo=Tipoequipo::all();
        return datatables()->of($tipo)->toJson();
    }
}
