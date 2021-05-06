<?php

namespace Database\Seeders;

use App\Models\Factura;
use Illuminate\Database\Seeder;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Factura();
        $root-> codigo ="001122";
        $root-> proveedor ="TP-LINK";
        $root-> fecha ="2020-01-11";
        $root-> descripcion ="Enviados desde saferbo";
        $root-> documento ="descarga (2).jpg";
        $root->save();

        $root= new Factura();
        $root-> codigo ="004322";
        $root-> proveedor ="CISCO";
        $root-> fecha ="2020-04-11";
        $root-> descripcion ="Enviados BIEN";
        $root-> documento ="descarga (2).jpg";
        $root->save();

        $root= new Factura();
        $root-> codigo ="0D122";
        $root-> proveedor ="TP-LINK";
        $root-> fecha ="2020-01-11";
        $root-> descripcion ="Enviados desde saferbo";
        $root-> documento ="descarga (2).jpg";
        $root->save();
    }
}
