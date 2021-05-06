<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class seachController extends Controller
{
    public function clientes(Request $request){
       $term= $request->get('term');    
       $querys=Cliente::where('nombre', 'LIKE', '%' . $term . '%')->get();
       $data=[];
       
       foreach($querys as $query){
        // $output = '<tr><td colspan="5">No Data Found</td></tr>';
        //    $data[] = [
        //        'label'=> $query->nombre,
        //     //    'value'=> $query->id, array("value"=>$employee->id,"label"=>$employee->name);
               
        //    ];
           $data[] = array("value"=>$query->id,"label"=>$query->nombre);
        
       }
       return $data;

    }
}
