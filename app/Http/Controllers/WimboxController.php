<?php

namespace App\Http\Controllers;

use App\Models\Wimbox;
use Illuminate\Http\Request;

class WimboxController extends Controller
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
        $wimbox=new Wimbox();
        $wimbox->nombre=$request->txtNombreW;
        $wimbox->save();
        return response(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wimbox  $wimbox
     * @return \Illuminate\Http\Response
     */
    public function show(Wimbox $wimbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wimbox  $wimbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Wimbox $wimbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wimbox  $wimbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wimbox $wimbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wimbox  $wimbox
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wimbox::findOrFail($id)->delete();
        return response (true);
    }
    public function listar(Wimbox $wimbox)
    {
        $wimbox=Wimbox::all();
        return datatables()->of($wimbox)->toJson();
    }
}
