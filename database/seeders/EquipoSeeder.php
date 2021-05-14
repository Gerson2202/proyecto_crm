<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="0011";
        
        $root-> serial ="00111DA";
        $root-> mac ="11";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="bodega";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "1";
        $root-> img ="IMG.PNG4";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="0022";
        
        $root-> serial ="0015511DA";
        $root-> mac ="22DD";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="bodega";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "1";
        $root-> img ="IMG.PNG3";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="0033";
        
        $root-> serial ="00144311DA";
        $root-> mac ="00124DAD3";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="nodo";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "1";
        $root-> img ="IMG.PNG2";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="0044";
        
        $root-> serial ="001s311DA";
        $root-> mac ="DDE333D";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="nodo";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "3";
        $root-> img ="IMG.PNG";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="003311";
        
        $root-> serial ="0011DA1DA";
        $root-> mac ="003F444DAD3";
        $root-> estado ="bodega";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="NODO";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "2";
        $root-> img ="IMG.PNG1";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="110011";
        
        $root-> serial ="0011DdA1DA";
        $root-> mac ="003F44ds4D4AD3";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="nodo";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "2";
        $root-> img ="IMG.PNG1";
        $root->save();

        $root= new Equipo();
        $root-> tipoequipo->id ="1";
        $root-> codigo ="0101010";
        
        $root-> serial ="0011fDA1DA";
        $root-> mac ="003F444D4AD3";
        $root-> estado ="NUEVO";
        $root-> observacion ="ANTENA CORTA";
        $root-> destino ="bodega";
        $root-> fecha ="2020-01-14";
        $root-> factura_id = "2";
        $root-> img ="IMG.PNG1";
        $root->save();
    }
}
