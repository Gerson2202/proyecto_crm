<?php

namespace Database\Seeders;

use App\Models\EquipoSalida;
use Illuminate\Database\Seeder;

class EquipoSalidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new EquipoSalida();
        $root-> equipo_id ="1";
        $root-> salida_id ="1";
        $root->save();
    }
}
