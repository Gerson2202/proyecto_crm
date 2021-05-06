<?php

namespace Database\Seeders;

use App\Models\Sede;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Sede= new Sede();
        $Sede-> nombre ="Villa del rosario";
        $Sede->save();

        $Sede= new Sede();
        $Sede-> nombre ="San cayetano";
        $Sede->save();

        $Sede= new Sede();
        $Sede-> nombre ="Cornejo";
        $Sede->save();
    }
}
