<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Cliente();
        $root-> ced ="1093740241";
        $root-> nombre ="Andrea Marcela";
        $root-> telefono ="310284856";
        $root-> correo ="andreita01@gmail.com";
        
        $root-> municipio ="Los  vados";
        $root-> calle ="calle #6-70 la sabana";
        $root-> estrato ="2";
        $root-> fecha_inicio ="2020-11-02";
        $root-> fecha_final ="2020-10-02";
        $root-> tipo_servicio ="canal dedicado";
        $root-> reuso ="1:2";
        $root-> tecnologia ="red de enlace";
        $root-> canon = "85.000";
        $root-> estado ="activo";
        $root->save();

        $root= new Cliente();
        $root-> ced ="1093440241";
        $root-> nombre ="camila Marcela";
        $root-> telefono ="310284856";
        $root-> correo ="andreita031@gmail.com";
        
        $root-> municipio ="Los  vados";
        $root-> calle ="calle #6-70 la sabana";
        $root-> estrato ="2";
        $root-> fecha_inicio ="2020-11-02";
        $root-> fecha_final ="2050-11-02";
        $root-> tipo_servicio ="canal dedicado";
        $root-> reuso ="1:2";
        $root-> tecnologia ="red de enlace";
        $root-> canon = "85.000";
        $root-> estado ="activo";

        $root->save();
        $root= new Cliente();
        $root-> ced ="1093740341";
        $root-> nombre ="brandon Marcela";
        $root-> telefono ="310284856";
        $root-> correo ="andre4ita01@gmail.com";
        
        $root-> municipio ="Los  vados";
        $root-> calle ="calle #6-70 la sabana";
        $root-> estrato ="2";
        $root-> fecha_inicio ="2020-11-02";
        $root-> fecha_final ="2020-11-02";
        $root-> tipo_servicio ="canal dedicado";
        $root-> reuso ="1:2";
        $root-> tecnologia ="red de enlace";
        $root-> canon = "85.000";
        $root-> estado ="activo";
        $root->save();
    }
}
