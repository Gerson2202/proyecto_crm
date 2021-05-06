<?php

namespace Database\Seeders;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProgramationController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\TikectController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user
        Permission::updateOrCreate(['name'=>UserController::PERMISSIONS['create']],
        ['description'=>'Ver y crear Usuarios']);

        Permission::updateOrCreate(['name'=>UserController::PERMISSIONS['show']],
        ['description'=>'Ver Perfil de usuario']);

        Permission::updateOrCreate(['name'=>UserController::PERMISSIONS['edit']],
        ['description'=>'Editar usuarios']);

        // Permission
        Permission::updateOrCreate(['name'=>PermisosController::PERMISSIONS['show']],
        ['description'=>'Detalle y listado de permisos']);

        // Roles
        Permission::updateOrCreate(['name'=>RolesController::PERMISSIONS['index']],
        ['description'=>'Ver Y editar Roles']);


         // clientes
         Permission::updateOrCreate(['name'=>ClienteController::PERMISSIONS['index']],
         ['description'=>'Ver Clientes']);
          // Planes
          Permission::updateOrCreate(['name'=>PlanController::PERMISSIONS['index']],
          ['description'=>'Ver Planes']);
           // Contratos
         Permission::updateOrCreate(['name'=>ContratoController::PERMISSIONS['index']],
         ['description'=>'Ver Contratos']);

          // Inventario
          Permission::updateOrCreate(['name'=>EquipoController::PERMISSIONS['index']],
          ['description'=>'Administracion de Inventario']);

          Permission::updateOrCreate(['name'=>EquipoController::PERMISSIONS['show']],
          ['description'=>'Ver Listado de Equipos']);
          Permission::updateOrCreate(['name'=>EquipoController::PERMISSIONS['update']],
          ['description'=>'Modificar detalles de equipos']);
          Permission::updateOrCreate(['name'=>EquipoController::PERMISSIONS['asignar']],
          ['description'=>'Asignar Cliente a equipos']);

          // Facturas
          Permission::updateOrCreate(['name'=>FacturaController::PERMISSIONS['list']],
          ['description'=>'Ver Facturas']);

          //salidas
          Permission::updateOrCreate(['name'=>SalidaController::PERMISSIONS['list']],
          ['description'=>'Ver Salidas']);

        //   FIN DE INVENTARIO
         //TICKETS
         Permission::updateOrCreate(['name'=>TikectController::PERMISSIONS['index']],
         ['description'=>'Ver Tickets']);
         Permission::updateOrCreate(['name'=>TikectController::PERMISSIONS['create']],
         ['description'=>'Crear Tickets']);
         Permission::updateOrCreate(['name'=>TikectController::PERMISSIONS['indexInforme']],
         ['description'=>'Informe de  Tickets']);
         Permission::updateOrCreate(['name'=>TikectController::PERMISSIONS['ticketDelet']],
         ['description'=>'Eliminar Tickets']);
        //SOPORTE TECNICO
        Permission::updateOrCreate(['name'=>TecnicoController::PERMISSIONS['index']],
        ['description'=>'Panel de Soporte']);
        Permission::updateOrCreate(['name'=>TecnicoController::PERMISSIONS['create']],
        ['description'=>'Crear actas de soporte']);

         //PROGRAMACION
         Permission::updateOrCreate(['name'=>ProgramationController::PERMISSIONS['index']],
         ['description'=>'Ver programaciones']);
         Permission::updateOrCreate(['name'=>ProgramationController::PERMISSIONS['create']],
         ['description'=>'Crear aprogramaciones']);
         Permission::updateOrCreate(['name'=>ProgramationController::PERMISSIONS['edit']],
         ['description'=>'Editar programaciones']);

          //NODOS
          Permission::updateOrCreate(['name'=>NodoController::PERMISSIONS['index']],
          ['description'=>'Ver Nodos']);
          Permission::updateOrCreate(['name'=>NodoController::PERMISSIONS['store']],
          ['description'=>'Crear y eliminar Nodo']);
    }
}
