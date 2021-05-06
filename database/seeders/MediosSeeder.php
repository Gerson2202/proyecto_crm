<?php

namespace Database\Seeders;

use App\Models\MedioAtencion;
use App\Models\Peticion;
use App\Models\Tipologia;
use Illuminate\Database\Seeder;

class MediosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // SEEDER DE MEDIOS DE ATENCION
         $root= new MedioAtencion();
         $root-> nombre ="linea Telefonica";     
         $root->save();

         $root= new MedioAtencion();
         $root-> nombre ="oficina";     
         $root->save();

         $root= new MedioAtencion();
         $root-> nombre ="red social";     
         $root->save();

         $root= new MedioAtencion();
         $root-> nombre ="pagina web";     
         $root->save();         

         $root= new MedioAtencion();
         $root-> nombre ="otro";     
         $root->save();

         
        // SEEDER DE PETICIONES
        $root= new Peticion();
        $root-> nombre ="cambio de clave";     
        $root->save();

        $root= new Peticion();
        $root-> nombre ="filtrado de mac";     
        $root->save();

        $root= new Peticion();
        $root-> nombre ="cambio de ssid";     
        $root->save();

        $root= new Peticion();
        $root-> nombre ="informacion de red";     
        $root->save();   
        
          // SEEDER DE TIPOLOGIAS
          $root= new Tipologia();
          $root-> nombre ="Intermitencia";     
          $root->save();
  
          $root= new Tipologia();
          $root-> nombre ="modificacion de condiciones";     
          $root->save();
  
          $root= new Tipologia();
          $root-> nombre ="Indisponibilidad de servicio";     
          $root->save();
  
          $root= new Tipologia();
          $root-> nombre ="traslado";     
          $root->save(); 

          $root= new Tipologia();
          $root-> nombre ="otro";     
          $root->save();

        
    }
}
