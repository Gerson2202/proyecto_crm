<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
        $material=new Material();
        $material->nombre=$request->nombre;
        $material->stock=$request->stock;
        $material->save();
        return response(true);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
       $material=Material::findOrFail($request->idMaterialEditar);
       $material->nombre=$request->inputnameEdit;
       $material->stock=$request->inputStokEdit;
       $material->save();
       return response(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::findOrFail($id)->delete();
        return response(true);
    }

    public function listar(Material $material)
    {
        $materiales=Material::all();
        return datatables()->of($materiales)->toJson();
    }
    public function sumar(Request $request)
    {
        $sumar=Material::findOrFail($request->idMaterial);
        $sumar->stock=$sumar->stock+$request->stock;
        $sumar->save();
        return response(true);
    }

    public function editar($id)
    {
        $material=Material::findOrFail($id);
        return response($material);
    }
}
