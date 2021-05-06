<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel= new Level();
        $nivel-> name ="Soporte de oficina (nivel 1)";
        $nivel-> project_id ="1";
        $nivel->save();

        $nivel= new Level();
        $nivel-> name ="Soporte tecnico (nivel 2)";
        $nivel-> project_id ="1";
        $nivel->save();
    }
}
