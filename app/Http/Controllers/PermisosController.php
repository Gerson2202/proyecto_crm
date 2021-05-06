<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisosController extends Controller
{

    const PERMISSIONS=[
        'show'=>'permisos.show',
    ];
    public function __construct()
     {
         $this->middleware('permission:'.self::PERMISSIONS['show']);
     }

    public function index()
    {
        $permisos=Permission::all();
        return view('permisos.index',compact('permisos'));
    }

    public function show($id){
       
        $permiso=Permission::findOrfail($id)->load('roles');
        
        return view('permisos.Show',compact('permiso'));
    }
    
}
