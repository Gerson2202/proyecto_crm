<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    const PERMISSIONS=[
        
        'index'=>'role.index',
    ];
    // public function __construct()
    // {
    //     $this->middleware('permission:'.self::PERMISSIONS['index']);
    // }


    
   public function index()
   {
        $roles=Role::all();
        $permisos=Permission::all();
        return view('roles.index',compact('roles','permisos'));
   }

   public function store(Request $request)
   {
    //    return $request;
       $nuevo=new Role();
       $nuevo->name=$request->txtNombre;
       $nuevo->description=$request->txtDescripcion; 
       $nuevo->guard_name= "web";      
       $nuevo->save();

       $nuevo->permissions()->sync($request->txtPermiso_id);
       return  redirect()->route('roleShow',$nuevo->id)->with('mensaje','Nuevo rol Agregado');
       

    //    return response($nuevo);
        // $roles=Role::all();
        // return view('roles.index',compact('roles'));
   }
   public function show($id)
   {
          $rol=Role::findOrfail($id)->load('permissions');
          $permisos=Permission::all();
          $user=$rol->user;
          // $user=$rol->users;
          $user=$rol->users;
           return view('roles.show',compact('rol','permisos','user'));
          // with('permissions:id,name','users:id,name')
   }

   public function update(Request $request,$id)
   {
    $rol=Role::findOrfail($id);
    $rol->name=$request->name;
    $rol->description=$request->description;    
    $rol->save();
    
    $rol->permissions()->sync($request->txtPermiso_id);
    return  redirect()->route('roleShow',$rol->id)->with('mensaje','Cambios Guardados');

   }
   public function destroy($id)
   {
        Role::findOrFail($id)->delete();
        return  redirect()->route('RolesIndex')->with('mensaje','Rol eliminado');;
   }
}
