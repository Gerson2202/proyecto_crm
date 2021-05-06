<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\MaterialUser;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
     
    const PERMISSIONS=[
        'create'=>'user.create',
        'show'=>'user.show',
        'edit'=>'user.edit',
    ];
     public function __construct()
      {
          $this->middleware('permission:'.self::PERMISSIONS['create'])->only(['index','store']);
          $this->middleware('permission:'.self::PERMISSIONS['show'])->only('show');
          $this->middleware('permission:'.self::PERMISSIONS['edit'])->only(['show','update']);
      }


    public function index(Request $request)
    {
        $users=User::get()->load('roles');
            // return $users;
         return view('usuarios.index',compact('users')); 
    }
    public function listar(Request $request)
    {
         $users=User::all();
         return datatables()->of($users)->toJson();
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'password'=>'min:8',
            'email'=>'unique:users',
        ]);
        $nuevo=new User();
        $nuevo->name=$request->txtName;
        $nuevo->email=$request->txtEmail;
        $nuevo->password=bcrypt($request->txtPassword);
        $nuevo->profile_photo_path="profile-photos/avatar.jpeg";
        $nuevo->save();
        return redirect()->route('userShow',$nuevo->id)->with('mensaje','Nuevo usuario');
        // return response($nuevo);

    }

    
    public function show($id)
    {   
       
        $user=User::findOrFail($id)->load('roles')->load('permissions');
        $proyectos=Project::all();
        $roles=Role::all();
        $permisos=Permission::all();
        $materiales=MaterialUser::where('user_id',$id)->get();
        $equipos=Equipo::where('user_id',$id)->get();
        // return $materiales;
        return view('usuarios.show',compact('user','proyectos','roles','permisos','materiales','equipos'));
    }

    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        // return $id;
        $request->validate([
            'password'=>'min:8',
            'email'=>'unique:users',
        ]);
        $nuevo=User::findOrFail($id);
        $nuevo->name=$request->inputName;
        $nuevo->email=$request->inputEmail;
        $nuevo->password=bcrypt($request->inputContraseña);
        $nuevo->save();
        return redirect()->route('userShow',$nuevo->id)->with('mensaje','Cambio Guardados');
    }

    public function destroy($id)
    {
        User::FindOrFail($id)->delete();
        return response(true);
    }

    // Agrgar Rol
     public function rol(Request $request,$id)
     {  
         
         $user=User::findOrFail($id);
         $user->roles()->sync($request->checkRoles);
         return redirect()->route('userShow',$user->id)->with('mensaje','Aignacion de rol exitosa');
     }
    
    //  Agrgar Permisos
    
     public function permissions(Request $request, $id)
    
    {
        $user=User::findOrFail($id);
        $user->permissions()->sync($request->txtPermisos);
    
        return  redirect()->route('userShow',$user->id)->with('mensaje','Aignacion de permisos exitosa');;
    
    }
}
