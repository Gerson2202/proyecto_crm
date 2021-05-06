<?php

use App\Models\User;
use App\Models\Ticket;
use App\Models\Mensaje;
use App\Models\Programation;
use App\Models\SalidaEquipo;
use Database\Seeders\FacturaSeeder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\seachController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\TikectController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\EquipoSalidaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\ProgramationController;
use App\Http\Controllers\SalidaEquipoController;
use App\Http\Controllers\SalidaTecnicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// ROUTA DE VISTAS MIXTAS

// Route::middleware(['auth:sanctum', 'verified'])->get('/CRM', function () {
//     return view('panel.crm');
// })->name('crm');
// Route::middleware(['auth:sanctum', 'verified'])->get('/CRM/programcion', function () {
//     return view('Panel.programacion');
// })->name('programacionVista');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// HOME

Route::middleware(['auth:sanctum','verified'])->get('/Crm', [HomeController::class,'index'])->name('homeIndex');

// Route::get('/{slug?}',function(){
//     return view('welcome');

// });

//RUTAS DE CLIENTE//
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes', [ClienteController::class,'index'])->name('clientesIndex');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes/crear', [ClienteController::class,'create'])->name('clientesCreate');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Clientes/crear', [ClienteController::class,'store'])->name('clientesStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes/ver/{id}', [ClienteController::class,'show'])->name('clientesShow');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes/edit/{id}', [ClienteController::class,'edit'])->name('clientesEdit');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Clientes/edit/{id}', [ClienteController::class,'update'])->name('clientesUpdate');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Clientes/insert/{id}', [ClienteController::class,'AggFile'])->name('AggFile');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes/down/{id}', [ClienteController::class,'downloadFile'])->name('downFile');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Clientes/listar', [ClienteController::class,'listar'])->name('clientesListar');
Route::middleware(['auth:sanctum','verified'])->delete('/Crm/Clientes/quitarPlan/{id}', [ClienteController::class,'quitarPlan'])->name('clienteQuitarPlan');

// END TUTAS DE CLIENTES


// RUTAS PLANES

Route::middleware(['auth:sanctum','verified'])->get('/Crm/Planes', [PlanController::class,'index'])->name('planesIndex');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Planes/create', [PlanController::class,'create'])->name('planesCreate');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Planes/create', [PlanController::class,'store'])->name('planesStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Planes/edit/{id}', [PlanController::class,'edit'])->name('planesEdit');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Planes/edit/{id}', [PlanController::class,'update'])->name('planUpdate');
Route::middleware(['auth:sanctum','verified'])->delete('/Crm/Planes/eliminar/{id}', [PlanController::class,'delet'])->name('planDelet');
Route::middleware(['auth:sanctum','verified'])->post('/ajax/storePlan', [PlanController::class,'updateAjax'])->name('updateAjax');




// END RUTAS PLANES

// RUTAS DE CONTRATOS

Route::middleware(['auth:sanctum','verified'])->get('/Crm/Contratos', [ContratoController::class,'index'])->name('ContratosIndex');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Contratos/create', [ContratoController::class,'create'])->name('ContratosCreate');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Contratos/create', [ContratoController::class,'store'])->name('ContratosStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Contratos/list', [ContratoController::class,'list'])->name('contratoListado');
// Route::middleware(['auth:sanctum','verified'])->get('Crm/Contratos/{documento}', [ContratoController::class,'soporte'])->name('soportea');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Contratos/down/{id}', [ContratoController::class,'downloadFile'])->name('ContratoDown');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Contrato/delet/{id}', [ContratoController::class,'destroy'])->name('contratoEliminar');


// END RUTAS CONTRATOS

//rutas inventario
//RUTAS DE EQUIPOS//
Route::middleware(['auth:sanctum','verified'])->get('Crm/Inventario/equipos', [EquipoController::class,'index'])->name('equiposIndex');
Route::middleware(['auth:sanctum','verified'])->get('Crm/Inventario/equipos/crear', [EquipoController::class,'create'])->name('equipoCreate');
Route::middleware(['auth:sanctum','verified'])->post('Crm/Inventario/equipos/crear', [EquipoController::class,'store'])->name('equiposStore');
Route::middleware(['auth:sanctum','verified'])->get('Crm/Inventario/equipos/List', [EquipoController::class,'equiposList'])->name('equiposList');
Route::middleware(['auth:sanctum','verified'])->get('Crm/Inventario/equipos/{id}', [EquipoController::class,'show'])->name('equipoShow');
Route::middleware(['auth:sanctum','verified'])->post('Crm/Inventario/equipos/{id}', [EquipoController::class,'update'])->name('equipoUpdaate');
Route::middleware(['auth:sanctum','verified'])->post('Crm/Inventario/equipos/asignar/{id}', [EquipoController::class,'equipoAsignar'])->name('equipoAsignar');

Route::middleware(['auth:sanctum','verified'])->post('Crm/Inventario/equipos//asignarSede/{id}', [EquipoController::class,'equipoAsignarSede'])->name('equipoAsignarSede');


// Facturas
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Factura/list', [FacturaController::class,'listFacturas'])->name('listFacturas');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Factura/create', [FacturaController::class,'store'])->name('storeFactura');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Factura/down/{id}', [FacturaController::class,'downloadFile'])->name('facturaDown');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Factura/ver/{id}', [FacturaController::class,'show'])->name('verFacturas');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Factura/update/{id}', [FacturaController::class,'update'])->name('facturaUpdate');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Factura/delet/{id}', [FacturaController::class,'destroy'])->name('facturaEliminar');

//salida de equipos por parte de inventario
Route::middleware(['auth:sanctum','verified'])->post('/Crm/e/Inventario/salida', [SalidaController::class,'store'])->name('storeSalida');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/salida/list', [SalidaController::class,'salidaList'])->name('salidaList');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/salida/show/{id}', [SalidaController::class,'show'])->name('salidaShow');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/salida/lista', [SalidaController::class,'lista'])->name('salidaListado');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/salida/delet/{id}', [SalidaController::class,'destroy'])->name('salidaEliminar');
// routa agg material a salida
Route::middleware(['auth:sanctum','verified'])->post('/Crm/Inventario/agregarMaterial', [SalidaController::class,'agregarMaterial'])->name('agregarMaterial');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/materiales/lista/{id}', [SalidaController::class,'materialesLista'])->name('materialesLista');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/eliminarMaterial/{id}/{ids}/{idss}/{idsss}', [SalidaController::class,'eliminarMaterial'])->name('eliminarMaterial');
// Consultar id de material
Route::middleware(['auth:sanctum','verified'])->get('/Crm/Inventario/consultaIdmaterial/{id}', [SalidaController::class,'consultaIdmaterial'])->name('consultaIdmaterial');

//tecnicos
//salidaTecnicoContoller es para el acta de actividad de tecnico 
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tecnico/index', [TecnicoController::class,'index'])->name('tecnicoIndex');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/tecnico/store', [TecnicoController::class,'store'])->name('storeActaSalida');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tecnico/show/{id}', [TecnicoController::class,'show'])->name('showActaSalida');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tecnico/acta/list', [TecnicoController::class,'list'])->name('actasList');
Route::middleware(['auth:sanctum','verified'])->get('/acta/imagenes/list/{id}', [TecnicoController::class,'actaImgList'])->name('actaImgList');
Route::middleware(['auth:sanctum','verified'])->get('/acta/imagen/eliminar/{id}', [TecnicoController::class,'eliminarImg'])->name('eliminarImg');
Route::middleware(['auth:sanctum','verified'])->post('/acta/subir/magenes', [TecnicoController::class,'subirImagenes'])->name('actaSubirImagenes');
// rourta para agg material al acata
Route::middleware(['auth:sanctum','verified'])->post('/Crm/tecnico/agregarMaterialActa', [TecnicoController::class,'agregarMaterialActa'])->name('agregarMaterialActa');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tecnico/actaShow/listaMateriales/{id}', [TecnicoController::class,'listarMateriales'])->name('listarMateriales');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/tecnico/prestarEquipo', [TecnicoController::class,'prestarEquipo'])->name('prestarEquipo');

// Programacion

Route::middleware(['auth:sanctum','verified'])->get('Crm/programacion/index', [ProgramationController::class,'index'])->name('programacionIndex');
Route::middleware(['auth:sanctum','verified'])->post('/programacion/guardar', [ProgramationController::class,'store'])->name('programacionStore');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/listar', [ProgramationController::class,'listar'])->name('programacionListar');
Route::middleware(['auth:sanctum','verified'])->post('/programacion/modificar/{id}', [ProgramationController::class,'update'])->name('programacionUpdate');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/eliminar/{id}', [ProgramationController::class,'delete'])->name('programacionDelete');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/data', [ProgramationController::class,'programacionDatatable'])->name('programacionDatatable');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/ajax/show/{id}', [ProgramationController::class,'programacionShowAjax'])->name('programacionShowAjax');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/cambiarEstado/{id}', [ProgramationController::class,'cambioEstado'])->name('cambioEstado');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/listar/asignadas', [ProgramationController::class,'programacionListarAsiganadas'])->name('programacionListarAsiganadas');
Route::middleware(['auth:sanctum','verified'])->get('/programacion/listar/cola', [ProgramationController::class,'listarCola'])->name('programacionListarCola');


// TIKETS
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tikects/index', [TikectController::class,'index'])->name('ticketsIndex');
Route::middleware(['auth:sanctum','verified'])->post('/ticket/guardar', [TikectController::class,'store'])->name('tikectStore');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/listar', [TikectController::class,'ticketNuevoListar'])->name('ticketNuevoListar');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/atender/{id}', [TikectController::class,'ticketAtender'])->name('ticketAsignadoListar');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/listar1', [TikectController::class,'ticketAsignadoListar'])->name('ticketAsignadoListar');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/listar3', [TikectController::class,'ticketListarAll'])->name('ticketListarAll');
Route::middleware(['auth:sanctum','verified'])->get('/tikects/show/{id}', [TikectController::class,'show'])->name('ticketShow');
Route::middleware(['auth:sanctum','verified'])->get('/tikects/cambiarEstado/{id}', [TikectController::class,'ticketCambiarEstado'])->name('ticketCambiarEstado');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/info/{id}', [TikectController::class,'infoTicket'])->name('infoTicket');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tikects/index/informe', [TikectController::class,'indexInforme'])->name('indexInforme');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/tikects/listar/informe', [TikectController::class,'indexListarInforme'])->name('indexListarInforme');
Route::middleware(['auth:sanctum','verified'])->get('/tikects/eliminar/{id}', [TikectController::class,'destroy'])->name('ticketEliminar');
Route::middleware(['auth:sanctum','verified'])->get('/asignar/Ticket/{id}/{ids}', [TikectController::class,'ticketAsignar'])->name('ticketAsignar');
Route::middleware(['auth:sanctum','verified'])->post('/ticket/imagenes', [TikectController::class,'subirImagenes'])->name('ticketSubirImagenes');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/imagenes/list/{id}', [TikectController::class,'ticketsImagenesList'])->name('ticketsImagenesList');
Route::middleware(['auth:sanctum','verified'])->get('/ticket/imagen/eliminar/{id}', [TikectController::class,'eliminarImg'])->name('eliminarImg');

// USUARIOS
Route::middleware(['auth:sanctum','verified'])->get('/Crm/user/index', [UserController::class,'index'])->name('userIndex');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/user/store', [UserController::class,'store'])->name('userStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/user/show/{id}', [UserController::class,'show'])->name('userShow');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/user/delet', [UserController::class,'delet'])->name('userDelet');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/user/listar', [UserController::class,'listar'])->name('userListar');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/rol/user/store/{id}', [UserController::class,'rol'])->name('roleUser');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/permisos/user/store/{id}', [UserController::class,'permissions'])->name('permisosUser');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/user/update/{id}', [UserController::class,'update'])->name('userUpdate');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/user/eliminar/{id}', [UserController::class,'destroy'])->name('userEliminar');


// proyectos
// todo con ajax
Route::middleware(['auth:sanctum','verified'])->post('/proyecto/guardar', [ProjectController::class,'store'])->name('proyectoStore');
Route::middleware(['auth:sanctum','verified'])->get('/proyecto/listar', [ProjectController::class,'listar'])->name('proyectoListar');
Route::middleware(['auth:sanctum','verified'])->get('/proyecto/ajax/show/{id}', [ProjectController::class,'listarEdit'])->name('proyectoListarEdit');

Route::middleware(['auth:sanctum','verified'])->post('/proyecto/ajax/update/{id}', [ProjectController::class,'update'])->name('proyectoUpdate');
Route::middleware(['auth:sanctum','verified'])->get('/proyecto/eliminar/{id}', [ProjectController::class,'destroy'])->name('proyectoDelet');

// NIVELES

Route::middleware(['auth:sanctum','verified'])->post('/agregar/nivel', [LevelController::class,'store'])->name('levelStore');

Route::middleware(['auth:sanctum','verified'])->get('/niveles/listar', [LevelController::class,'tabla'])->name('nivelesListar');
Route::middleware(['auth:sanctum','verified'])->get('/nivel/eliminar/{id}', [LevelController::class,'destroy'])->name('nivelDelet');
Route::middleware(['auth:sanctum','verified'])->get('/nivel/buscar/{id}', [LevelController::class,'buscar'])->name('nivelBuscar');

// MENSAJES
Route::middleware(['auth:sanctum','verified'])->post('/mensaje/guardar', [MensajeController::class,'store'])->name('mensajeStore');
Route::middleware(['auth:sanctum','verified'])->get('/mensaje/listar/{id}', [MensajeController::class,'listar'])->name('mensajeListar');
Route::middleware(['auth:sanctum','verified'])->get('/mensajes/eliminar/{id}', [MensajeController::class,'mensajesEliminar'])->name('mensajesEliminar');

// PERMISOS
Route::middleware(['auth:sanctum','verified'])->get('/permisos/index', [PermisosController::class,'index'])->name('permisosIndex');
Route::middleware(['auth:sanctum','verified'])->get('/permisos/show/{id}', [PermisosController::class,'show'])->name('permisosShow');

// ROLES
Route::middleware(['auth:sanctum','verified'])->get('/roles/index', [RolesController::class,'index'])->name('RolesIndex');
Route::middleware(['auth:sanctum','verified'])->post('/roles/store', [RolesController::class,'store'])->name('RolesStore');
Route::middleware(['auth:sanctum','verified'])->get('/roles/show/{id}', [RolesController::class,'show'])->name('roleShow');
Route::middleware(['auth:sanctum','verified'])->post('/roles/update/{id}', [RolesController::class,'update'])->name('roleUpdate');
Route::middleware(['auth:sanctum','verified'])->get('/roles/distroy/{id}', [RolesController::class,'destroy'])->name('roleDestroy');

// NODOS
Route::middleware(['auth:sanctum','verified'])->get('/Crm/nodo/index', [NodoController::class,'index'])->name('nodoIndex');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/nodo/store', [NodoController::class,'store'])->name('nodoStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/nodo/eliminar/{id}', [NodoController::class,'destroy'])->name('nodoEliminar');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/nodo/update/{id}', [NodoController::class,'update'])->name('nodoUpdate');

// buscador
route::get('/search/clientes',[seachController::class,'clientes'])->name('searchCliente');

// COMENTARIOS DE TICKETS
Route::middleware(['auth:sanctum','verified'])->post('/comentario/guardar', [ComentarioController::class,'store'])->name('comentarioStore');
Route::middleware(['auth:sanctum','verified'])->get('/comentario/listar', [ComentarioController::class,'listar'])->name('comentariosListar');
Route::middleware(['auth:sanctum','verified'])->get('/comentario/eliminar/{id}', [ComentarioController::class,'destroy'])->name('comentariosDelet');


// MATERIALES
Route::middleware(['auth:sanctum','verified'])->post('/Crm/inventario/material/store', [MaterialController::class,'store'])->name('matrialStore');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/inventario/material/listar', [MaterialController::class,'listar'])->name('materialListar');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/inventario/material/eliminar/{id}', [MaterialController::class,'destroy'])->name('materialEliminar');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/inventario/material/sumar', [MaterialController::class,'sumar'])->name('matrialSumar');
Route::middleware(['auth:sanctum','verified'])->get('/Crm/inventario/material/editar/{id}', [MaterialController::class,'editar'])->name('matrialEditar');
Route::middleware(['auth:sanctum','verified'])->post('/Crm/inventario/material/update', [MaterialController::class,'update'])->name('matrialUpdate');
